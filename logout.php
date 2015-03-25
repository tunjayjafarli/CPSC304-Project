<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: header.php"); // Redirecting To Home Page
}
?>