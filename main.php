<?php
require_once './main_class.php';
$session = new Session();
$user_name = $session->user();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration division</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resource/style.css">


</head>

<body style="background-color:#E9E9E9;">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Registration Division</a>
            <div class="d-flex ms-auto me-2">
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./resource/image/login_black.png" alt="users" height="30" width="30">
                    </a>
                    <ul class="dropdown-menu text-small dropdown-menu-end" aria-labelledby="dropdownUser1">
                        <li>
                            <h6 class="dropdown-header">User: <?php echo $user_name;?></h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="./Login/logout.php"><i
                                    class="fa-solid fa-right-from-bracket fs-5 me-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-grid my-2 mx-auto">
                            <a href="./Drug_repository/script/home/home.php" role="button"
                                class="btn btn-1 p-3 fs-4 fw-bolder text-white">Drug repository</a>
                        </div>
                        <div class="col-12 d-grid my-2 mx-auto">
                            <a href="./Cp_person/home.php" role="button"
                                class="btn btn-2 p-3 fs-4 fw-bolder text-white">Competent person list</a>
                        </div>
                        <div class="col-12 d-grid my-2 mx-auto">
                            <a href="./Manufacturer_list/home.php" role="button"
                                class="btn btn-3 p-3 fs-4 fw-bolder text-white">Manufacturer list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>