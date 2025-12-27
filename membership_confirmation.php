<?php
session_start();
include_once './db_connect.php';

header('Content-Type: application/json');

$response = ['success' => false];

if (!isset($_SESSION['id'])) {
    $response['message'] = 'User not logged in.';
    echo json_encode($response);
    exit;
}

$userId = $_SESSION['id'];

$plan = $_POST['selectedPlan'] ?? null;

if (!$plan) {
    $response['message'] = 'No plan selected.';
    echo json_encode($response);
    exit;
}

$durationMap = [
    'quaterly' => 3,
    'half-yearly' => 6,
    'yearly' => 12
];

if (!isset($durationMap[$plan])) {
    $response['message'] = 'Invalid plan selected.';
    echo json_encode($response);
    exit;
}

$months = $durationMap[$plan];

// Dates
$startDate = date('Y-m-d');
$endDate = date('Y-m-d', strtotime("+$months months"));
$video_count = -1;
// Update user record
$sql = "UPDATE users 
        SET membership_plan = '$plan', 
            membership_start_date = '$startDate', 
            membership_end_date = '$endDate', 
            video_count = $video_count 
        WHERE user_id = $userId";

if(mysqli_query($conn, $sql)) {
    $response['success'] = true;
    $response['message'] = 'Membership updated successfully.';
}
else {
    $response['message'] = 'Database update failed.';
}

echo json_encode($response);
exit;

?>