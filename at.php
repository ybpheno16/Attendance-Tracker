<?php  
 
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


echo '<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance Tracker</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="main">
        <div class="navbar">
            <!-- <div class="icon">
                <h2 class="logo">IIIT</h2>
            </div> -->

            <div class="atmenu">
                <ul>
                   <li><a href="#" id="w1"> Welcome '.$name.'!</a></li>
                    
                  <a  href="index.php?logout=1"> <button class="button"> Log Out</button></a>
                            
                </ul>
            </div>

            <div class="atlogo">
               <img src="attendance-tracker-logo-removebg.png" width="300px" height="47px">
             </div>


        </div>
        
  <!-- date showing        -->
<div class="date">
    
<p style="background-color: grey; color: whitesmoke; font-size:25px" "> Select date to see Time Table:  
<span style="font-size:25px;color:white;" id="datetime"></span>';


echo '
 <div class="xyz">
  <form method="POST" action="at.php">;
   <input type="date" name="tdate">
<button type="submit" class="btn"  name="datesubmit">Submit</button>
</form>
</div>

</p>';
 
 
 

 echo 
 ' 
<!-- time table showing -->
<div class="timetable">
     <form method="POST" action="atmark.php">';
      ?>     
 <?php include 'day.php'; 
 
 if(isset($_POST['datesubmit'])){

echo" <input type='date'  name='date' value='$sdate' readonly >";
  

     $len=count($sub);
     $i=0;

     while ($i<$len) {
        
     
 
        echo   '<span class="time table">
           <label for="'.$sub[$i].'">'.$sub[$i].'</label>

            <select name="'.$sub[$i].'"" id="'.$sub[$i].'"">
               <option value="Present">Present</option>
               <option value="Absent">Absent</option>
               <option value="Cancelled">Class Cancelled</option>
                
            </select>
            </span>';

            $i++;
        }
 echo '<button type="submit" class="btn" name="at_mark">Mark</button>
                </form>';}


$at_ima="";
$tt_ima="";

 
$servername = "localhost";
$username = "id18677457_root";
$password = "nYy~I2M}K+eI#9yi";
$database = "id18677457_flatmate";




$conn =mysqli_connect($servername, $username, $password, $database);
 
//$conn = mysqli_connect('localhost', 'root', '', 'at');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
      
$sql = "SELECT * FROM `$name` ";
$result = $conn->query($sql);

 

 $pima=0;
 $aima=0;
 
 $pics=0;
 $aics=0;

 $piec=0;
 $aiec=0;

 



if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) 
{
    if(!strcasecmp($row['ima'], "Present"))
        {
            $pima++;

        }
    else if(!strcasecmp($row['ima'], "Absent"))
    {
        $aima++;
    }


    if(!strcasecmp($row['ics'], "Present"))
        {
            $pics++;

        }
    else if(!strcasecmp($row['ics'], "Absent"))
    {
        $aics++;
    }


    if(!strcasecmp($row['iec'], "Present"))
        {
            $piec++;

        }
    else if(!strcasecmp($row['iec'], "Absent"))
    {
        $aiec++;
    }




 }
}



 

$tt_ima=$pima+$aima;

if($tt_ima!=0)
{ 
    $at_ima=($pima/$tt_ima)*100;
    $at_ima= round($at_ima,2);
}
else 
  {
    $at_ima=' No Attendance has been marked yet!';
  }



 


$tt_ics=$pics+$aics;
if($tt_ics!=0)
{ 
    $at_ics=($pics/$tt_ics)*100;
    $at_ics= round($at_ics,2);
}
else 
  {
    $at_ics=' No Attendance has been marked yet!';
  }


    

$tt_iec=$piec+$aiec;
if($tt_iec!=0)
{ 
    $at_iec=($piec/$tt_iec)*100;
    $at_iec= round($at_iec,2);
}
else 
  {
    $at_iec=' No Attendance has been marked yet!';
  }




echo '<span style="background-color: grey; color: whitesmoke;"> <p> Attendance percentage for IMA:'.$at_ima.'%</p><br> </span>';
echo '<br';
echo '<span style="background-color: grey; color: whitesmoke;"> <p> Attendance percentage for ICS:'.$at_ics.'%</p> <br> </span>';
echo '<br';
echo '<span style="background-color: grey; color: whitesmoke;"> <p> Attendance percentage for IEC:'.$at_iec.'%</p>  <br></span>';
echo'</div>';
echo '<button class="button"><a href="showdetail.php">Detailed Attendance</a></button>';
 


echo'
</body>

</html>';
?>