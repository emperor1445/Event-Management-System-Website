
<?php
session_start();
include('dbconnection.php');

$username=$_SESSION['username'];

$sql="SELECT SdID FROM student where SDusername='".$username."';";
$stmt=$conn->query($sql);
$result=$stmt->fetch(PDO::FETCH_ASSOC);

$SdID=$result['SdID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mydeg.css">
    <title>Events</title>

    <style>
        .intro{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25% 0%;
    height: 600px;
    background:
    linear-gradient(to bottom, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0)),
    url('img/certificateintro.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: rgb(255, 255, 255);
    box-shadow: 3px 5px 7px rgba(0, 0, 0, 0.555);
    margin-bottom: 100px;


}


    </style>
    
</head>
<body>

    <div class="intro">

        <div class="container" id="myHeader">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
    
            
            <div class="nav">
            <a href="home.php" id="lnk1">home</a>
            <a href="events.php" id="lnk3">Events</a>
            <a href="myprof.php" id="lnk2">My profile</a>
            <a href="logout.php" id="lnk4">logout</a>

            </div>
        </div>

        <div style="display: flex; justify-content: center; align-items: center;">
        <h1 style="text-shadow: 5px 3px 6px #e06112; font-size: 3rem;">My Certificates</h1>
</div>
    </div>


    
<section class="news">

    <?php 
    
    $sql="SELECT Cname,Cimg FROM studentcertificate where SdID='".$SdID."';";
    $stmt=$conn->query($sql);
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $n=$stmt->rowCount();
    if($n<1){
        echo "<h1 style='text-align: center; font-size: 3rem;'>No Certificates</h1>";
    }
    else{
        foreach($rows as $row){
            echo "<div class=\"insnews\" data-aos=\"fade-up\">";
            echo "<h1>{$row['Cname']}</h1><br><br>";
            //echo "<div class=\"newsinfo\">";
            echo "<img src=\"img/uploaded/certificates/{$row['Cimg']}\" class=\"newsinfo\">";
            echo "</div>";
        }
    }
    ?>



</section>




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
                document.getElementById("lnk1").style.color= "white";
                document.getElementById("lnk2").style.color= "white";
                document.getElementById("lnk3").style.color= "white";
                document.getElementById("lnk4").style.color= "white";
                document.getElementById("lnk5").style.color= "white";
                
              }
            }
            </script>
            <script>
                AOS.init();
              </script>