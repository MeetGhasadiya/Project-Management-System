<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'pms';
$c = mysqli_connect($host, $user, $pass, $db) or die("Error while connecting");
session_start();
?>