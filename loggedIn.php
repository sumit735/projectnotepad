<?php 

session_start();

// if($_SESSION['name']) {
//     echo  "Hello " . $_SESSION['name'];
// }else {
//     header("location: index.php");
// }

if(array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] =  $_COOKIE['id'];
}

if(array_key_exists("id", $_SESSION)) {
    echo "<p>Hello <a href='index.php?logout=1'>Log Out</a></p>";
} else {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    
</body>
</html>