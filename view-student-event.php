<?php
session_start();
include("dbconnection.php");

$SdID=$_GET['SdID'];

$sql = "SELECT * FROM eventstudent where SdID=$SdID;"; 
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$n=$stmt->rowCount();

if($n>0){


$table_content = "<table border='1' width='50%' align='center'>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Event Id</th>
                        <th>Event Name</th>
                    </tr>";

foreach ($rows as $row) {
    $table_content .= "<tr>";
    $table_content .= "<td>".$row['SdID']."</td>";
    $table_content .= "<td>".$row['SDname']."</td>";
    $table_content .= "<td>".$row['SDemail']."</td>";
    $table_content .= "<td>".$row['EID']."</td>";
    $table_content .= "<td>".$row['EName']."</td>";
    $table_content .= "</tr>";
}

$table_content .= "</table>";

$count = "SELECT * FROM eventstudent where SdID='$SdID'"; 
$result = $conn->query($count);
$numberofstudent = $result->fetch(PDO::FETCH_ASSOC);
$n = $result->rowCount();

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=table.doc");

echo $table_content;
echo "<br><br><h2>Number of Events: ".$n." Events</h2>";
echo "<meta http-equiv=\"refresh\" content=\"4; URL=myprof.php\">";
exit();
}
else {
    echo"<script>alert(\"No Registered Students Yet...\");
    location.replace(\"myprof.php\");</script>";
}



?>
