<?php

include 'dbconnection.php';

if(isset($_GET['StID']))
{
    $StID=$_GET['StID'];
    $sql="delete from staff where StID='$StID'";
    $stmt=$conn->query($sql);
    $stmt->execute();
    header("Location:admin.php");	 
}

?>