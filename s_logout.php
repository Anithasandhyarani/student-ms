<?php
session_start();


if (session_destroy()) {
    header("Location:s_login.php");
}
