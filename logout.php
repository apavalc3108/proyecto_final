<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
session_destroy();
header("Location: index.php");
exit();
?>

