<?php
session_start();
include('dbconnection.php');

$cupassword=$_SESSION['password'];
$usertype=$_SESSION['usertype'];
$username=$_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="change-pass.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Change Password</title>
</head>
<body>
    
    

    
    <div class="container" id="myHeader">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>

        
        <div class="nav">
        <a href="home.php" id="lnk1">home</a>
        <a href="events.php" id="lnk4">Events</a>
        <a href="myprof.php" id="lnk5">My profile</a>
        <a href="logout.php" id="lnk2">logout</a>
        </div>
    </div>





    <div class="login-container" data-aos="fade-up" data-aos-duration="800">
        <h2>Change Password</h2>
        <form action="" method="GET">
            <div class="input-group">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword" placeholder="Current password" required>
            </div>
            <div class="input-group">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="New password" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password" required>
            </div>
            <button type="submit" class="but" name="change">Change Password</button>
            
            
        </form>
    </div>

    <?php

    if(isset($_GET['change'])) {
        
       
        if(!empty($_GET['confirmPassword']&&$_GET['newPassword']
        &&$_GET['currentPassword'])){
            $currentPassword = $_GET['currentPassword'];
            $newPassword = $_GET['newPassword'];
            $confirmPassword = $_GET['confirmPassword'];
            if($cupassword==$currentPassword){
                
                if($newPassword==$confirmPassword){
                
                    if($usertype=="student"){
                        
                        $sql = "UPDATE student SET SDpassword=:np WHERE SDusername='".$username."'";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(array(
                    
                            ':np'=>$newPassword
                    
                        ));
                }
                else{
                    $sql = "UPDATE staff SET STPassword=:np WHERE STUsername='".$username."'";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute(array(
                    ':np'=>$newPassword
                    ));
                }
                header('Location:myprof.php');
                exit;}
            }
            elseif($newPassword!=$confirmPassword){
                echo "<script>alert('New password and confirm password does not match')</script>";
            }
            elseif($currentPassword!=$password){
                echo "<script>alert('current password is not correct')</script>";
            }
        }
        else{
            if(empty($_GET['currentPassword'])){
                echo "<script>alert('Please enter your current password')</script>";
            }
            if(empty($_GET['newPassword'])){
                echo "<script>alert('Please enter your new password')</script>";
            }
            if(empty($_GET['confirmPassword'])){
                echo "<script>alert('Please confirm your new password')</script>";
            }
        }
    }


    ?>


    <footer>
        
        <div class="fotcont">
    
            <div class="fotcontt">
                <p>University of Technology and Applied Sciences</p>
                <p>PO Box 135, Khawr As Siyabi, Suhar 311</p>
                <p>Sultanate of Oman</p>
            </div>
            <div class="fotcontt">
                <ul class="fcoimg"><img src="img/call.png" width="20px" >&nbsp; +968 22056900</ul>
                <ul class="fcoimg"><img src="img/mail (1).png" width="20px">&nbsp; Send us email</ul>
                <ul class="fcoimg"><img src="img/pin.png" width="20px">&nbsp; Get Map Direction</ul>
            </div>
            <div class="fotcontt1">
                <img class="px" src="img/sohar-white.png"><br><br>
                <img class="px" src="img/broad-white.png">
            </div>
    
    
        </div>
    
        <div>
            <div></div>
        <div class="foco">
            <img src="img/instagram (2).png" alt="insta" width="50px">
            <img src="img/twitter.png" alt="X" width="30px">
            <img src="img/linkedin-big-logo.png" alt="linkedin" width="30px">
        </div>
    
        <div></div>
    
    </div>
    
    
    </footer>
    
    


</body>
<script>
    AOS.init();
</script>
</html>
