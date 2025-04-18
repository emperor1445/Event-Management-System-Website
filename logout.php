<?php
session_start();
session_unset();
session_destroy();
echo '<script>alert("Thanks for using our website.");
location.replace("index.html");</script>';
?>