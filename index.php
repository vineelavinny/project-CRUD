<?php
require('config.php');
if(mysqli_connect_errno()){
    echo 'error';
}
else{
$dataq="SELECT * FROM form";
$result=mysqli_query($conn,$dataq);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<style>
    body{
        background-image: url(https://media.istockphoto.com/photos/blue-abstract-background-or-texture-picture-id1138395421?k=6&m=1138395421&s=612x612&w=0&h=bJ1SRWujCgg3QWzkGPgaRiArNYohPl7-Wc4p_Fa_cyA=);
    }
</style>
<body>
    <div class="py-5 container-fluid ">
        <center>
        <div class="col-lg-8">
            <div class="card ">
                <div class="container">
                    <div class="row">
                      <div class="mx-auto col-md-10 col-10 bg-white p-5">
                        <h1 class="mb-4 ">Registration Form</h1>
                        <form action="form.php" method="post">
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Name" name="name" required> </div>
                          <div class="form-group"> <input type="email" class="form-control" placeholder="Enter Email" name="email" required></div>
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Phone Number" name="phonenumber" required></div>
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Branch" name="branch" required></div>
                          <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                      </div>
                    </div>
                 </div>
                 <table class="table ">
                     <h5>Registered students</h5>
                     <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile number</th>
                        <th>Branch</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                     <?php foreach($data as $d):?>
                     <tr>
                     <td><?php echo $d['name']?></td>
                     <td><?php echo $d['Email']?></td>
                     <td><?php echo $d['Mobile']?></td>
                     <td><?php echo $d['branch']?></td>
                    <form method="post" action="edit.php">
                     <td>
                       <button class="btn btn-success">Edit</button>
                       <input type="hidden" value="<?php echo $d['id']?>" name="id"> 
                    </td>
                     </form>
                     <form method="post" action="delete.php">
                     <td>
                       <button class="btn btn-danger">X</button>
                       <input type="hidden" value="<?php echo $d['id']?>" name="id"> 
                    </td>
                     </form>
                     </tr>
                     <?php endforeach;?>
                 </table>
            </div>  
        </center>
    </div>
</body>
</html>
