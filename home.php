<?php 
  session_start(); 

  if (!isset($_SESSION['phone'])) {
    $_SESSION['phone'] = null;
  }
 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>FITNESS WORLD</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        <header>
            <div class = "main">
                <div class = "logo">
                    <img src="three.png">
                </div>
                <ul>
                    <li class="active"><a href = "#">Home</a> </li>
                    <li><a href = "#">BMI Calculate</a> </li>
                    <li><a href = "#">Buying Zone</a> </li>
                    <li><a href = "#">Diet Zone</a> </li>
                    <li <?php if($_SESSION['phone']) { ?> style="display:none" <?php } ?>><a href = "register.php">Registration</a> </li>
                    <li <?php if($_SESSION['phone']) { ?> style="display:none" <?php } ?>><a href = "login.php">Log in</a> </li>
                    <li <?php if(!$_SESSION['phone']) { ?> style="display:none" <?php } ?>><a href = "logout.php">Log Out</a> </li>
                    <li <?php if(!$_SESSION['phone']) { ?> style="display:none" <?php } ?>><a href = "profile.php">Profile</a> </li>
                </ul>
            </div>
            <div class = "title">
                <h1>"When You want to give up, remember why You Started..."</h1>
            </div>
            <div class = "button"> 
                <a href = "#" class = "btn">EXERCISE TUTORIAL</a>
            </div>
        </header>
    </body>
</html>