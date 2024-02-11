<?php  

 

$username = "";
$email    = "";
$errors = array(); 

// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'at');
 
$servername = "localhost";
$username = "id18677457_root";
$password = "nYy~I2M}K+eI#9yi";
$database = "id18677457_flatmate";




$db =mysqli_connect($servername, $username, $password, $database);


 


$sub=[];  
$date="";

// Store the date and time  to 
// the variable 
if(isset($_POST['datesubmit']))
{

 $tdate= mysqli_real_escape_string($db, $_POST['tdate']);

  $date = strtotime($tdate);
$date= date('Y-m-d', $date);  

//echo $date;
}
 
   
date_default_timezone_set('Asia/Kolkata');
 $sdate=$date;


 

$timestamp = strtotime($date);
$day = date('l', $timestamp);
 
echo '<br><br><br><br>';
switch ($day) {
     case 'Monday':  $sub[0]= 'IMA'; $sub[1]='ICS';$sub[2]='IEC';
                   
         break;
     case 'Tuesday':
             $sub[0]= 'ICS'; $sub[1]='IMA';$sub[2]='IEC';
         break;
     case 'Wednesday':$sub[0]= 'IMA'; $sub[1]='ICS';$sub[2]='IEC';
            // code...

         break;
     case 'Thursday': $sub[0]= 'ICS'; $sub[1]='IMA';$sub[2]='IEC';
            // code...
         break;
     case 'Friday': $sub[0]= 'IMA'; $sub[1]='ICS';$sub[2]='IEC';
            // code...
         break;
     case 'Saturday': $sub[0]= 'ICS'; $sub[1]='IMA';$sub[2]='IEC';
            // code...
         break;
     case 'Sunday':$sub[0]= 'IMA'; $sub[1]='ICS';$sub[2]='IEC';
            // code...
         break;

     default:
         // code...
         break;
 } 
 
?>