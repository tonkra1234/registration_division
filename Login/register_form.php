<?php

require_once './db.php';
require_once './util.php';

if(isset($_POST['submit'])){
   $utli = new Util();

   $name = $utli->testInput($_POST['name']);
   $email = $utli->testInput($_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $gender = $_POST['gender'];

   $db = new Database();
   $result = $db->check_users($email,$pass);

   if($result > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $db->register($name,$email,$pass,$user_type,$gender);
         header('Location:./login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">
   <title>register form</title>
   <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>
   <style>
      body {
         background-image: url('./image/login_back.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: cover;
      }
   </style>

</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="container" style="width: 40%;">
         <form action="" method="post" class="border rounded-3 p-5 bg-white shadow">
            <h1 class="mb-4 fw-bold text-center text-primary">Register now</h1>
            <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                  };
               };
            ?>

            <div class="form-floating mb-2">
               <input type="text" name="name" class="form-control" id="floatingName" required placeholder="Enter your name">
               <label for="floatingName">Name</label>
            </div>
            <div class="form-floating mb-2">
               <input type="email" name="email" class="form-control" id="floatingEmail" required placeholder="Enter your email">
               <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-2">
               <input type="password" name="password" class="form-control" id="floatingPass" required placeholder="enter your password">
               <label for="floatingPass">Password</label>
            </div>
            <div class="form-floating mb-2">
               <input type="password" name="cpassword" class="form-control" id="floatingCpass" required placeholder="confirm your password">
               <label for="floatingCpass">Confirm password</label>
            </div>
            <select name="user_type" class="form-select form-select-lg mb-2">
               <option value="user">user</option>
               <option value="admin">admin</option>
            </select>
            <select name="gender" class="form-select form-select-lg mb-3">
               <option value="Male">male</option>
               <option value="Female">female</option>
            </select>
            <button class="w-100 btn btn-lg btn-primary rounded-pill" type="submit" value="login now" name="submit">Registration</button>
         </form>
      </div>
   </div>
   
</body>
</html>