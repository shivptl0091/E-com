<?php
require_once "../../database.php";
$db = new Database("ecoms");


$size_data = [];
$color_data = [];


if (isset($_POST['productname'])) {
    $productname = trim($_POST['productname']);

    $where = " WHERE `productname` = '$productname' ";


    $size_data = $db->getdata('size_mapping', 0, 0, $where);
    $color_data = $db->getdata('colors', 0, 0, $where);

    $data = [
        "size_data" => $size_data,
        "color_data" => $color_data,
    ];

    echo json_encode($data);
    
    
}
