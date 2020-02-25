<?php

$db = mysqli_connect('localhost','root','','gym');



if($db)
{
   echo "connected";
}
else{
    echo "Eror";
}
?>