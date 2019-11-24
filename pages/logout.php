<?php

include('../php/functions/session_start.php');

session_destroy();

if (isset($_COOKIE['username'])) {

    unset($_COOKIE['username']);

    setcookie('username', '', time() - 86400);

}


header("Location: http://localhost:8888/timesheet_control/index.php");




?>