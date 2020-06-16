<?php
require('config.php');
if(mysqli_connect_errno()){
    echo 'error';
}
else{
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $branch=$_POST['branch'];
        $query="INSERT INTO form(name,email,mobile,branch) VALUES('$name','$email','$phonenumber','$branch')";
        if(mysqli_query($conn,$query)){
                header('LOCATION: index.php');
        }
    }

?>