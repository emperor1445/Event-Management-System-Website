<?php

session_start();
include 'dbconnection.php';


$user=$_SESSION["username"];
$pass=$_SESSION['password'];

if($_SESSION['usertype']=="student"){
    $sql="SELECT * FROM student where SDusername='".$user."';";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $SdID=$row['SdID'];
    $name=$row['SDname'];
    $username=$row['SDusername'];
    $email=$row['SDemail'];
    $phone=$row['SDphone'];
    $major=$row['SDmajor'];
    $img=$row['SDimg'];
}
else{

    $sql="SELECT * FROM staff where STUsername='".$user."';";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $name=$row['STName'];
    $username=$row['STUsername'];
    $email=$row['STEmail'];
    $phone=$row['STphone'];
    $major=$row['STmajor'];
    $img=$row['STimg'];


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myprof.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>My profile</title>
    <style>
        .grp{
    padding: 3px 0px;
    width: 45%;
    margin: 0 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
}
.btnss{
    display: flex;
    flex-direction: column;
    width: 100%;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.351);
    justify-content: space-evenly;
    align-items: center;
    height: 10rem;
    border-radius:  0 0 10px 10px;
    padding: 5rem 0rem;
}
.btnss button{
    border: 1px solid rgba(0, 0, 0, 0.383);
    margin: 10px 2px;
}
    </style>
</head>
<body>
    

    <div class="container" id="myHeader">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>

        
        <div class="nav">
        <a href="home.php" id="lnk3">home</a>
        <a href="events.php" id="lnk4">Events</a>
        <a href="myprof.php" id="lnk5">My profile</a>
        <a href="logout.php" id="lnk3">logout</a>
        </div>
    </div>



    <div class="allcont" data-aos="fade-up" data-aos-duration="800">
        <div class="profile">
        <div>
        <img src="img/uploaded/<?php if($_SESSION['usertype']=="staff"){echo "staffprofile/";} else{echo "studentprofile/";} ?><?php echo $img?>" class="profimg">
        </div>
        <div class="info">
            <div class="disp">
        <p>Name: <?php echo $name;?></p>
        <p>User name: <?php echo $username;?></p>
        <p>Email: <?php echo $email;?></p>
        </div><div class="disp">
        <p>Phone number: <?php echo $phone;?></p>
        <p>Specialization: <?php echo $major;?></p>
        </div>
    </div>
    </div>
    
    <div class="btnss"><div style="display: flex;
    justify-content: space-between;
    max-width: 100%;
    min-width: 70%;">
        <div class="grp">
    <button class="but" ondblclick="location.href='mydeg.php';" style="<?php if($_SESSION['usertype']=="staff"){echo "display:none;";} ?>"> My Certificates</button>
    <button class="but" ondblclick="location.href='add-event.php';" style="<?php if($_SESSION['usertype']=="student"){echo "display:none;";} ?>"> Add Events</button>
    <button class="but" ondblclick="location.href='changeprofileimage.php';">Change profile image</button>
    </div>
    <div class="grp">
        <button class="but" onclick="location.href='chanegpass.php'"> Change password</button>
        <button class="but" onclick="location.href='update-info.php'"> Update informations</button>
    </div></div>
    <div class="grp">
        <form method="get" action="view-student-event.php">
            <input type="hidden" name="SdID" value="<?php echo $SdID?>" style="<?php if($_SESSION['usertype']=="staff"){echo "display:none;";} ?>">
        <button type="submit" class="but" name="view" style="<?php if($_SESSION['usertype']=="staff"){echo "display:none;";} ?>max-width:100%;"> View Enrolled Events</button>
</form>
    </div>
    
</div>
</div>



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
    AOS.init();
    </script>


</html>