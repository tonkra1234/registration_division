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
include './db.php';
include './util.php';

$db = new Database();
$util = new Util();

$Name_Manufacturer = $util->testInput($_POST['Name_Manufacturer']);
$Proprietor = $util->testInput($_POST['Proprietor']);
$Key_person = $util->testInput($_POST['Key_person']);
$Category = $util->testInput($_POST['Category']);
$Email = $util->testInput($_POST['Email']);
$Dzongkhag = $util->testInput($_POST['Dzongkhag']);
$Location = $util->testInput($_POST['Location']);

if ($_FILES['image_link']['size'] !== 0) {
  // File upload path
  $targetDir = "upload_image/";

  $fileName = basename($_FILES['image_link']["name"]);
  $targetFilePath = $targetDir . $fileName;


  $util->compressImage($_FILES['image_link']['tmp_name'],$targetFilePath,60);
  $image_link = $_FILES['image_link']["name"];
}else{
  $image_link=null;
}



if ($db->insert($Name_Manufacturer, $Proprietor,$Key_person, $Category, $Email, $Dzongkhag, $Location, $image_link)){
    
    echo "<script>Swal.fire(
        'New Manufacturer record successfully!',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = './home.php';
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