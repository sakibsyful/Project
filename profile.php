<?php
  
  include 'conn.php';

  session_start(); 

  if (!isset($_SESSION['phone'])) {
    $_SESSION['phone'] = null;
    header('location: login.php');
  }
  
$current_phone = $_SESSION['phone'];
$check= "SELECT * FROM admit WHERE phone= $current_phone LIMIT 1";
$result2 = mysqli_query($db, $check);
$user2 = mysqli_fetch_assoc($result2);



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

 // Finally, register user if there are no errors in the form
if ($count == 0) {
//$pws = md5($pws);

//encrypt the password before saving in the database
$query = "UPDATE admit set name = '$name' ,email = '$email', address = '$address' ,pws = '$pws',time = '$time' where phone = $current_phone"  ;

if(mysqli_query($db, $query))
{
    echo "Successfully Done";
    header('location: home.php');
}
else{
    echo "Update Failed";
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
    
<form method="post" action=" profile.php" style="border:1px solid #ccc">  


  <div class="container">
    <h1>Information</h1>
    
    <hr>
    <label for="name"><b>Name</b></label>
    <span class="error"><br> <?php echo $nameErr;?></span>
    <input type="text" placeholder="Enter name" name="name" value = <?php if($user2)  echo $user2["name"] ; ?>>

    <label for="phone"><b>Phone</b></label>
    <span class="error"> <br> <?php echo $phoneErr;?></span>
    <input type="text" placeholder="Enter Phone" name="phone" value = <?php if($user2)  echo $user2["phone"] ; ?> readonly>

    <label for="email"><b>Email</b></label>
    <span class="error"><br> <?php echo $emailErr;?></span>
    <input type="text" placeholder="Enter Email" name="email" value = <?php if($user2)  echo $user2["email"] ; ?>>

    <label for="address"><b>Address</b></label>
    <span class="error"><br>  <?php echo $addressErr;?></span>
    <input type="text" placeholder="Enter Addresss" name="address" value = <?php if($user2)  echo $user2["address"] ; ?> >

    <label for="pws"><b>Password</b></label>
    <span class="error"><br>  <?php echo $pwsErr;?></span>
    <input type="password" placeholder="Enter Password" name="pws" value = <?php if($user2)  echo $user2["pws"] ; ?> >

    <label for="time"><b>Morning/Evening</b></label>
    <span class="error"> <br>  <?php echo $timeErr;?></span>
    <input type="text" placeholder="Enter Your Prefere Time" name="time" value = <?php if($user2)  echo $user2["time"] ; ?>>
    
    <div class="clearfix">
      <button type="submit" name = "submit" class="signupbtn">Update</button>
    </div>
  </div>
</form>


</body>
</html>
