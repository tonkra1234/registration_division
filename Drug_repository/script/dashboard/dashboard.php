<?php
require '../../include/connection.php';
require '../../include/header.php';
require './dashboard_back.php';

?>
<link rel="stylesheet" href="../../public/css/dashboard.css">

<div class="container my-5">
    <a class="btn btn-warning mb-5 fw-bold" href="../home/home.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
        Back to list of drugs</a>
    <h3 class="shadow rounded-3 bg-success text-white p-3 text-center mb-5">Dashboard</h3>
    <div class="row">
        <div class="col-9">
            <div class="card shadow">
                <div class="card-body">
                    <canvas id="country_sum"></canvas>
                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="d-flex flex-column mt-2">
                <div class="mb-2">
                    <div class="card shadow" style="background-color: #F4ECF7 ;">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="../../public/image/pills.png" alt="" width=100>
                                <h3>Total Drugs</h3>
                                <h1 class="card-title"><?php echo array_sum($country_sum);?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="card shadow" style="background-color:#FCF3CF ;">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="../../public/image/country.png" alt="" width=100>
                                <h3>Total Country</h3>
                                <h1 class="card-title"><?php echo count($country_title);?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="mb-2">
                <div class="card shadow" style="background-color: #FDEDEC ; height:14rem;">
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="../../public/image/expired.png" alt="" width=90 class="mb-2">
                            <h3>Nearly Expired</h3>
                            <h1 class="card-title"><?php echo $expired['expired']?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mt-3">
            <div class="mb-2">
                <div class="card shadow" style="background-color:#E9F7EF ; height:14rem;">
                    <div class="card-body ">
                        <div class="d-flex flex-column ">
                            <div class="mb-4 mt-1">
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-success">Essential drug</h3>
                                    <h3><?php echo round($percent_ess,2);?>%</h3>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width: <?php echo $percent_ess;?>%"
                                        aria-valuenow="<?php echo $percent_ess;?>" aria-valuemin="0"
                                        aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-1">
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-primary">Non-Essential drug</h3>
                                    <h3><?php echo round($percent_non_ess,2);?>%</h3>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                        style="width: <?php echo $percent_non_ess;?>%"
                                        aria-valuenow="<?php echo $percent_non_ess;?>" aria-valuemin="0"
                                        aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 mt-3">
            <div class="mb-2">
                <div class="card shadow" style="background-color: #EBF5FB  ; height:14rem;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center mx-3">
                        <img src="../../public/image/people.png" alt="" width=70 class="mb-2">
                        <h3>Human</h3>
                        <h1 class="card-title"><?php echo $Intention_human['intention_human'];?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 mt-3">
            <div class="mb-2">
                <div class="card shadow" style="background-color: #EBF5FB  ; height:14rem;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center mx-3">
                        <img src="../../public/image/dog.png" alt="" width=70 class="mb-2">
                        <h3>Veterinary</h3>
                        <h1 class="card-title"><?php echo $Intention_veterinary['intention_veterinary'];?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width:20rem;">
                                <div class="card-header" style="background-color:#005A96  ;">
                                    <h6 class="text-center text-white fw-bolder fs-5">Registrated drugs (per year)</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php foreach( $annual_title_human as $index => $year ) {
                                    ?>
                                    <li class="list-group-item"><?php echo $year;?> : <span
                                            class="fw-bold"><?php echo $annual_sum_human[$index];?> (Human) :
                                            <?php echo $annual_sum_veterinary[$index];?> (Vet)</span></li>
                                    <?php
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mx-5" style="width:47rem;">
                                <canvas id="annual_drug"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
require './dashboard_chart.php';
require '../../include/footer.php';
?>