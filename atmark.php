<?php
 


 
$servername = "localhost";
$username = "id18677457_root";
$password = "nYy~I2M}K+eI#9yi";
$database = "id18677457_flatmate";




$db =mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}


 session_start();
 $email="error";
 $name="error";
 if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }

 if(isset($_SESSION['username']))
  {
          $email=$_SESSION['email'];

          $name=$_SESSION['username'];
  }  






 
  echo $name;
if (isset($_POST['at_mark'])) 
 {

    
  
  $tdate= mysqli_real_escape_string($db, $_POST['date']);

  $date = strtotime($tdate);
$date= date('Y-m-d', $date);   
echo $date;

 

  $date_check_query = "SELECT * FROM `$name` WHERE day='$date' LIMIT 1";
  $result = mysqli_query($db, $date_check_query);
  $dates = mysqli_fetch_assoc($result);
  if($dates)
   { 
      

     if(isset($_POST['IMA']))
      {
         $IMA=$_POST['IMA'];

      $query=" UPDATE $name SET ima = '$IMA' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
  }
    if(isset($_POST['IEC']))
      {
         $IEC=$_POST['IEC'];

      $query=" UPDATE $name SET iec = '$IEC' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
  }

     if(isset($_POST['ICS']))
      {
         $ICS=$_POST['ICS'];

      $query=" UPDATE $name SET ics= '$ICS' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
  }
  
    echo "<script>window.location.href='newatmark.php'</script>";
 
  }

else
{     

  
 
     $query = "INSERT INTO $name (day)
           VALUES ('$date')";
           mysqli_query($db, $query); 
        
    if(isset($_POST['IMA']))
      {
         $IMA=$_POST['IMA'];
         $query=" UPDATE $name SET ima= '$IMA' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
      }

      if(isset($_POST['ICS']))
      {
         $ICS=$_POST['ICS'];
         $query=" UPDATE $name SET ics= '$ICS' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
      }
        if(isset($_POST['IEC']))
      {
         $IEC=$_POST['IEC'];
         $query=" UPDATE $name SET iec= '$IEC' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        echo"updated";
      }
    echo "<script>window.location.href='newatmark.php'</script>";
   
       
  }
}
 
 



?>