<?php
session_start();

include 'function/function.php';

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1200)) {
        // last request was more than 1 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();
        headder("location:logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp