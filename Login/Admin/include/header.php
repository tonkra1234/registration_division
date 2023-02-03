<?php

session_start();
$user_name = $_SESSION['user_name'];
$_SESSION['user_name'] = $user_name;

$email = $_SESSION['email'];
$_SESSION['email'] = $email;


if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin page</title>
   <!-- Bootstrap 5 -->
   <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

   </script>
   <!-- Jquery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Sweetalert -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
   <link href="./css/dashboard.css" rel="stylesheet">
</head>

<body>
   <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./admin_page.php"><i
            class="fa-solid fa-user-nurse me-2"></i>
         Registration division</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
         data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="d-flex col-12 col-md-3">
         <div class="navbar-nav user-photo ms-1 me-auto d-md-none d-lg-block text-start">
            <div class="nav-item text-nowrap">
               <div class="nav-link px-3">
                  <div class="d-flex">
                     <img class="rounded-3 my-auto" src="./image/Officer_image/question_mark.png" alt="Users"
                        style="height: 35px;width:auto;">
                     <div class="ms-3">
                        <div><?php echo $email;?></div>
                        <div><?php echo $user_name;?></div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <div class="navbar-nav me-3 ms-auto my-auto">
            <div class="nav-item logout-button text-nowrap text-center rounded-pill">
               <a class="nav-link px-3" href="../logout.php">Sign out</a>
            </div>
         </div>
      </div>
   </header>