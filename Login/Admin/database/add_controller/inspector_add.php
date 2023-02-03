<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update</title>

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
    integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <?php
include '../db_GMP.php';
include '../../../util.php';

$db = new GmpInspection();
$util = new Util();

$Inspector_name = $util->testInput($_POST['Inspector_name']);
$Division = $util->testInput($_POST['Division']);
if ($_FILES['Avatar']['size'] !== 0) {
    // File upload path
    $targetDir = "../../image/Officer_image/";
  
    $fileName = basename($_FILES['Avatar']["name"]);
    $targetFilePath = $targetDir . $fileName;
  
  
    $util->compressImage($_FILES['Avatar']['tmp_name'],$targetFilePath,60);
    $Avatar = $_FILES['Avatar']["name"];
  }else{
    $Avatar=null;
  }

if ($db->insert_inspectors($Inspector_name,$Division,$Avatar)){
    
    echo "<script>Swal.fire(
        'New inspector have been added',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = '../../gmp_inspection.php';
      });
      </script>";

}else{
    echo "<script>Swal.fire(
        'Warning there are some problems',
        'Please, click button to back to home page!',
      );
    </>";
}

?>

</body>

</html>