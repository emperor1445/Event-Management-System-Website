<?php
session_start();
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Update Event Image</title>
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
    
    </style>
</head>
<body>


    <div class="login-container" data-aos="fade-up" data-aos-duration="800" style="height:25rem; justify-content:center;">
        <div style="width: 50%;"><h2>Change Event Image</h2></div><br><br>
        <form enctype="multipart/form-data" method="post" action="">
            <div class="input-group">
                <label for="profimg" style="font-weight:900;">Upload Your Image:</label><br><br><br>
                <input type="file" name="profimg">
            </div>
            <button type="submit" name="change" class="but">Update</button>
        </form>
    </div>



<?php

if(isset($_POST['change'])){
    
    
    $file_name = $_FILES['profimg']['name'];
    $file_tmp = $_FILES['profimg']['tmp_name'];

    
    
    
    

    if(move_uploaded_file($file_tmp, "img/uploaded/eventimg/".$file_name)){

        $sql = "UPDATE event SET EIMG = :img WHERE EID = :eid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':img', $file_name);
        $stmt->bindParam(':eid', $_SESSION['TEMPEID']); 
        $stmt->execute();
    }
    else{
       
        echo "<script>alert(\"File upload failed.\");
        location.replace(\"admineventimageupdate.php\");</script>";
    }
    
    echo "<meta http-equiv=\"refresh\" content=\"1; URL=admin.php\">";
    exit();
        
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
    AOS.init();
    </script>

</html>
