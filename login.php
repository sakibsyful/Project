<?php
session_start();

include 'conn.php';


?>


<!DOCTYPE html>
<html>
    <head> 
        <title>LOG IN FORM</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
   <body>
    
       <div class = "container">
       <h2>Login Form</h2>
       <form method="post" action=" login.php" > 
           <input id ="email" type = "tel" name ="phone" placeholder="Enter your Phone" required>
           <input id = "password" type = "password" name ="pws" placeholder="Enter password" required>
           <button type = "submit" name = "btn">Log in</button>
           </form>
           <?php
                if (isset($_POST['btn'])) {
                    $phone = test_input($_POST["phone"]);
                    $pws = test_input($_POST["pws"]);
                   // $pws = md5($pws);
                    $user_check_query = "SELECT * FROM admit WHERE phone='$phone' LIMIT 1";
                    $result = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result);

                    if ($user) { // if user exists
                        
                       // echo $pws;
                        if ($user['phone'] === $phone and $user['pws'] === $pws ) {
                            echo "Login Successfully Done";
                            $_SESSION['phone'] = $phone;
                            header('location: home.php');
                        }
                        else{
                            echo "Login Failed";
                        }
                    }
                }
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>
       </div>
   
  
   </body>

</html>