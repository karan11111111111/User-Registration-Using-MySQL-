<?php
$succes=0;
$user=0;
$invalid=0;



if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $name=$_POST['name'];
  $user_name= $_POST['user_name'];
  $email=$_POST['email'];
  $password= $_POST['password'];
  $cpassword=$_POST['cpassword'];

  $sql="Select * from `register` where user_name = '$user_name'";
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      // echo  "user already exist";
      $user=1;
    }else{
      if($password===$cpassword){
         $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql="insert into `register`(name,user_name,email,password)values('$name','$user_name','$email','$hash')";
       $result = mysqli_query($con,$sql);
    if($result){
     // echo "Signup successful!!!";
       $succes=1;
       header('location:log_in.php');

     }
    }
    else{
     $invalid=1;
     }
  }
}
}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

  <title>Sign Up</title>
</head>

<body>

<?php
if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sign up Failed</strong>username already exist!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<?php
if($succes){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are successfully signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
<?php
if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sign up failed</strong> password not matched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div class="container mt-5">
  <h2 class="text-center mt-5">Register Your Account</h2>
  <div class="container mt-3 mb-5">
    <form action="sign_up.php" method="post">

      <div class="mb-3">
        <label for="exampleInputEmail1 " class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1 " class="form-label">Username</label>
        <input type="text" class="form-control" placeholder="Enter Username" name="user_name" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1 " class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>
      </div>

      

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
      </div>

      <div class="buttons">

        <div>
          <button type="submit" class="btn btn-primary">Sign up</button>
        </div>

        <div>
          <a href="log_in.php" class="btn btn-primary">Log in</a>
        </div>

      </div>
    </form>
  </div>
</div>


</body>

</html>