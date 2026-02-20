<?php
require_once "../../database.php";
$db = new Database("ecoms");

$state_data = [];


if (isset($_POST['country_name'])) {
    $country_name = trim($_POST['country_name']);

    $where = " WHERE `country_name` = $country_name ";

    $state_data = $db->getdata('state', 0, 0, $where);

    $data = [
        "state_data" => $state_data,
    ];

    echo json_encode($data);
}


?>