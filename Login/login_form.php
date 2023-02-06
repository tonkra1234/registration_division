<?php

require_once './db.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = md5($_POST['password']);

   $db = new Database();
   $stmt = $db->login($email,$pass);


   if($stmt->rowCount() > 0){

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if($result['user_type'] == 'admin'){

          $_SESSION['user_name'] = $result['name'];
          $_SESSION['email'] = $result['email'];
          header('location:./Admin/admin_page.php');

      }elseif($result['user_type'] == 'user'){

          $_SESSION['user_name'] = $result['name'];
          header('location:../main.php');
      }

  }else{
      $error[] = 'incorrect email or password!';
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
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
   <section class="ftco-section d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
               <div class="wrap d-flex justify-content-start">
                  <div class="login-wrap pt-4 p-lg-5 border rounded-3 w-50">
                     <div class="d-flex">
                        <div class="w-100 text-center">
                           <img src="./image/logo.png" alt="logo" width="150px" class="mb-2">
                           <h1 class="mb-3 text-primary">Welcome to login</h1>
                        </div>
                     </div>
                     <form action="" method="post" class="bg-light p-3 shadow rounded">
                        <h3 class="mb-2 text-center text-primary">Sign In</h3> 
                        <?php
                           if(isset($error)){
                              foreach($error as $error){
                                 echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                              };
                           };
                        ?>
                        <div class="form-floating mb-2">
                           <input type="email" class="form-control" name="email" id="floatingInput"
                              placeholder="enter your email" required>
                           <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                              name="password" required>
                           <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-group">
                           <button class="w-100 btn btn-lg btn-primary rounded-pill" type="submit" value="login now"
                              name="submit">Login</button>
                        </div>
                     </form>
                     <p class="mt-2">Don't have account? Please, contact <u><strong>Admin</strong></u> to sign up</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>