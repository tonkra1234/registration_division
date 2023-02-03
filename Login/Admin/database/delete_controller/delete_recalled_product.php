<?php
include '../db_recalled.php';

$productId = $_POST['productId'];
$db = new RecalledProducts();

$productdelete = $_POST['productdelete'];

if ($productdelete === 'delete') {
    $db->delete_product($productId);
}
elseif($productdelete === 'retrieve'){
    $db->retrieve_product($productId);
    $db->delete_product($productId);
}

?>