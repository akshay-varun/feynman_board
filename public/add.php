<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="nav">
    <h1 style="text-align: center;padding-top: 20px">Add Your Skill</h1>
</div>
<div class="add">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="topic" style="font-size: 30px">TOPIC:</label>
    <input type="text" id="topic" name="topic" required>
    <br>
    <br>
    <label style="font-size: 30px">Textarea:</label>
    <div>
        <textarea rows="10" cols="60" name="content" required></textarea>
    </div>
    <br>
    <input type="submit" name="submit1" value="Submit">
</form>
</div>
</body>

</html>