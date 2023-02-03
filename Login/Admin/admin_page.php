<?php require './include/header.php';?>
<?php require './dashboard_controller.php';?>

<div class="container-fluid" style="min-height: 80vh;">
   <?php require './include/sidebar.php';?>
   <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
               <div class="card shadow justify-content-center rounded-3 text-white h-100" style="background-color:#1D437E ;">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                           <div class="align-self-center">
                              <i class="fa-solid fa-industry " style="font-size: 5em;color: #E0E0E0;"></i>
                           </div>
                        </div>
                        <div class="col-8 text-center">
                           <div class="d-flex flex-column">
                              <h3>Manufacturer</h3>
                              <h1><?php echo $results_manufacturer['number_manufacturer'];?></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
               <div class="card shadow justify-content-between rounded-3 text-white h-100" style="background-color:#7B4413 ;">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                           <div class="align-self-center">
                              <i class="fa-solid fa-user-nurse" style="font-size: 5em;color: #E0E0E0;"></i>
                           </div>
                        </div>
                        <div class="col-8 text-center">
                           <div class="d-flex flex-column">
                              <h3>CP list</h3>
                              <h1><?php echo $results_competent_person['total_competent_person'];?></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
               <div class="card shadow justify-content-between rounded-3 text-white h-100" style="background-color:#0D5000 ;">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                           <div class="align-self-center">
                              <i class="fa-solid fa-rotate-left" style="font-size: 5em;color: #E0E0E0;"></i>
                           </div>
                        </div>
                        <div class="col-8 text-center">
                           <div class="d-flex flex-column">
                              <h3>Drug repository</h3>
                              <h1><?php echo $results_drugs['number_drug_repository'];?></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <h4>USERS</h4>
            <div class="table-responsive rounded-3">
               <table class="table shadow">
                  <thead class="text-white" style="background-color:#1C7C7B ;">
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $number = 1;
                     foreach ($results_users as $result) {
                     
                     ?>
                     <tr>
                        <th scope="row"><?php echo $number;?></th>
                        <td>
                        <?php if(is_file('./image/Officer_image/'.$result['Avatar'])): ?>
                           <div class="d-flex align-items-center"><img class="rounded-circle" src="./image/Officer_image/<?php echo $result['Avatar']?>" width="30"></div>
                        <?php else: ?>
                           <div class="d-flex align-items-center"><img class="rounded-circle" src="./image/Officer_image/question_mark.png" width="30"></div>
                        <?php endif; ?>
                        </td>
                        <td><?php echo $result['name'];?></td>
                        <td><?php echo $result['email'];?></td>
                        <td><?php echo $result['user_type'];?></td>
                     </tr>
                     <?php 
                     $number++;
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>


      </main>
   </div>
</div>

<?php require './include/footer.php';?>