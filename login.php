<?php
include 'dbconnection.php';

session_start();


//if we are trying to log as a student

if($_GET['usertype'] == 'student'){
    
    if (isset($_GET["username"]) && isset($_GET["password"])) {

        $username = $_GET["username"];
        $password = $_GET["password"];
    
        $sql = "SELECT * from student where SDusername = \"$username\" AND SDpassword = \"$password\"";
        $result = $conn->query($sql);
        $n=$result->rowCount();
        if ($n > 0) {
        
            $_SESSION["username"] = $_GET['username'];
            $_SESSION['password']=$password;
            $_SESSION['usertype']=$_GET['usertype'];
            header('location:home.php');
            exit;
    
        }

        elseif(empty($_GET['username'] || $_GET['password'])){

            echo '<script>alert("Your username or password is empty, fill them please");
            location.replace("login.html");</script>';
        }
    
        elseif($n<1){
            echo '<script>alert("Your student\'s username or password is wrong, try again please");
            location.replace("login.html");</script>';
        }
    }
}
//if we are trying to login as staff
elseif($_GET['usertype'] == 'staff'){
    if (isset($_GET["username"]) && isset($_GET["password"])) {

        $username = $_GET["username"];
        $password = $_GET["password"];
    
        $sql = "SELECT * FROM staff WHERE Stusername = '$username' AND Stpassword = '$password'";
        $result = $conn->query($sql);
        $n=$result->rowCount();
        if ($n > 0) {
        
            $_SESSION["username"] = $username;
            $_SESSION['password']=$password;
            $_SESSION['usertype']=$_GET['usertype'];
            header('location:home.php');
            exit;
    
        }

        elseif(empty($_GET['username'] || $_GET['password'])){

            echo '<script>alert("Your username or password is empty, fill them please");
            location.replace("login.html");</script>';
        }
    
        elseif($n<1){
            echo '<script>alert("Your staff\'s username or password is wrong, try again please");
            location.replace("login.html");</script>';
        }
    }
}

//if loging in as ann adminn

elseif($_GET['usertype'] == 'admin'){
    if (isset($_GET["username"]) && isset($_GET["password"])) {

        $username = $_GET["username"];
        $password = $_GET["password"];
    
        $sql = "SELECT * FROM admin WHERE Ausername = '$username' AND Apassword = '$password'";
        $result = $conn->query($sql);
        $n=$result->rowCount();
        if ($n > 0) {
        
            $_SESSION["username"] =$username;
            $_SESSION['password']=$password;
            $_SESSION['usertype']=$_GET['usertype'];
            header('location:admin.php');
            exit;
    
        }

        elseif(empty($_GET['username'] || $_GET['password'])){

            echo '<script>alert("Your username or password is empty, fill them please");
            location.replace("login.html");</script>';
        }
    
        elseif($n<1){
            echo '<script>alert("Your admin\'s username or password is wrong, try again please");
            location.replace("login.html");</script>';
        }
    }
}
?>