<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="topic">TOPIC:</label>
    <input type="text" id="topic" name="topic">
    <label>Textarea:</label>
    <div>
        <textarea rows="10" cols="60" name="content" required></textarea>
    </div>
    <input type="submit" name="submit" value="Submit">
</form>
</body>

</html>