<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $productname  = $_POST['productname'];
    $size  = $_POST['size'];
    $color = $_POST['color'];
    $Varientname = $_POST['Varientname'];

    $sql = "UPDATE varient SET productname ='$productname' ,size ='$size' , color = '$color' ,Varientname = '$Varientname' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_varient.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
