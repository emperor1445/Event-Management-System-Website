<?php

session_start();
include("dbconnection.php");
$username=$_SESSION['username'];
$usertype=$_SESSION['usertype'];
if($usertype=="student"){
$selectsdid="SELECT SdID,SDname,SDemail FROM student WHERE SDusername='".$username."';";
$stmt=$conn->query($selectsdid);
$result=$stmt->fetch(PDO::FETCH_ASSOC);
$SdID=$result['SdID'];
$SDname=$result['SDname'];
$SDemail=$result['SDemail'];

$_SESSION['SdID']=$SdID;
$_SESSION['SDname']=$SDname;
$_SESSION['SDemail']=$SDemail;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evins.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Event Details</title>
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

    <?php
    
    $EID=$_GET['EID'];
    $sql="SELECT * FROM event WHERE EID='$EID'";
    $stmt=$conn->query($sql);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $Ename=$row['EName'];
    $_SESSION['TEMPENAME']=$Ename;
    $EDisc=$row['EDisc'];
    $EIMG=$row['EIMG'];
    $EMajor=$row['EMajor'];
    $Supervisor=$row['Supervisor'];
    $StatrDate=$row['StartDate'];
    $EndDate=$row['EndDate'];
    $EID=$row['EID'];
    $_SESSION['TEMPEID']=$EID;

    ?>

    <div class="allcont" data-aos="fade-up" data-aos-duration="800" style="text-transform: capitalize;">
        <div class="intro" <?php echo"style=\"background-image: url('img/uploaded/eventimg/$EIMG')\""; ?>>


        </div>
        <div class="profile">
        <div>
        <h1 style="padding: 1%; box-sizing: border-box; color: #455bba; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.51);">Event information</h1>
        </div>
        <div class="info">
        
        <div class="disp">
        <p>Name: <?php echo $Ename; ?></p>
        <p>Event id: <?php echo $EID; ?></p>
        <p>Supervisor: <?php echo $Supervisor; ?></p>
        </div>
        <div class="disp">
        <p>Event date: From <?php echo $StatrDate; ?> to <?php echo $EndDate; ?></p>

        <p>Specialization: <?php echo $EMajor; ?></p>
        </div>
    </div>
    </div>

    <div class="discription">
        <h2>Discription</h2>

        <p style="text-transform: capitalize;">
        <?php echo $EDisc; ?>
        </p>

    </div>
    
    <div class="btnss">
        <div class="grp">
            <form method="get" action="">
                <input type="hidden" name="EID" value="<?php echo  $EID; ?>">

    <button class="but" type="submit" name="enroll" style="<?php if($usertype=='staff'){echo "display:none;";} ?>">Enroll</button>
    </form>
    <?php
    if($usertype=='staff'){
        echo "<form method=\"get\" action=\"downloadtable.php\">";
        echo "<input type=\"hidden\" name=\"EID\" value=\"$EID\">";
        echo "<button class=\"but\" type=\"submit\" name=\"download\">Download Enrolled Students</button>";
        echo "</form>";

    }
    ?>
    

    </div>
</div>
</div>

<?php
if(isset($_GET['enroll'])){
    $EName=$_SESSION['TEMPENAME'];
    $EID=$_SESSION['TEMPEID'];
    $SdID=$_SESSION['SdID'];
    $SDname=$_SESSION['SDname'];
    $SDemail=$_SESSION['SDemail'];

    $count = "SELECT * FROM eventstudent where EID='$EID' AND SdID='$SdID';"; 
    $result = $conn->query($count);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $n=$result->rowCount();

    if($n<1){
    
    $inserttoES="INSERT into eventstudent (SdID,SDname,SDemail,EID,EName)
    values(:sdid,:sdn,:sde,:eid,:ena)";
    $stmt=$conn->prepare($inserttoES);
    $stmt->execute(array(
    ':sdid'=> $SdID,
    ':sdn'=> $SDname,
    ':sde'=> $SDemail,
    ':eid'=>$EID,
    ':ena'=>$EName
    ));
    echo "<script>alert(\"You have been enrolled successfully!\");
    location.replace(\"myprof.php\");</script>";
}
else{
    echo "<script>alert(\"You have already enrolled in this event!\")
    location.replace(\"myprof.php\");</script>";
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