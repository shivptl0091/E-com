<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $country_name = $_POST['country_name'];
    $state_name = $_POST['state_name']; 
    $city_name = $_POST['city_name']; 
    $pincode = $_POST['pincode']; 
  

    $sql = "INSERT INTO pincode (country_name,state_name,city_name,pincode)
       VALUES ('$country_name','$state_name','$city_name','$pincode')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_pincode.php';</script>";
    } else {
        // echo "<script>window.location.href='list_pincode.php';</script>";

        echo "insert Error";
    }
}
