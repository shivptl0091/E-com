<?php
require_once "../../database.php";
$db = new Database("ecoms");

$city_data = [];

if (isset($_POST['state_id'])) {

    $state_id = trim($_POST['state_id']);

    $where = "WHERE state_name = $state_id";

    $city_data = $db->getdata('city', 0, 0, $where);

    echo json_encode([
        "city_data" => $city_data
    ]);
}
?>
