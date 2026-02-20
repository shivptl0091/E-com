<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $productname  = $_POST['productname'];
    $Varientname = $_POST['Varientname'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../photo_Product-media/" . $photo_name)) {

            unlink("../../photo_Product-media/" . $img_old);
        }
        $sql = "UPDATE product_photo SET productname ='$productname' , Varientname = '$Varientname' , photo='$photo_name' WHERE id=$id";
        $res = $db->execute($sql);


        if ($res) {
            echo "<script>alert('data update succesfully');</script>";
            echo "<script>window.location.href='list_product_photo.php';</script>";
        } else {
            echo "Something Went Wrong";
        }
    } else {

        $sql = "UPDATE product_photo SET productname ='$productname' , Varientname = '$Varientname' WHERE id=$id";
        $res = $db->execute($sql);

        if ($res) {
            echo "<script>alert('data update succesfully');</script>";
            echo "<script>window.location.href='list_product_photo.php';</script>";
        } else {
            echo "Something Went Wrong";
        }
    }
}
