<?php

include 'dbconnection.php';

if(isset($_GET['CID']))
{
    $CID=$_GET['CID'];
    $sql="delete from studentcertificate where CID='$CID'";
    $stmt=$conn->query($sql);
    $stmt->execute();
    header("Location:admin.php");	 
}

?>