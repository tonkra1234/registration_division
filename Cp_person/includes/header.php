<?php 
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:../Login/login_form.php');
}

$user_name = $_SESSION['user_name'];
$_SESSION['user_name'] = $user_name;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        #Mynav {
            background-image: url('./image/Head_Web.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <title>Competent person</title>
</head>

<body>
    <nav class="navbar" id="Mynav">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="d-flex">
                    <a class="navbar-brand" href="./home.php"><img src="./image/logo.png" height="100"
                            alt="DRA logo" loading="lazy" />
                    </a>
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-column justify-content-start">
                            <span class="fs-5 fw-bold" style="color:#003858 ;">Drug</span>
                            <span class="fs-5 fw-bold" style="color:#003858 ;">Regulatory</span>
                            <span class="fs-5 fw-bold" style="color:#003858 ;">Authority</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column px-3 rounded-3 bg-gradient"
                    style="background-color: transparent; width:40vw;">
                    <span class="fs-5 fst-italic text-center" style="color:#37779C ;"><span
                            class="fs-5 fst-italic fw-bold" style="color:#37779C ;">" </span>The most dynamic,
                        reliable
                        and client-centric model</span>
                    <span class="fs-5 fst-italic text-end me-5" style="color:#37779C ;">
                        regulatory organization<span class="fs-5 fst-italic fw-bold" style="color:#37779C ;">
                            "</span></span>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light p-1 shadow " style="background-color: #37779C;">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="container-fluid ">
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <a href="../main.php" class="btn btn-light rounded-pill"><i class="fa-solid fa-backward"></i> Back to menu</a>
                    <div class="d-flex ms-auto me-5">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./image/login.png" alt="users" height="40" width="40">
                            </a>
                            <ul class="dropdown-menu text-small dropdown-menu-end" aria-labelledby="dropdownUser1">
                                <li>
                                    <h6 class="dropdown-header">User: <?php echo $user_name;?></h6>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="../Login/logout.php"><i
                                            class="fa-solid fa-right-from-bracket fs-5 me-2"></i>Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>