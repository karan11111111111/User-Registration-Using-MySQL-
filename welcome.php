<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Welcome Page</title>
  </head>
  <body>

  <div class="container mt-5">
    <h1 class="text-center text-warning mt-5">Welcome
<?php echo $_SESSION['user_name'];?>
</h1>


<div >
    <a href="log_out.php" class="btn btn-primary mt-5">Logout</a>
</div>
</div>
  </body>
</html>