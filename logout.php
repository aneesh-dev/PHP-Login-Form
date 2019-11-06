<?php
$_SESSION["user_name"];
session_destroy();
setcookie("user"," ");
header("Location:index.php");
?>
