<?php
require_once "../../database.php";
$db = new Database("ecoms");

$state_data = [];

if (isset($_POST['country_name'])) {

    $country_id = trim($_POST['country_name']);

    $where = "WHERE country_id = $country_id";

    $state_data = $db->getdata('state',0, 0, $where);

    echo json_encode([
        "state_data" => $state_data
    ]);
}
?>
