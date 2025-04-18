<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Login</title>
    <style>


input[type="text"],
input[type="password"],select,input[type="number"] {
    width: 100%;
    margin: 5px auto 15px auto;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.body{
    text-transform: capitalize;
}

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
    
    </style>
</head>
<body>
    
    

    <div class="login-container" data-aos="fade-up" data-aos-duration="800">
        <div style="width: 50%;"><h2>Add Certificate</h2></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="CID">Certificate ID:</label>
                <input type="number" name="CID" id="CID" placeholder="Certificate ID..." required>
                <label for="SdID">Student ID:</label>
                <input type="number" id="SdID" name="SdID" placeholder="Student ID..." required>
            </div>
            <div class="input-group">
                <label for="Cname">Certificate Name:</label>
                <input type="text" id="Cname" name="Cname" placeholder="Certificate Name..." required>
                <label for="Cimg">Certificate Image:</label>
                <input type="file" id="Cimg" name="Cimg" placeholder="Certificate Image..." required>
            </div>
            <button type="submit" name="add" class="but">Add</button>
            
        </form>
    </div>


    <?php
if(isset($_POST['add'])){
include("dbconnection.php");

if (!empty($_POST['CID']) && !empty($_POST['SdID']) && !empty($_POST['Cname']) && !empty($_FILES['Cimg']['name'])) {

  // Sanitize user input (important!)
  $sanitized_cid = htmlspecialchars($_POST['CID']);
  $sanitized_sid = htmlspecialchars($_POST['SdID']);
  $sanitized_cname = htmlspecialchars($_POST['Cname']);

  // Validate image upload (optional)
  $image_upload_error = $_FILES['Cimg']['error'];
  if ($image_upload_error !== UPLOAD_ERR_OK) {
    echo "<script>alert('Image upload failed with error code: " . $image_upload_error . "');</script>";
    exit(); // Terminate script execution on error
  }

  // Prepare image file name to avoid conflicts (optional)
  $temp = explode(".", basename($_FILES["Cimg"]["name"]));
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $target_file = "img/uploaded/certificates/" . $newfilename;

  // Check if image file is a real image (basic check)
  $check = getimagesize($_FILES["Cimg"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
  } else {
    echo "<script>alert('File is not an image.');</script>";
    exit(); // Terminate script execution on error
  }

  try {
    // Prepare SQL statement using prepared statements
    $sql = "INSERT INTO studentcertificate (CID, SdID, Cname, Cimg)
              VALUES (:cid, :sid, :cname, :cimage)";
    $stmt = $conn->prepare($sql);

    // Bind sanitized data to parameters
    $stmt->bindParam(':cid', $sanitized_cid);
    $stmt->bindParam(':sid', $sanitized_sid);
    $stmt->bindParam(':cname', $sanitized_cname);
    $stmt->bindParam(':cimage', $newfilename);

    // Execute the prepared statement
    $stmt->execute();

    // Upload the image if insertion is successful
    if (move_uploaded_file($_FILES["Cimg"]["tmp_name"], $target_file)) {
      echo "<script>alert('Certificate added successfully!');</script>";
      echo "<meta http-equiv=\"refresh\" content=\"1; URL=admin.php\">";
      // Consider redirecting to a success page or displaying a confirmation message
    } else {
      echo "<script>alert('Certificate added, but image upload failed!');</script>";
      // Consider handling failed image upload after successful insertion (e.g., rollback)
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
} else {
  echo "<script>alert('Please fill out all required fields.');</script>";
}}
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
