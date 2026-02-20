<?php

require_once "../../database.php";
$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $Brandname = $_POST['Brandname'];
    $categoryname = $_POST['categoryname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../photo/" . $image_name)) {

    $sql = "INSERT INTO product (productname,Brandname,categoryname,price,description,long_description,photo)
       VALUES ('$productname','$Brandname','$categoryname','$price','$description','$long_description','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_product.php';</script>";
    } else {
        echo "<script>window.location.href='list_product.php';</script>";

        // echo "insert Error";
    }
    }else{
            echo "image not uploading";

    
    }
}
    }
