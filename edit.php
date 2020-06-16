<?php
require('config.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $oldegister=new register;
    $oldregister->name=$_POST['name'];
    $oldregister->email=$_POST['email'];
    $oldregister->phonenumber=$_POST['phonenumber'];
    $oldregister->branch=$_POST['branch'];
    $query="UPDATE form SET name='$oldregister->name',
                            Email='$oldregister->email',
                            Mobile='$oldregister->phonenumber',
                            branch='$oldregister->branch' where id=$id";
    if(mysqli_query($conn,$query)){
            header('LOCATION: index.php');  
        }
}

$id=$_POST['id'];
$query="SELECT * FROM form WHERE id={$id}";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
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
                        <form action="edit.php" method="post">
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Name" name="name"  value = <?php echo $data['name']?> required > </div>
                          <div class="form-group"> <input type="email" class="form-control" placeholder="Enter Email" name="email" value = <?php echo $data['Email']?> required ></div>
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Phone Number" name="phonenumber" value = <?php echo $data['Mobile']?> required></div>
                          <div class="form-group"> <input type="text" class="form-control" placeholder="Enter Branch" name="branch" value = <?php echo $data['branch']?> required> </div>
                          <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                          <input type="hidden" value="<?php echo $data['id']?>" name="id">
                        </form>
                      </div>
                    </div>
                 </div>
            </div>  
        </center>
    </div>
</body>
</html>
