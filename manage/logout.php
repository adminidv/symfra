<?php

session_start();

unset($_SESSION['user']);
session_destroy();

setcookie("username", "", time()-1, "/symfra");
setcookie("pswd", "", time()-1, "/symfra");

header("Location: ../login_form3.php");

?>