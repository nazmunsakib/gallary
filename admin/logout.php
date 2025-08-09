<?php 
include("includes/header.php");

$session->logout();
Helper::redirect('login.php');