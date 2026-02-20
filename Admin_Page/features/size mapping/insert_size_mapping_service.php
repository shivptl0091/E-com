<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $size = $_POST['size'];

    $sql = "INSERT INTO size_mapping (productname,size)
       VALUES ('$productname','$size')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_size-mapping.php';</script>";
    } else {
        echo "<script>window.location.href='list_size-mapping.php';</script>";

        // echo "insert Error";
    }
}
