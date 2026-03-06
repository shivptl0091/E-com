<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $categoryname  = $_POST['categoryname'];
    $Status = $_POST['Status'];
    $price = $_POST['price'];

     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../categories_photo/" . $photo_name)) {

            unlink("../../categories_photo/" . $img_old);
        }

    $sql = "UPDATE categories SET categoryname ='$categoryname' , Status = '$Status',price = '$price', categories_photo='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    }else{

     $sql = "UPDATE categories SET categoryname ='$categoryname' , Status = '$Status' , price = '$price' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
}