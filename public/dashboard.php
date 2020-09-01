<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

<div class="nav">
    <?php  if (isset($_SESSION['username'])) : ?>
        <p class="intro">Welcome <strong><?php echo $_SESSION['username'];?></strong></p>
    <?php endif ?>
</div>
<p class="logout"> <a href="index.php?logout='1'" style="color: red;">LogOut</a> </p>
<div >

</div>


</body>
</html>