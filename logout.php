<?php
session_start();
if(isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['phone']);
    header("Location: login.php");
}
?>