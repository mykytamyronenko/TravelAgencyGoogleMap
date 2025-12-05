<?php
session_start();

session_unset();

session_destroy();

header("Location: homeV2.php");
exit();
?>
