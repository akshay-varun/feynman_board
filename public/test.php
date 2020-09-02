<?php include('server.php') ?>
<!DOCTYPE html>
<head>
    <title>
        Feynman Dashboard
    </title>
    <style>
        /* Style The Dropdown Button */
        .dropbtn {
            color: #0a0a0a;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            background-color: white;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;

            min-width: 160px;
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content option {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: beige;
        }
        .green{
            color: #3e8e41;
            font-weight: bold;
        }
        .orange{
            color: coral;
            font-weight: bold;
        }
        .blue{
            color: blue;
            font-weight: bold;
        }
        .red{
            color: red;
            font-weight: bold;
        }
        select{
            width: 150px;
            height: 40px;
            background-color: #d8decd;
        }
       option{
                font-size: 20px;
        }
        input{
            width: 140px;
            height: 40px;
        }
    </style>
</head>
<body>

<?php

$user="";
$percentage="";
function multiexplode($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

    $user=$_SESSION['username'];
    $text=$_SESSION['textareaValue'];
    $topic=$_SESSION['topic'];
    $percentage=$_SESSION['percentage'];
    $exploded = multiexplode(array(",", ".", "|", ":", "(", ")", "?", "/", "!"), $text);
    $max = count($exploded);
    $i = 0;
    while ($i < $max) {
        echo "<form method = 'post' action='test.php'>
   <div class=dropdown>" .
            "<button class=dropbtn >" . $exploded[$i] . "</button>" .
            "<div class=dropdown-content>" .
            "<select name = 'subject[]' onchange=\"this.className=this.options[this.selectedIndex].className\" >" .
            "<option value=\"0\" ></option>" .
            "<option value=\"4\" class=green>UNDERSTOOD</option>" .
            "<option value=\"3\" class=orange>SOMEWHAT UNDERSTOOD</option>" .
            "<option value=\"2\" class=blue>NOT CLEAR</option>" .
            "<option value=\"1\" class='red'>WHAT RUBBISH</option>" .
            "</select>" .
            "</div>" .
            "</div>";

        $i++;
    }
    echo "<input type = 'submit' name = 'level' value = Submit> ";
    $serialized_array = serialize($exploded);
    if (isset($_POST['level'])) {
        $sql = "insert into dashboard (username,topic,percentage,textarea) values ('$user','$topic',$percentage,'$serialized_array')";
        mysqli_query($db, $sql);
    }

?>

</body>

