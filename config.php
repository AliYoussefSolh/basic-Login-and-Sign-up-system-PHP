<?php
$server = "localhost";
$db_username = "root";
$db_password = "";
$database = "login-and-signup";
$connection = mysqli_connect($server, $db_username, $db_password, $database);
if (!$connection) {
    die("<script> alert('connection failed')</script>");
}
