<?php
session_start();

if(!isset($_SESSION['caiso'])){
    header("Location: login.php");
    exit;
}