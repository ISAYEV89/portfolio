<?php
session_start();
unset($_SESSION["user"]);
header("Location: $site_url/admin/login.php");

?>