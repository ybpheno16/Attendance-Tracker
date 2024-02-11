<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database

 
$servername = "localhost";
$username = "id18677457_root";
$password = "nYy~I2M}K+eI#9yi";
$database = "id18677457_flatmate";




$db =mysqli_connect($servername, $username, $password, $database);

//$db = mysqli_connect('localhost', 'root', '', 'at');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password!= $confirm_password) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);

    

      $query2= "CREATE TABLE $username (
    sn int NOT NULL AUTO_INCREMENT,
    day date NOT NULL, 

    ima varchar(255) NOT NULL DEFAULT '0',
    ics varchar(255) NOT NULL DEFAULT '0',
    iec varchar(255) NOT NULL DEFAULT '0',
    PRIMARY KEY (sn)
    )";
   mysqli_query($db, $query2);


    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
     
    $_SESSION['success'] = "You are now logged in";
    header('location: newatmark.php');

   



  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
     
        if (mysqli_num_rows($results) == 1) {
      $_SESSION['email']=$email;
      $row= mysqli_fetch_assoc($results);
      $name=$row['username'];
      $_SESSION['username']=$name;

       
      $_SESSION['success'] = "You are now logged in";
      header('location: newatmark.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}







?>