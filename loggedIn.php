<?php 

session_start();
$diaryContent = "";
// if($_SESSION['name']) {
//     echo  "Hello " . $_SESSION['name'];
// }else {
//     header("location: index.php");
// }

if(array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] =  $_COOKIE['id'];
}

if(array_key_exists("id", $_SESSION)) {
    include("functions.php");
    $query = "SELECT `note` FROM `users` WHERE ID = '".mysqli_real_escape_string($connection, $_SESSION['id'])."' LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($connection, $query));
    $diaryContent = $row['note'];
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="loggedIn.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Diary</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                
                
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="loggedIn.php">Home</a>
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="contact.php">Contact Us</a>
                        <a class="dropdown-item" href="index.php?logout=1">Sign Out</a>
                    </div>
                </div>

            </form>
            <!-- <a href="index.php?logout='1'">Log Out</a> -->
        </div>
    </nav>

    <div class="container-fluid">
        <form>
            
            <div class="form-group main">
                <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                <textarea class="form-control" name="note" id="note" rows="23"><?php echo $diaryContent; ?></textarea>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        
        $('#note').bind('input propertychange', function() {

            $.ajax({
                method: "POST",
                url: "updatedatabase.php",
                data: { content: $("#note").val() }
                });
        });
    
    </script>
</body>
</html>