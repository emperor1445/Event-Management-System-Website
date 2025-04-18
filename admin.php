<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
body{
    text-shadow:3px 3px 3px rgba(0,0,0,0.5);
    box-sizing:border-box;
    padding:0;
    margin:0;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    text-transform: capitalize;
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
        color: white;
        background-color:transparent;
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
        color: white;
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




h1,h2{
    padding-left:2rem;
}

table {
    width: 95%;
    border: solid 1px #f08400;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
    margin:15px 30px;
    margin:auto;

}
table th {
    background-color: #f08400;
    border: solid 1px #f08400;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
table  td {
    border: solid 1px #f08400;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}


        .intro{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25% 0%;
    height: 600px;
    background:
    linear-gradient(to right,rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.36)),
    url('img/admin.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: rgb(255, 255, 255);
    box-shadow: 3px 5px 7px rgba(0, 0, 0, 0.555);
    margin-bottom: 100px;


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

    <div class="intro">
    <div class="container" id="myHeader">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>

        
        <div class="nav">
        <a href="index.html" id="lnk1">home</a>
        <a href="logout.php" id="lnk2">logout</a>
        </div>
    </div>
        <div style="display: flex; justify-content: center; align-items: center;">
            <h1 style="text-shadow: 5px 3px 6px #e06112; font-size: 3rem;">Administrator Page</h1>
        </div>
    </div>

    <h1>Database Tables</h1>
    <br><br><br><br>

    

    <?php
    include('dbconnection.php');


 $sql="select * from student";
 $stmt=$conn->query($sql);
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $n=$stmt->rowCount();
 if($n>0)
 {
 echo "<h2> Student </h2>";
 echo "<table border='2'>";
 echo "<tr>";
	echo "<th>SID</th>";
	echo "<th>Student Name</th>";
	echo "<th>Student user name</th>";
	echo "<th>Student email</th>";
	echo "<th>Student image</th>";
	echo "<th>Student phone</th>";
	echo "<th>student password</th>";
	echo "<th>Student major</th>";
	echo "<th></th>";
 echo "</tr>";

	foreach($rows as $row)
	{
		echo "<tr>";
			echo "<td>{$row['SdID']}</td>";
			echo "<td>{$row['SDname']}</td>";
			echo "<td>{$row['SDusername']}</td>";
			echo "<td>{$row['SDemail']}</td>";
			echo "<td>{$row['SDimg']}</td>";
			echo "<td>{$row['SDphone']}</td>";
			echo "<td>{$row['SDpassword']}</td>";
			echo "<td>{$row['SDmajor']}</td>";
		echo "<td>
			<a href='delete.php?SdID={$row['SdID']}'
			onclick=\"return confirm('Do you want to delete this user?');\">
			Delete</a>
			<a href='adminuserupdate.php?SdID={$row['SdID']}'>
			Update
			</a>
			</td>";
		echo "</tr>";
	}
	echo "</table><br><br>";
}
else
{
    echo "<h2> Student </h2>";
	echo "No Student are registered yet <br><br>";
	
}


?>



<?php

 $sql="select * from staff";
 $stmt=$conn->query($sql);
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $n=$stmt->rowCount();
 if($n>0)
 {
 echo "<h2> Staff </h2>";
 echo "<table border='2'>";
 echo "<tr>";
	echo "<th>STID</th>";
	echo "<th>Staff Name</th>";
	echo "<th>Staff user name</th>";
	echo "<th>Staff email</th>";
	echo "<th>Staff phone</th>";
	echo "<th>Staff password</th>";
	echo "<th>Staff major</th>";
    echo "<th>Staff image</th>";
	echo "<th></th>";
 echo "</tr>";

	foreach($rows as $row)
	{
		echo "<tr>";
			echo "<td>{$row['StID']}</td>";
			echo "<td>{$row['STName']}</td>";
			echo "<td>{$row['STUsername']}</td>";
			echo "<td>{$row['STEmail']}</td>";
			echo "<td>{$row['STphone']}</td>";
			echo "<td>{$row['STPassword']}</td>";
			echo "<td>{$row['STmajor']}</td>";
            echo "<td>{$row['STimg']}</td>";
		echo "<td>
			<a href='deletestaff.php?StID={$row['StID']}'
			onclick=\"return confirm('Do you want to delete this user?');\">
			Delete</a>
			<a href='adminstaffupdate.php?StID={$row['StID']}'>
			Update
			</a>
			</td>";
		echo "</tr>";
	}
	echo "</table><br><br>";
}
else
{
    echo "<h2> Staff </h2>";
	echo "No Staff are registered yet <br><br>";
	
}


?>



<?php

 $sql="select * from event";
 $stmt=$conn->query($sql);
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $n=$stmt->rowCount();
 if($n>0)
 {
 echo "<h2> Event </h2>";
 echo "<table border='2'>";
 echo "<tr>";
	echo "<th>EID</th>";
	echo "<th>Event Name</th>";
	echo "<th>Event Description</th>";
	echo "<th>Event Image</th>";
	echo "<th>Event Major</th>";
	echo "<th>Event Supervisor</th>";
	echo "<th>Start Date</th>";
    echo "<th>End Date</th>";
    echo "<th>Staff ID</th>";
    echo "<th></th>";
 echo "</tr>";

	foreach($rows as $row)
	{
		echo "<tr>";
			echo "<td>{$row['EID']}</td>";
			echo "<td>{$row['EName']}</td>";
			echo "<td>{$row['EDisc']}</td>";
			echo "<td>{$row['EIMG']}</td>";
			echo "<td>{$row['EMajor']}</td>";
			echo "<td>{$row['Supervisor']}</td>";
			echo "<td>{$row['StartDate']}</td>";
            echo "<td>{$row['EndDate']}</td>";
            echo "<td>{$row['StID']}</td>";
		echo "<td>
			<a href='deleteevent.php?EID={$row['EID']}'
			onclick=\"return confirm('Do you want to delete this user?');\">
			Delete</a>
			<a href='admineventupdate.php?EID={$row['EID']}'>
			Update
			</a>
			</td>";
		echo "</tr>";
	}
	echo "</table><br><br>";
}
else
{
    echo "<h2> Event </h2>";
	echo "No Events are Added yet <br><br>";
	
}


?>




<?php

 $sql="select * from eventstudent";
 $stmt=$conn->query($sql);
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $n=$stmt->rowCount();
 if($n>0)
 {
 echo "<h2> Events and Students </h2>";
 echo "<table border='2'>";
 echo "<tr>";
	echo "<th>Student ID</th>";
	echo "<th>Student Name</th>";
	echo "<th>Student Email</th>";
	echo "<th>Event ID</th>";
	echo "<th>Event Name</th>";
    echo "<th></th>";
 echo "</tr>";

	foreach($rows as $row)
	{
		echo "<tr>";
			echo "<td>{$row['SdID']}</td>";
			echo "<td>{$row['SDname']}</td>";
			echo "<td>{$row['SDemail']}</td>";
			echo "<td>{$row['EID']}</td>";
			echo "<td>{$row['EName']}</td>";
		echo "<td>
			<a href='deleteevst.php?SdID={$row['SdID']}&EID={$row['EID']}'
			onclick=\"return confirm('Do you want to delete this user?');\">
			Delete</a>
			</td>";
		echo "</tr>";
	}
	echo "</table><br><br>";
}
else
{
    echo "<h2> Events and Students </h2>";
	echo "No Data in the table <br><br>";
	
}


?>


<?php

 $sql="select * from studentcertificate";
 $stmt=$conn->query($sql);
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $n=$stmt->rowCount();
 if($n>0)
 {
 echo "<h2> Student's Certificates </h2>";
 echo "<table border='2'>";
 echo "<tr>";
	echo "<th>Certificate ID</th>";
	echo "<th>Student ID</th>";
	echo "<th>Certificate Name</th>";
	echo "<th>Certificate Image</th>";
    echo "<th><a href='addcert.php'>Add</a></th>";
 echo "</tr>";

	foreach($rows as $row)
	{
		echo "<tr>";
			echo "<td>{$row['CID']}</td>";
			echo "<td>{$row['SdID']}</td>";
			echo "<td>{$row['Cname']}</td>";
			echo "<td>{$row['Cimg']}</td>";
		echo "<td>
			<a href='deletecert.php?CID={$row['CID']}'
			onclick=\"return confirm('Do you want to delete this user?');\">
			Delete</a>
			</td>";
		echo "</tr>";
	}
	echo "</table><br><br>";
}
else
{
    echo "<h2> Student's Certificates </h2>";
	echo "No Data in the table <br><br>";
	
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
        document.getElementById("lnk1").style.color= "white";
        document.getElementById("lnk2").style.color= "white";
        document.getElementById("lnk3").style.color= "white";
        document.getElementById("lnk4").style.color= "white";
        document.getElementById("lnk5").style.color= "white";
        
      }
    }

</script>

</html>