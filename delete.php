<?php
require('config.php');
if($_POST['id'])
{
    $valid=$_POST['id'];
    echo $valid;
    $dataq="DELETE FROM form WHERE id=$valid";
    if(mysqli_query($conn,$dataq)){
      header('LOCATION: index.php');
    }
}

?>