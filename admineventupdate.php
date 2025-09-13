<?php

session_start();
include 'dbconnection.php';

$EID=$_GET['EID'];

    $sql="SELECT * FROM event where EID='".$EID."' ;";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $EID=$row['EID'];
    $EName=$row['EName'];
    $EDisc=$row['EDisc'];
    $EMajor=$row['EMajor'];
    $Supervisor=$row['Supervisor'];
    $StartDate=$row['StartDate'];
    $EndDate=$row['EndDate'];
    $StID=$row['StID'];
    $_SESSION['TEMPEID']=$EID;


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
    max-width: 50%;
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
    margin:0 auto;
    
  }
  input[type="number"] {
    width: 80%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 10px auto;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.526);
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



<div class="register-container" data-aos="fade-up" data-aos-duration="800">
  <h2>Update Event</h2>
  <form method="get" action="">
    <div class="input-group">
      <label for="EMajor">Event Major:</label>
      <select name="EMajor">
        <option value="IT"<?php if($EMajor == "IT") echo "selected"; ?>>IT</option>

        <option value="Engineering" <?php  if($EMajor == "Engineering") echo "selected"; ?>>Engineering</option>

        <option value="Other" <?php if( $EMajor == "Other") echo "selected"; ?>>Other</option>

      </select>
      <label for="EID">Event ID:</label>
      <input type="text" name="EID" value="<?php if(isset($EID)){echo $EID;} ?>" readonly>
      
    </div>
    <div class="input-group">
      <label for="Supervisor">Supervisor:</label>
      <input type="text" name="Supervisor" value="<?php if(isset($Supervisor)){echo $Supervisor;} ?>" required>
    
      <label for="StartDate">StartDate:</label>
      <input type="date" name="StartDate" value="<?php if(isset($StartDate)){echo $StartDate;} ?>" required>
    </div>
    <div class="input-group">
      <label for="EndDate">EndDate:</label>
      <input type="date" name="EndDate" value="<?php if(isset($EndDate)){echo $EndDate;} ?>" required>
      <label for="EName">Event Name:</label>
      <input type="text" name="EName" value="<?php if(isset($EName)){echo $EName;} ?>" required>
    </div>
    <div class="input-group">
    <label for="EDisc">Event Description:</label>
      <textarea name="EDisc" cols="50" rows="5" required><?php if(isset($EDisc)){echo $EDisc;} ?></textarea>
      <label for="StID">Staff ID:</label>
      <input type="number" name="StID" value="<?php if(isset($StID)){echo $StID;} ?>" required>
      
    </div>
    <button type="submit" class="but" name="update">Update Event</button>
  </form>
  <p>To Update The Image, Click ON <a href="admineventimageupdate.php">Update Image</a></p>
</div>

    <?php
    


    if(isset($_GET['update'])){
            if(!empty(
	            $_GET['EID']&& 
	            $_GET['EName']&& 
	            $_GET['EMajor']&&
	            $_GET['Supervisor']&&$_GET['StartDate']
                &&$_GET['EndDate']&&$_GET['EDisc']&&$_GET['StID']))
	            {
                    $EID = $_GET['EID'];
                    $EName = $_GET['EName'];
                    $EMajor = $_GET['EMajor'];
                    $Supervisor = $_GET['Supervisor'];
                    $StartDate = $_GET['StartDate'];
                    $EndDate = $_GET['EndDate'];
                    $EDisc = $_GET['EDisc'];
                    $StID=$_GET['StID'];

                    try {
                        $sql = "UPDATE event SET EName=:ename, EDisc=:edisc, EMajor=:emajor, Supervisor=:sup, StartDate=:stdt, EndDate=:endt, StID=:stid
                                 WHERE EID=:eid";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array(
                            ':ename' => $EName,
                            ':edisc' => $EDisc,
                            ':emajor' => $EMajor,
                            ':sup' => $Supervisor,
                            ':stdt' => $StartDate,
                            ':endt' => $EndDate,
                            ':stid' => $StID,
                            ':eid' => $EID
                        ));
                    
                        if ($stmt->rowCount() > 0) {
                            echo "<meta http-equiv=\"refresh\" content=\"2; URL=admin.php\">";
                            exit;
                        } else {
                            echo "Update failed";
                        }
                    } catch (PDOException $e) {
                        if (strpos($e->getMessage(), 'StID')!== false) {
                            echo "<script>alert('StID Does Not Exist (FOREIGN KEY ERORR)');</script>";
                        }
                        echo "Error updating event: ". $e->getMessage();
                        echo "<meta http-equiv=\"refresh\" content=\"2; URL=admin.php\">";
                    }
                    }
                    else{
                    
                        if(empty($_GET['EName']))
                        echo '<script>alert("Your Event name is empty, fill it please");
                        location.replace("admineventepdate.php");</script>';
                        if(empty($_GET['EDisc']))
                        echo '<script>alert("Your Event Description is empty, fill it please");
                        location.replace("admineventepdate.php");</script>';
                    
                        if(empty($_GET['Supervisor']))
                        echo '<script>alert("Your Event Supervisor is empty, fill it please");
                        location.replace("admineventepdate.php");</script>';
                    
                        if(empty($_GET['StartDate']))
                        echo '<script>alert("Your Start Date is empty, fill it please");
                        location.replace("admineventepdate.php");</script>';

                        if(empty($_GET['EndDate']))
                        echo '<script>alert("Your End Date is empty, fill it please");
                        location.replace("admineventepdate.php");</script>';
                    }
                }


            



    ?>
<footer>
    <div>
        <h3>Department of Computer Science</h3>
        <p>© 2025 Rivers State University</p>
        <p>Nkpolu-Oroworukwo, Port Harcourt, Nigeria</p>
        <div style="margin-top: 10px;">
            <a href="mailto:csdept@rsu.edu.ng">Email Us</a> |
            <a href="#">Visit Website</a>
        </div>
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
