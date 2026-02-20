<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $country_name  = $_POST['country_name'];
    $state_name  = $_POST['state_name'];
    $city_name  = $_POST['city_name'];

    $sql = "UPDATE city SET country_name ='$country_name',state_name = '$state_name' ,city_name = '$city_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_city.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
