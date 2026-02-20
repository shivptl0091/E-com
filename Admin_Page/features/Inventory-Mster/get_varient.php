<?php
require_once "../../database.php";
$db = new Database("ecoms");


$Varientname_data = [];



if (isset($_POST['productname'])) {
    $productname = trim($_POST['productname']);

    $where = " WHERE `productname` = '$productname' ";


    $Varientname_data = $db->getdata('varient', 0, 0, $where);

    $data = [
        "Varientname_data" => $Varientname_data,
    ];

    echo json_encode($data);
    
    
}
