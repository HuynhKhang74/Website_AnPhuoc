<?php
session_start();
include '../library/functions.php';
unset($_SESSION['username']);
redirect("login.php");