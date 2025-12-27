<?php
session_start();
session_destroy();

if(isset($_SESSION['id']))
{
    header("Location: index.php");
}
else
{
    header("Location: error.php?message=Error in logging out. Please try again.");
}

?>