<?php 
    $error = "";
    if(isset($_POST['signup'])) {
        $connection = mysqli_connect("localhost","root","","notepad");
        // $error = "";
        if(!$_POST['names']) {
            $error .= "a name is required.<br>";
        }
        if(!$_POST['email']) {
            $error .= "an email address is required.<br>";
        }
        if(!$_POST['pass']) {
            $error .= "a password is required.<br>";
        }

        if($_POST['pass'] != $_POST['re_pass']) {
            $error .= "please use the same password.<br>";
        }

        if($error != "") {
            $error = "There were error(s) in your form.<br> ".$error;
        } else {
            $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($connection, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($connection, $query);

            if(mysqli_num_rows($result) > 0) {
                $error .= "This email address is taken";
            } else {
                $name = mysqli_real_escape_string($connection, $_POST['names']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $pass =  mysqli_real_escape_string($connection, $_POST['pass']);

                $query =  "INSERT INTO `users` (`name`,`email`,`password`) VALUES('$name', '$email', '$pass')";
                
                if(!mysqli_query($connection, $query)) {
                    $error .= "couldn't sign you up.please try again later".mysqli_error($connection);
                } else {
                    echo "signup successful";
                }
            }
        }
    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="error" style="background-color: rgb(206, 51, 51)"> <?php echo $error; ?></div>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup" id="signupsection" style="display: none">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="names" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link" id="showSection">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in" id="signinsection">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link" id="hideSection">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		
		$("#showSection").click(function () {

			$("#signinsection").show();
			$("#signupsection").hide();
		});

		$("#hideSection").click(function () {

			$("#signinsection").hide();
			$("#signupsection").show();
		});
	
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>