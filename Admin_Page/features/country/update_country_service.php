<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $country_name  = $_POST['country_name'];

    $sql = "UPDATE country SET country_name ='$country_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_country.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
