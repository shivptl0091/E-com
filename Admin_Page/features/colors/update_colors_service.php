<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $productname  = $_POST['productname'];
    $colors = $_POST['colors'];

    $sql = "UPDATE colors SET productname ='$productname' , colors = '$colors' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_colors.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
