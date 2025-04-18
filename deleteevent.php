<?php

include 'dbconnection.php';

if(isset($_GET['EID']))
{
    $EID=$_GET['EID'];
    $sql="delete from event where EID='$EID'";
    $stmt=$conn->query($sql);
    $stmt->execute();
    header("Location:admin.php");	 
}

?>