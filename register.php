<?php
session_start();
include 'dbconnection.php';

if(!empty($_GET['firstname'] && 
$_GET['lastname'] &&$_GET['username'] && $_GET['password'] && $_GET['email'] && 
$_GET['phone'])&& $_GET['password']==$_GET['repassword']){
    if($_GET['usertype']=="student"){
    if( filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
        $check="SELECT SDusername , SDemail from student where SDusername='".$_GET['username']."' OR SDemail='".$_GET['email']."';";
        $result=$conn->query($check);
        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
        $n=$result->rowCount();
        if($n<1){

            $studentname= "".$_GET['firstname']." ".$_GET['lastname']."";
            $sql="insert into student (SDname,SDusername,SDemail,SDphone,SDpassword,SDmajor)
            values(:sdn,:sdu,:sde,:sdp,:sdpa,:sdm)";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array(
            ':sdn'=> $studentname,
            ':sdu'=> $_GET['username'],
            ':sde'=> $_GET['email'],
            ':sdp'=> $_GET['phone'],
            ':sdpa'=> $_GET['password'],
            ':sdm'=> $_GET['userSpecialization']
            ));
            $_SESSION['usertype']=$_GET['usertype'];
            $_SESSION['username']=$_GET['username'];
            $_SESSION['password']=$_GET['password'];
            header("Location:home.php");
            exit;
        }else{
            echo "<script>alert(\"Username or Email already exists.\");
            location.replace(\"register.html\");</script>";
        }
    }
    elseif(!is_numeric($_GET['phone'])){
        echo '<script>alert("wrong phone format, it should be number.");
        location.replace("register.html");</script>';
    }
    elseif(!is_numeric($_GET['password'])){
        echo '<script>alert("wrong password format, it must be numeric, refill the form.");
        location.replace("register.html");</script>';
    }
    elseif(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
        echo '<script>alert("wrong email format refill the form.");
        location.replace("register.html");</script>';
    }
}
elseif($_GET['usertype']=="staff"){
        if( filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
            
            $check="SELECT STUsername , STEmail from staff where STUsername='".$_GET['username']."' OR STEmail='".$_GET['email']."';";
            $result=$conn->query($check);
            $rows=$result->fetchAll(PDO::FETCH_ASSOC);
            $n=$result->rowCount();
            if($n<1){


                $staffname= "".$_GET['firstname']." ".$_GET['lastname']."";
                $sql="insert into staff (STname,STusername,STemail,STphone,STmajor,STpassword)
                values(:stn,:stu,:ste,:stp,:stm,:stpa)";
                $stmt=$conn->prepare($sql);
                $stmt->execute(array(
                ':stn'=> $staffname,
                ':stu'=> $_GET['username'],
                ':ste'=> $_GET['email'],
                ':stp'=> $_GET['phone'],
                ':stm'=> $_GET['userSpecialization'],
                ':stpa'=> $_GET['password']
                ));
                $_SESSION['usertype']=$_GET['usertype'];
                $_SESSION['username']=$_GET['username'];
                $_SESSION['password']=$_GET['password'];
                header("Location:home.php");
                exit;
            }
            else{
                echo "<script>alert(\"Username or Email already exists.\");
                location.replace(\"register.html\");</script>";
            }
        }
        elseif(!is_numeric($_GET['phone'])){
            echo '<script>alert("wrong phone format, it should be number.");
            location.replace("register.html");</script>';
        }
        elseif(!is_numeric($_GET['password'])){
            echo '<script>alert("wrong password format, it must be numeric, refill the form.");
            location.replace("register.html");</script>';
        }
        elseif(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
            echo '<script>alert("wrong email format refill the form.");
            location.replace("register.html");</script>';
        }
}
}
else
{
	if(empty($_GET['username']))
		echo "<script>alert(\"Username is empty\");
        location.replace(\"register.html\");</script>";
	if(empty($_GET['password']))
    echo "<script>alert(\"Password is empty\");
    location.replace(\"register.html\");</script>";
	if(empty($_GET['firstname']))
		echo "Firstname is empty";
    if(empty($_GET['lastname']))
	echo "Lastname is empty";
    if(empty($_GET['email']))
	echo "Email is empty";
    if(empty($_GET['phone']))
	echo "Phone is empty";
    if($_GET['password']!=$_GET['repassword'])
    echo "<script>alert(\"The password and the confirmation password are not equal!\");
        location.replace(\"register.html\");</script>";
}
?>
