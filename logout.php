<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
session_destroy();
echo header("location: index.php");
?>