<?php

session_start();
$user=$_SESSION['username'];
$pass=$_SESSION['password'];

include 'dbconnection.php';


if($_SESSION['usertype']=="student"){
    $sql="SELECT * FROM student where SDusername='".$user."' ;";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $name=$row['SDname'];
    $username=$row['SDusername'];
    $email=$row['SDemail'];
    $phone=$row['SDphone'];
    $major=$row['SDmajor'];
    $img=$row['SDimg'];

    $words = explode(' ', $name);
    
    $firstname = $words[0];
    $lastname = implode(' ', array_slice($words, 1));
}
else{
    $sql="SELECT * FROM staff where STUsername='".$user."' ;";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $name=$row['STName'];
    $username=$row['STUsername'];
    $email=$row['STEmail'];
    $phone=$row['STphone'];
    $major=$row['STmajor'];
    $img=$row['STimg'];

    $words = explode(' ', $name);
    
    $firstname = $words[0];
    $lastname = implode(' ', array_slice($words, 1));
}
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update-info Form</title>
    <link rel="stylesheet" href="update-info.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>

.but {
    padding: 5px 25px;
    font-size: 1rem;
    color: #fff;
    font-weight: 600;
    transition: all .2s;
    position: relative;
    border: none;
    border-radius: 5px;
    background: #443eb3;
    transform: scale(1.1);
  }

.but:before,.but:after {
    content: "";
    position: absolute;
    top: 50%;
    background: #e76e22;
    height: 108%;
    width: 0;
    z-index: -1;
    transition: all .35s;
    transform: translateY(-50%);
    
    
  }
  
  .but:before {
    left: 0%;
    border-radius: 0px 5px 5px 0px;
  }
  
  .but:after {
    right: 0%;
    border-radius: 5px 0px 0px 5px;
    
  }
  
  .but:hover {
    color: #fff;
    box-shadow: #e06112 0 30px 60px -12px inset, #ffffff 0 18px 36px -18px inset, 7px 7px 3px  #443eb3;
    z-index: 2;
  }
  
  .but:hover::before {
    width: 50%;
    left: 50%;
  }
  
  .but:hover::after {
    width: 50%;
    right: 50%;
  } 

        .container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 99.5%;
        box-sizing: border-box;
        position: fixed;
        top: 0;
        width: 100%;
        color: black;
        background-color:white;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.569),3px 3px 5px rgba(0, 0, 0, 0.569);
        transition: 0.5s;
        padding-bottom: 5px;
        z-index: 1000; /* or any higher value */

    }
    .logo{
        display: flex;
        margin: 0px 0px 3px 17px;
    }
    .logo img{
        width: 65px;
    }
    .nav{
        display: flex;
        justify-content: space-around;
        flex-direction: row;
    
    }
    
    .nav a{
        padding-right: 2rem;
        text-decoration: none;
        font-weight: 700;
        font-size: large;
        color: black;
        font-weight: 900;
        transition: 0.3s;
    }
    .nav a:hover{
        transform: scale(1.1);
        transition-duration: 0.6s;
        color: #e06112;
        text-shadow:3px 3px 4px black;
    }
    .px{
        max-width: 269px;
    }
     .sticky{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 99.5%;
        position: fixed;
        top: 0;
        width: 100%;
        color: black;
        background-color:white;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.569),3px 3px 5px rgba(0, 0, 0, 0.569);
        transition: 0.5s;
        padding-bottom: 5px;
        z-index: 1000; /* or any higher value */
    
     }
     .sticky + .intro{
        margin-top: 110px;
        
     }



    
     
footer{
    margin-top: 100px;
    color: white;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #e06112;
    padding: 5% 0% 0% 0%;
}
.fotcont{
    font-size: large;
    color: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 25px;
    margin-right: 25px;
}

