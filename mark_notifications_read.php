<?php
// mark_notifications_read.php
session_start();
header('Content-Type: application/json');

include 'dbconnection.php'; // PDO $conn

try {
    if (!isset($_SESSION['SdID'])) {
        echo json_encode(['success' => false, 'message' => 'Not logged in']);
        exit;
    }

    $userId = intval($_SESSION['SdID']);

    // get current max EID
    $stmt = $conn->query("SELECT MAX(EID) AS maxeid FROM event");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxeid = $row && $row['maxeid'] ? intval($row['maxeid']) : 0;

    if ($maxeid > 0) {
        $upd = $conn->prepare("UPDATE student SET last_seen_eid = :maxeid WHERE SdID = :uid");
        $ok = $upd->execute([':maxeid' => $maxeid, ':uid' => $userId]);
        if ($ok) {
            echo json_encode(['success' => true, 'max_eid' => $maxeid]);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'DB update failed']);
            exit;
        }
    }

    echo json_encode(['success' => true, 'max_eid' => 0]);
    exit;
} catch (PDOException $e) {
    error_log("mark_notifications_read error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'server_error']);
    exit;
}
