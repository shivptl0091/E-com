<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $country_name = $_POST['country_name'];
  

    $sql = "INSERT INTO country (country_name)
       VALUES ('$country_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_country.php';</script>";
    } else {
        // echo "<script>window.location.href='list_country.php';</script>";

        echo "insert Error";
    }
}
