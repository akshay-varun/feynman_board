<?php include('server.php') ?>
<!DOCTYPE html>
<head>
    <title>
        Feynman Dashboard
    </title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="login">
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="index.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <br>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <br>
    <p>
        Not yet at Registered?
        <br>
        <a href="register.php">Sign up</a>
    </p>
</form>
</div>
</body>