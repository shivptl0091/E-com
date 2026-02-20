<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $colors = $_POST['colors'];

    $sql = "INSERT INTO colors (productname,colors)
       VALUES ('$productname','$colors')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_colors.php';</script>";
    } else {
        echo "<script>window.location.href='list_colors.php';</script>";

        // echo "insert Error";
    }
}
