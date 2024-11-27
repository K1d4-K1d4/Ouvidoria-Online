<?php
session_start();
session_destroy();
header('Location: ../templts/index.php');
exit();
?>