<?php

session_start();

if (!isset($_SESSION['name'])) {
    header("location:s_login.php");
    die();
}
