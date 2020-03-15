<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<?php session_start(); /* Starts the session */session_destroy(); /* Destroy started session */
header("location:login.php");  /* Redirect to login page */exit;
?>
</body>
</html>