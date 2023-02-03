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

$id = $util->testInput($_POST['id']);
$Inspector_name = $util->testInput($_POST['Inspector_name']);
$Division = $util->testInput($_POST['Division']);
$Old_image = $_POST['old_image'];


if(is_file('../../image/Officer_image/'.$Old_image) || $Old_image === null){
    if ($_FILES['new_Avatar']['size'] !== 0) {

        $targetDir = "../../image/Officer_image/";

        $fileName = basename($Old_image);
        $targetFilePath = $targetDir . $fileName;
        $deleteTargetPath = $targetDir . $Old_image;
        try {
            unlink($deleteTargetPath); // delete old image
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        $util->compressImage($_FILES['new_Avatar']['tmp_name'],$targetFilePath,60);
        $Avatar = $Old_image;
    }
    
}else{
    // File upload path
    $targetDir = "../../image/Officer_image/";

    $fileName = basename($Inspector_name.'.jpg');
    $targetFilePath = $targetDir . $fileName;

    $util->compressImage($_FILES['new_Avatar']['tmp_name'],$targetFilePath,60);
    $Avatar = $fileName;
}

if ($db->edit_inspectors($id,$Inspector_name,$Division,$Avatar)){
    
    echo "<script>Swal.fire(
        'Edited data have been recorded',
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