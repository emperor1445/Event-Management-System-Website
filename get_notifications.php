<?php
// get_notifications.php
session_start();
header('Content-Type: application/json');

include 'dbconnection.php'; // your PDO $conn

try {
    $userId = isset($_SESSION['SdID']) ? intval($_SESSION['SdID']) : 0;

    // get student's last_seen_eid
    $last_seen_eid = 0;
    if ($userId) {
        $stmt = $conn->prepare("SELECT last_seen_eid FROM student WHERE SdID = :uid LIMIT 1");
        $stmt->execute([':uid' => $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) $last_seen_eid = intval($row['last_seen_eid']);
    }

    // latest EID (max)
    $stmtMax = $conn->query("SELECT MAX(EID) AS latest_eid FROM event");
    $rowMax = $stmtMax->fetch(PDO::FETCH_ASSOC);
    $latest_eid = $rowMax && $rowMax['latest_eid'] ? intval($rowMax['latest_eid']) : 0;

    // new_count = number of events with EID > last_seen_eid (only for logged-in users)
    $new_count = 0;
    if ($userId) {
        $stmtCnt = $conn->prepare("SELECT COUNT(*) AS cnt FROM event WHERE EID > :last");
        $stmtCnt->execute([':last' => $last_seen_eid]);
        $cntRow = $stmtCnt->fetch(PDO::FETCH_ASSOC);
        $new_count = $cntRow ? intval($cntRow['cnt']) : 0;
    }

    // fetch latest 10 events for dropdown
    $stmtList = $conn->query("SELECT EID, EName, EDisc, EIMG, EMajor, Supervisor, StartDate, EndDate FROM event ORDER BY EID DESC LIMIT 10");
    $events = $stmtList->fetchAll(PDO::FETCH_ASSOC);

    $has_new = $userId ? ($new_count > 0) : ($latest_eid > 0);
    $auth = $userId ? true : false;

    echo json_encode([
        'auth' => $auth,
        'events' => $events,
        'latest_eid' => $latest_eid,
        'last_seen_eid' => $last_seen_eid,
        'new_count' => $new_count,
        'has_new' => $has_new
    ]);
    exit;
} catch (PDOException $e) {
    error_log("get_notifications error: " . $e->getMessage());
    echo json_encode([
        'auth' => false,
        'events' => [],
        'latest_eid' => 0,
        'last_seen_eid' => 0,
        'new_count' => 0,
        'has_new' => false,
        'error' => 'server_error'
    ]);
    exit;
}
