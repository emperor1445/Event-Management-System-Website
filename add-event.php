<?php
session_start();
include('dbconnection.php');
$username=$_SESSION['username'];

$sql="SELECT StID FROM staff where STUsername='".$username."';";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);

    $StID=$row['StID'];
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update-info Form</title>
    <link rel="stylesheet" href="add-event.css">
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

    .register-container form{
    max-width: 95%;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0px auto;
    margin-left: 2.5rem;
}

/* FOOTER */
footer {
  background-color: #bc5312;
  color: white;
  padding: 40px 20px;
  text-align: center;
}

footer a {
  color: white;
  text-decoration: none;
  margin: 0 10px;
}

@media (max-width: 768px) {
  .container {
    flex-direction: row;           /* Keep logo and nav side by side */
    justify-content: space-between;
    align-items: center;
    flex-wrap: nowrap;             /* Prevent wrapping */
    padding: 10px 5%;
  }

  .nav {
    flex-direction: row;           /* Keep links horizontal */
    justify-content: flex-end;
    gap: 1rem;
    width: auto;
  }

  .nav a {
    font-size: 0.95rem;
    padding: 0;
  }

  .logo img {
    width: 50px;                   /* Slightly smaller logo for mobile */
  }
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
  <h2>Add Event</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="input-group">
      <label for="Emajor">Event Major:</label>
      <select name="Emajor">
        <option value="IT">IT</option>
        <option value="Engineering">Engineering</option>
        <option value="Other">Other</option>
      </select>
    
      <label for="Ename">Event Name:</label>
      <input type="text" name="Ename" required>
    </div>

    <div class="input-group">
      <label for="EndDate">EndDate:</label>
      <input type="date" name="EndDate" required>
      <label for="Eimg">Event Image:</label>
      <input type="file" name="Eimg" required>
    </div>
        <div class="input-group">
      <label for="Supervisor">Supervisor:</label>
      <input type="text" name="Supervisor" required>
    
      <label for="StartDate">StartDate:</label>
      <input type="date" name="StartDate" required>
    </div>
    <div class="input-group">
    <label for="Edisc">Event Description:</label>
      <textarea name="Edisc" cols="50" rows="5" required></textarea>
      
    </div>
    <button type="submit" class="but" name="add">Add Event</button>
  </form>
</div>


<?php
// Include your database connection file (assuming it's named "dbconnection.php")
include("dbconnection.php");

if (isset($_POST['add'])){

  // Validate form data (basic validation)
  $errors = [];
  if (empty($_POST['Ename'])) {
    $errors[] = "Event Name is required.";
  }
  if (empty($_FILES['Eimg']['name'])) {
    $errors[] = "Event Image is required.";
  }
  if (empty($_POST['Edisc'])) {
    $errors[] = "Event Description is required.";
  }
  if (empty($_POST['Supervisor'])) {
    $errors[] = "Supervisor is required.";
  }
  if (empty($_POST['StartDate'])) {
    $errors[] = "Start Date is required.";
  }
  if (empty($_POST['EndDate'])) {
    $errors[] = "End Date is required.";
  }

  // Check for image upload errors (basic validation)
  $image_upload_error = $_FILES['Eimg']['error'];
  if ($image_upload_error !== UPLOAD_ERR_OK) {
    $errors[] = "Image upload failed with error code: " . $image_upload_error;
  }

  // Check if Start Date is before End Date
  $startDate = strtotime($_POST['StartDate']);
  $endDate = strtotime($_POST['EndDate']);
  if ($startDate >= $endDate) {
    $errors[] = "Start Date must be before End Date.";
  }

  if (!empty($errors)) {
    // Display error messages if validation fails
    echo "<script>alert('" . implode("\n", $errors) . "');</script>";
    // Redirect back to add-event.php for form resubmission
    echo "<meta http-equiv=\"refresh\" content=\"0; URL=add-event.php\">";
  } else {
    // Image upload (improved with error handling)
    $target_dir = "img/uploaded/eventimg/";
    $target_file = $target_dir . basename($_FILES["Eimg"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a real image (basic check)
    $check = getimagesize($_FILES["Eimg"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
    } else {
      $errors[] = "File is not an image.";
          // ... (rest of the code from previous response)
        }

    // Allowed file formats (optional)
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
      $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (empty($errors)) {
      // Prepare image file name to avoid conflicts (optional)
      $temp = explode(".", basename($target_file));
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $target_file = $target_dir . $newfilename;

      // Sanitize user input to prevent SQL injection (important!)
      $sanitized_ename = htmlspecialchars($_POST['Ename']);
      $sanitized_edisc = htmlspecialchars($_POST['Edisc']);
      $sanitized_supervisor = htmlspecialchars($_POST['Supervisor']);
      $sanitized_startdate = htmlspecialchars($_POST['StartDate']);
      $sanitized_enddate = htmlspecialchars($_POST['EndDate']);

      try {
        // Prepare SQL statement using prepared statements
        $sql = "INSERT INTO event (EName, EDisc, EIMG, EMajor, Supervisor, StartDate, EndDate, StID)
                VALUES (:ename, :edisc, :eimg, :emajor, :supervisor, :startdate, :enddate, :stid)";
        $stmt = $conn->prepare($sql);

        // Bind sanitized data to parameters
        $stmt->bindParam(':ename', $sanitized_ename);
        $stmt->bindParam(':edisc', $sanitized_edisc);
        $stmt->bindParam(':eimg', $newfilename); // Use prepared filename
        $stmt->bindParam(':emajor', $_POST['Emajor']);
        $stmt->bindParam(':supervisor', $sanitized_supervisor);
        $stmt->bindParam(':startdate', $sanitized_startdate);
        $stmt->bindParam(':enddate', $sanitized_enddate);
        $stmt->bindParam(':stid', $StID);

        // Execute the prepared statement
        $stmt->execute();

        // Upload the image if insertion is successful
        if (move_uploaded_file($_FILES["Eimg"]["tmp_name"], $target_file)) {
          echo "<script>alert('Event added successfully!');</script>";
          echo "<meta http-equiv=\"refresh\" content=\"1; URL=events.php\">"; // Redirect to events page
        } else {
          echo "<script>alert('Event added, but image upload failed!');</script>";
          // Consider error handling for failed image upload after successful insertion
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      // Display error messages if any occurred during validation
      echo "<script>alert('" . implode("\n", $errors) . "');</script>";
      // Redirect back to add-event.php for form resubmission
      echo "<meta http-equiv=\"refresh\" content=\"0; URL=add-event.php\">";
    }
  
    }
}


?>


<footer>
  <h3>Department of Computer Science</h3>
  <p>© 2025 Rivers State University</p>
  <p>Nkpolu-Oroworukwo, Port Harcourt, Nigeria</p>
  <div>
    <a href="mailto:csdept@rsu.edu.ng">Email Us</a> |
    <a href="#">Visit Website</a>
  </div>
</footer>

<script>
  AOS.init();
</script>

</body>
</html>
