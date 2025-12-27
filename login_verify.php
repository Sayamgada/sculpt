<?php

session_start();
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row)
    {
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['phone'] = $row['user_contact'];

        header("Location: index.php");
    }
    else
    {
        header("Location: error.php?message=Invalid email or password&title=Record not found");
        exit();
    }
}

?>
