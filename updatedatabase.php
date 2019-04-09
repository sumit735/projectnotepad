<?php 

session_start();

if(array_key_exists("content", $_POST)) {

    include("functions.php");

    $query = "UPDATE `users` SET `note` = '".mysqli_real_escape_string($connection, $_POST['content'])."' WHERE ID ='".mysqli_real_escape_string($connection, $_SESSION["id"])."' LIMIT 1";
    
    mysqli_query($connection, $query);

}


?>