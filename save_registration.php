<?php

session_start();
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $name = $fname.' '.$lname;

    $check = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        header("Location: error.php?message=Email already exists. Please try again.");
        exit();
    }

    $sql = "INSERT INTO users (user_name, user_email, user_contact, user_dob, user_password) VALUES ('$name', '$email', '$phone', '$dob', '$password')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $data = "SELECT * FROM users WHERE user_email = '$email'";
        $result = mysqli_query($conn, $data);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['phone'] = $row['user_contact'];

        header("Location: index.php");
    }
    else
    {
        header("Location: error.php?message=Error in registration. Please try again.");
    }
    
}

?>