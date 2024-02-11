<?php include('server.php') ?>
<style>
<?php include 'newregister.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en"> 

<head>
    <title>Attendance Tracker</title>
    <link rel="stylesheet" href="signupnew.css">
</head>

<body>

    <div class="main">
        <div class="navbar">
            <!-- <div class="icon">
                <h2 class="logo">IIIT</h2>
            </div> -->

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">HELP</a></li>
                    <li><a href="#">CONTACT </a></li>
                </ul>
            </div>

            <!-- <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div> -->

            <div class="asd">
                <img src="attendance-tracker-logo-removebg.png" width="292px" height="47px">
                <!-- <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <div class="btn">Search</div></a> -->
            </div>

        </div>
        <div class="content">
            <h1>IIIT Kottayam<br><span>Attendance Tracker</span> <br></h1>
            <p class="par">This website help you to track your attendance
                so that <br> you do not have to worry about fine.
            </p>

            <!-- <button class="cn"><a href="#">Suggest US</a></button> -->

            <div class="form">
                <h2>Signup Here</h2>
                 <form method="post" action="newregister.php">
                <input type="text" name="username" id="username" placeholder="Enter Your username">
                <input type="email" name="email" id="email" placeholder="Enter Your Email">
                 <input type="password" name="password" id="password" placeholder="Enter Your Password">
               <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password">
                <!-- <input type="password" name="" placeholder="Enter Branch"> -->

                <button type="submit" class="btnn" name="reg_user">Sign Up</button>

                <p class="link">Already Register?<br>
                    <a href="index.php">Login Here</a></a>
                </p>           
                <p class="liw">Follow us on</p>

                <div class="icons">
                    <a href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="instagram.com/i.m.atul__">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="https://lmsone.iiitkottayam.ac.in/">
                        <ion-icon name="logo-laravel"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                        <!-- <ion-icon name="logo-skype"></ion-icon> -->
                    </a>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
   
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="C:\xampp\htdocs\login\login_main.js"></script>
</body>

</html>