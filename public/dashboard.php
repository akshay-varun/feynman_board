<?php include('server.php') ?>
<?php


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
<div class="add">
    <form method="get" action="add.php">
        <button type="submit">ADD TOPIC</button>
    </form>
</div>
<div>
</div>
<br>
<br>
<div class="table">
<span>TOPIC</span> <span class="percentage">PERCENTAGE</span>
<br>
<br>
 <hr>
<?php
$username=$_SESSION['username'];
$query = "SELECT topic,percentage from dashboard where username='$username'";
$result = mysqli_query($db, $query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<tr>
    <td><span style="padding-right: 80px"><?php echo $row['topic']," : ";?></span></td>

    <td ><span style="padding-left: 80px"><?php echo $row['percentage'],"%"; echo "<br>";echo "<br>";echo "<br>"  ?></span></td>
    <hr>
</tr>
<?php
    }
}
?>
</div>


</body>
</html>