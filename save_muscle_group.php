<?php

include_once './db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['muscleGroupName'];
    $desc = $_POST['muscleGroupDescription'];

    $file_name = $_FILES['muscleGroupImage']['name'];
    $folder = $_SERVER['DOCUMENT_ROOT'].'/sculpt/Images/muscle_groups'.'/'. $file_name;
    $tmpName = $_FILES["muscleGroupImage"]["tmp_name"];
    if($_FILES['muscleGroupImage']['name']){  
        move_uploaded_file($tmpName,$folder);
        $img = $_FILES['muscleGroupImage']['name'];
    }

    $sql = "INSERT INTO muscle_group (muscle_name, muscle_desc, muscle_image) VALUES ('$name', '$desc', '$img')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header("Location: admin_muscle.php");
    }
    else
    {
        header("Location: error.php?message=There's some error inserting muscle group&title=Erro inserting muscle group");
    }
}


?>