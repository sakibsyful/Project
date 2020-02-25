<?php
  include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "admin.css">

</head>
<body>

<h2>Member Table</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Address</th>
    <th>Time</th>
    <th> </th>
  </tr>

  <?php
  $user_check_query = "SELECT * FROM admit ";
  $result = mysqli_query($db, $user_check_query);

  while($user = mysqli_fetch_assoc($result))
  {

    ?>
    <tr>
    <td><?php echo $user["name"] ?></td>
    <td><?php echo $user["phone"] ?></td>
    <td><?php echo $user["email"] ?></td>
    <td><?php echo $user["address"] ?></td>
    <td><?php echo $user["time"] ?></td>
    <td><a href= "admin.php?phone=<?php echo $user['phone'] ?>" onclick="return confirm('Do you want to delete?')" >Delete</a></td>
  </tr>
    <?php
    
  }

  ?>

  
  
</table>

<?php

if(isset($_GET['phone']))
{
   $dlt = "delete from  admit where phone =  " .$_GET['phone']  ;
   if(mysqli_query($db, $dlt))
{
    echo "Successfully Delete";
    header('location: admin.php');
}
else{
    echo "Delete Failed";
}
}

?>

</body>
</html>