.fotcontt{
    color: white;
}
.fotcontt1{
    max-width: 269px;
}
.px{
    max-width: 269px;
}


     .foco {
        width: 100%;
        background-color: #bc5312;
        color: white;
        display: flex;
        box-sizing: border-box;
        justify-content: space-around;
        align-content: center;
        align-items: center;
        margin-top: 10px;
    }
    </style>

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




    <div class="register-container" data-aos="fade-up" data-aos-duration="800">
        <h2>Update</h2>
        <form method="get">
            <div class="input-group">
                <select name="usertype" style="display:none;">
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                </select>
                <label for="userSpecialization">Specialization</label>
                <select name="userSpecialization">
                    <option value="IT">IT</option>
                    <option value="Engineering">Engineering</option>
                </select>
            </div>
            <div class="input-group">
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" value="<?php if( isset($firstname) ) echo $firstname; ?>" required>

            </div>
            <div class="input-group">
                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" value="<?php if(isset( $lastname )) echo $lastname; ?>" required>

            </div>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php if(isset($username)) echo $username; ?>" readonly>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php if( isset($email) ) echo $email; ?>" required>


            </div>
            <div class="input-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" value="<?php   if( isset($phone) ) echo $phone; ?>" required>



            </div>
            <button type="submit" class="but" name="update">Update</button>
        </form>
    </div>

    <?php
    


    if(isset($_GET['update'])){
            if(!empty(
	            $_GET['firstname']&& 
	            $_GET['lastname']&& 
	            $_GET['email']&&
	            $_GET['phone']))
	            {
                    $name="".$_GET['firstname']." ".$_GET['lastname']."";
                    $email=$_GET['email'];
                    $phone=$_GET['phone'];
                    $major=$_GET['userSpecialization'];
                    
                    if($_SESSION['usertype']=="student"){
                        $sql="UPDATE student SET SDname=:sdn ,SDemail=:sde ,SDphone=:sdp ,SDmajor=:sdm
                        WHERE SDusername='".$_GET['username']."';";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(array(
                            ':sdn'=>$name,
                            ':sde'=>$email,
                            ':sdp'=>$phone,
                            ':sdm'=>$major));
                    }
                    else{
                        $sql="UPDATE staff SET STName=:stn ,STEmail=:ste ,STphone=:stp ,STmajor=:stm
                        WHERE STUsername='".$_GET['username']."';";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(array(
                            ':stn'=>$name,
                            ':ste'=>$email,
                            ':stp'=>$phone,
                            ':stm'=>$major));
                    }
                        echo "<meta http-equiv=\"refresh\" content=\"1; URL=myprof.php\">";
                        exit;
                    }
                    else{
                    
                        if(empty($_GET['firstname']))
                        echo '<script>alert("Your first name is empty, fill it please");
                        location.replace("ubdateinfo.php");</script>';
                        if(empty($_GET['lastname']))
                        echo '<script>alert("Your last name is empty, fill it please");
                        location.replace("ubdateinfo.php");</script>';
                    
                        if(empty($_GET['email']))
                        echo '<script>alert("Your email is empty, fill it please");
                        location.replace("ubdateinfo.php");</script>';
                    
                        if(empty($_GET['phone']))
                        echo '<script>alert("Your phone is empty, fill it please");
                        location.replace("ubdateinfo.php");</script>';
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
    window.onscroll = function() {myFunction()};
    
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    
    
    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.setAttribute("class","sticky");
        document.getElementById("lnk1").style.color= "black";
        document.getElementById("lnk2").style.color= "black";
        document.getElementById("lnk3").style.color= "black";
        document.getElementById("lnk4").style.color= "black";
        document.getElementById("lnk5").style.color= "black";
      } else {
        header.setAttribute("class","container");
        document.getElementById("lnk1").style.color= "black";
        document.getElementById("lnk2").style.color= "black";
        document.getElementById("lnk3").style.color= "black";
        document.getElementById("lnk4").style.color= "black";
        document.getElementById("lnk5").style.color= "black";
        
      }
    }
    </script>
    <script>
        AOS.init();
    </script>

</html>
