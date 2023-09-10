<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $user_name= $_POST['user_name'];
  $password= $_POST['password'];

 
//   $sql="Select * from `register` where user_name = '$user_name' and password='$password'";
  $sql="Select * from `register` where user_name = '$user_name'";
  
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
               $login=1;
                session_start();
                $_SESSION['user_name']=$user_name;
                header('location:welcome.php');
            }else{
                $invalid=1;
             
                }
        }

 
    }else{
     $invalid=1;
  
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

  <title>Login</title>
</head>


<body>

  <?php
if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are successfully logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

  <?php
if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Invalid credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div class="container mt-5">
  <h2 class="text-center mt-5">Login to our website</h2>
  <div class="container mt-3">
    <form action="log_in.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1 " class="form-label">Username</label>
        <input type="text" class="form-control" placeholder="Enter Your Username" name="user_name" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password" required>
      </div>

      <div class="buttons">

        <div>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div>
          <a href="sign_up.php" class="btn btn-primary">Sign Up</a>
        </div>

      </div>

    </form>
  </div>
</div>

</body>

</html>