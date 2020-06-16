<?php
require('config.php');
if(mysqli_connect_errno()){
    echo 'error';
}
else{
        $newregister=new register;
        $newregister->name=$_POST['name'];
        $newregister->email=$_POST['email'];
        $newregister->phonenumber=$_POST['phonenumber'];
        $newregister->branch=$_POST['branch'];
        $query="INSERT INTO form(name,email,mobile,branch) 
                VALUES('$newregister->name',
                       '$newregister->email',
                       '$newregister->phonenumber',
                       '$newregister->branch')";
        if(mysqli_query($conn,$query)){
                header('LOCATION: index.php');
        }
    }

?>
