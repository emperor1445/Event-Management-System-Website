<?php

include 'dbconnection.php';

if(isset($_GET['SdID']&&$_GET['EID']))
{
    $SdID=$_GET['SdID'];
    $EID=$_GET['EID'];
    $sql="delete from eventstudent where SdID='$SdID' AND EID='$EID'";
    $stmt=$conn->query($sql);
    $stmt->execute();
    header("Location:admin.php");	 
}

?>