<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $country_name = $_POST['country_name'];
    $state_name = $_POST['state_name']; 
    $city_name = $_POST['city_name']; 
  

    $sql = "INSERT INTO city (country_name,state_name,city_name)
       VALUES ('$country_name','$state_name','$city_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_city.php';</script>";
    } else {
        // echo "<script>window.location.href='list_city.php';</script>";

        echo "insert Error";
    }
}
