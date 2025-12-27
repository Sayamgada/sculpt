<?php

include_once './db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['videoName'];
    $url = $_POST['videoURL'];
    $muscle = $_POST['muscleID'];

    $sql = "INSERT INTO muscle_videos (video_name, video_url, muscle_group_id) VALUES ('$name', '$url', '$muscle')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header("Location: admin_videos.php");
    }
    else
    {
        header("Location: error.php?message=There's some techinical error inserting Video&title=Error inserting video");
    }
}


?>