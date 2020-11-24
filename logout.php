<?php
session_start();

if(session_destroy()) {
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);
    header("location: index.php");
}
?>