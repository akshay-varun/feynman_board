<?php
session_start();


$username = "";
$topic="";
$textareaValue="";
$percentage="";
$errors = array();

$db = mysqli_connect('localhost', 'feynman', 'fem&65n$78@aIOPu*j!248', 'feynman');


if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);


    if (empty($username)) { array_push($errors, "Username is required"); }



    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
            echo "Username already exists";
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO users (username) VALUES('$username')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: dashboard.php');
    }
}

//LogIn Using Username
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username='$username' ";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: dashboard.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

    
//



if (isset($_POST['submit1'])) {

    $topic=$_POST['topic'];
    $_SESSION['topic'] = $topic;
    $textareaValue = trim($_POST['content']);
    $_SESSION['textareaValue'] =  $textareaValue;
    header('location: test.php');
}


$sum=0;
$i=0;
$percentage=0;
if(isset($_POST["level"]))
{
    // Check if any option is selected
    if(isset($_POST["subject"]))
    {
        // Retrieving each selected option

        foreach ($_POST['subject'] as $subject)
            $sum=$sum+$subject;


        foreach ($_POST['subject'] as $subject)
            $i=$i+1;



        $percentage=($sum/($i*4))*100;
        echo $percentage;
        $_SESSION['percentage']=$percentage;
        header('location: dashboard.php');
    }
    else
        echo "Select an option first !!";
}

?>


