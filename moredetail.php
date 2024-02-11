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




 echo ' <!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance Tracker</title>
    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="main">
        
        <div class="navbar">
            <!-- <div class="icon">
                <h2 class="logo">IIIT</h2>
            </div> -->

            <div class="menu">
                <ul>                     <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">HELP</a></li>
                    <li><a href="#">CONTACT </a></li>
                    <li><a href="#"> Welcome '.$name.'</a></li>

                   <li><a  href="index.php?logout=1">Log out</a></b></li>
                </ul>
            </div>
             

            <div class="search">
             <img src="attendance-tracker-logo-removebg.png" width="300px" height="47px">
               
            </div>  

        </div>

        <div class="container-1">
        <div class="card-1">
            <div class="line-1">IMA<br></div>
          <div class="content1">
              <l>
                  <li id="l2a">Total Lectures : <b>'.$tt_ima .'</b> </li>
                  <li id="l2a">Attended Lectures : <b>'.$pima.'</b> </li>
                  <li id="l2a">Not Attended Lectures : <b>'.$aima.'</b> </li>
                  <li id="l2a">Atttendance % : <b>'.$at_ima.'%</b> </li>
              </l>
          </div>
        </div>
        <div class="card-2">
            <div class="line-1">ICS</div>
            <div class="content1">
                <l>
                    <li id="l2a">Total Lectures : <b>'.$tt_ics .'</b> </li>
                  <li id="l2a">Attended Lectures : <b>'.$pics.'</b> </li>
                  <li id="l2a">Not Attended Lectures : <b>'.$aics.'</b> </li>
                  <li id="l2a">Attendance % : <b>'.$at_ics.'%</b> </li>
                </l>
            </div>
        </div>
        <!-- <div class="card-3">
            <div class="line-1">IEC-211</div>
            <div class="content1">
                <l>
                    <li id="l2a">Total Lectures:- <b>22</b> </li>
                    <li id="l2a">Attended Lectures:- <b>19</b> </li>
                    <li id="l2a">-Not Attended Lectures:- <b>2</b> </li>
                    <li id="l2a">-Atttendance%:- <b>92%</b> </li>
                </l>
            </div>
        </div>
        <div class="card-4">
            <div class="line-1">IEC-212</div>
            <div class="content1">
                <l>
                    <li id="l2a">Total Lectures:- <b>24</b> </li>
                    <li id="l2a">Attended Lectures:- <b>21</b> </li>
                    <li id="l2a">-Not Attended Lectures:- <b>3</b> </li>
                    <li id="l2a">-Atttendance%:- <b>87%</b> </li>
                </l>
            </div>
        </div> -->
        <div class="card-5">
            <div class="line-1">IEC</div>
            <div class="content1">
                <l>
                     <li id="l2a">Total Lectures : <b>'.$tt_iec .'</b> </li>
                  <li id="l2a">Attended Lectures : <b>'.$piec.'</b> </li>
                  <li id="l2a">Not Attended Lectures : <b>'.$aiec.'</b> </li>
                  <li id="l2a">Attendance % : <b>'.$at_iec.'%</b> </li>

                </l>
            </div>
        </div>
        <!-- <div class="card-6">
            <div class="line-1">IEC-214</div>
            <div class="content1">
                <l>
                    <li id="l2a">Total Lectures:- <b>16</b> </li>
                    <li id="l2a">Attended Lectures:- <b>15</b> </li>
                    <li id="l2a">-Not Attended Lectures:- <b>1</b> </li>
                    <li id="l2a">-Atttendance%:- <b>93%</b> </li>
                </l>
            </div>
        </div>
        <div class="card-7">
            <div class="line-1">IEC-215</div>
            <div class="content1">
                <l>
                    <li id="l2a">Total Lectures:- <b>19</b> </li>
                    <li id="l2a">Attended Lectures:- <b>12</b> </li>
                    <li id="l2a">-Not Attended Lectures:- <b>7</b> </li>
                    <li id="l2a">-Atttendance%:- <b>72%</b> </li>
                </l>
            </div> -->
        </div>
        </div>
       
    </div>
    </div>

    </div>
</body>

</html>';
  ?>