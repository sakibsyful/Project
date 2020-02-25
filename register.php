<?php

include 'conn.php';
$count = 0;
// define variables and set to empty values
$nameErr = $phoneErr = $emailErr = $addressErr = $pwsErr = $timeErr = "";
$name = $phone = $email = $address= $pws = $time = "";



if (isset($_POST['submit'])) {

    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      $count++;
    }
    else {
      $name = test_input($_POST["name"]);
    }
    
    if (empty($_POST["phone"])) {
      $phoneErr = "Phone is required";
      $count++;
    } else {
      $phone = test_input($_POST["phone"]);
    }
      
    if (empty($_POST["email"])) {
      $emailErr = "Phone is required";
      $count++;
    } else {
      $email = test_input($_POST["email"]);
    }
  
    if (empty($_POST["address"])) {
      $addressErr = "Phone is required";
      $count++;
    } else {
      $address = test_input($_POST["address"]);
    }
  
    if (empty($_POST["pws"])) {
      $pwsErr = "Password is required";
      $count++;
    } else {
      $pws = test_input($_POST["pws"]);
    }
    if (empty($_POST["time"])) {
      $timeErr = "Time is required";
      $count++;
    } else {
      $time = test_input($_POST["time"]);
    }

  

  $user_check_query = "SELECT * FROM admit WHERE phone='$phone' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['phone'] === $phone) {
    echo "Phone Number already exists";
  }
}

 // Finally, register user if there are no errors in the form
if ($count == 0) {
//$pws = md5($pws);

//encrypt the password before saving in the database

$query = "INSERT INTO admit (name,phone,email,address,pws,time) 
          VALUES('$name', '$phone', '$email','$address','$pws', '$time')";

if(mysqli_query($db, $query))
{
    echo "Successfully Done";
    header('location: login.php');
}
else{
    echo " Register Failed";
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


<!DOCTYPE html>
<html>
<head>
        <title></title>
        <link rel = "stylesheet" type = "text/css" href = "style2.css">
    </head>
<body>
    
<form method="post" action=" register.php" style="border:1px solid #ccc">  


  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <span class="error"><br> <?php echo $nameErr;?></span>
    <input type="text" placeholder="Enter name" name="name" >

    <label for="phone"><b>Phone</b></label>
    <span class="error"> <br> <?php echo $phoneErr;?></span>
    <input type="tel" placeholder="Enter Phone" name="phone" >

    <label for="email"><b>Email</b></label>
    <span class="error"><br> <?php echo $emailErr;?></span>
    <input type="text" placeholder="Enter Email" name="email" >

    <label for="address"><b>Address</b></label>
    <span class="error"><br>  <?php echo $addressErr;?></span>
    <input type="text" placeholder="Enter Addresss" name="address" >

    <label for="pws"><b>Password</b></label>
    <span class="error"><br>  <?php echo $pwsErr;?></span>
    <input type="password" placeholder="Enter Password" name="pws" >

    <label for="time"><b>Morning/Evening</b></label>
    <span class="error"> <br>  <?php echo $timeErr;?></span>
    <input type="text" placeholder="Enter Your Prefere Time" name="time" >
    
    <div class="clearfix">
      <button type="submit" name = "submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>


</body>
</html>
