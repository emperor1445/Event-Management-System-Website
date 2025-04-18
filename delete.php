<?php

include 'dbconnection.php';

if(isset($_GET['SdID']))
{
    $SdID=$_GET['SdID'];
    $sql="delete from student where SdID='$SdID'";
    $stmt=$conn->query($sql);
    $stmt->execute();
    header("Location:admin.php");	 
}

?>