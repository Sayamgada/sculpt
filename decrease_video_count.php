<?php
session_start();
include_once './db_connect.php';

$response = ['success' => false];

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Get current count
    $sql = "SELECT video_count FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['video_count'] > 0) {
        // Decrease count
        $update = "UPDATE users SET video_count = video_count - 1 WHERE user_id = $userId";
        if (mysqli_query($conn, $update)) {
            $response['success'] = true;
            $response['new_count'] = $row['video_count'] - 1;
        }
    } 
    else if($row['video_count'] == -1) {
        $response['success'] = true;
    }
    else {
        $response['message'] = 'Video limit reached';
    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>