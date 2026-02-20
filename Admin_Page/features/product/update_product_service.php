<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $productname  = $_POST['productname'];
    $brandname  = $_POST['brandname'];
    $categoryname = $_POST['categoryname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../photo/" . $photo_name)) {

            unlink("../../photo/" . $img_old);
        }
    $sql = "UPDATE product SET productname= '$productname' , brandname ='$brandname' , categoryname = '$categoryname', price = '$price' , description = '$description', long_description = '$long_description' , photo='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_product.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE product SET productname= '$productname' , brandname ='$brandname' , categoryname = '$categoryname' ,price = '$price' , description = '$description' , long_description = '$long_description' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='./list_product.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
}

