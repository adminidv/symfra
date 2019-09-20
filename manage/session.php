<?php

session_start();

if ($_SESSION['user'] != '')
{
  $username = $_SESSION['user'];
}

else
{
  header("Location: login_form3.php");
}

?>