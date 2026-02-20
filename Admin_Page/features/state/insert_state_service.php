<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $country_name = $_POST['country_name'];
    $state_name = $_POST['state_name'];
  

    $sql = "INSERT INTO state (country_name,state_name)
       VALUES ('$country_name','$state_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_state.php';</script>";
    } else {
        // echo "<script>window.location.href='list_country.php';</script>";

        echo "insert Error";
    }
}
