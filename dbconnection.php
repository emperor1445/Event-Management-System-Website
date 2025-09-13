<?php
// db.php  — safe PDO connection, no echo
try {
    $conn = new PDO('mysql:host=localhost;port=3306;dbname=prosper', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // don't echo anything here — endpoints must output only JSON or HTML as intended
} catch (PDOException $e) {
    // log error server-side and show a friendly message
    error_log("DB Connection Error: " . $e->getMessage());
    // You can customize the message shown to the user:
    echo "Internal Server Error. Please contact the admin Prosper.";
    exit;
}
?>
