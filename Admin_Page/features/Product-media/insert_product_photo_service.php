<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $Varientname = $_POST['Varientname'];

     
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../photo_Product-media/" . $image_name)) {

    $sql = "INSERT INTO product_photo (productname,Varientname,photo )
       VALUES ('$productname','$Varientname','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_product_photo.php';</script>";
    } else {
        // echo "<script>window.location.href='list_product.php';</script>";

        echo "insert Error";
    }
     }else{
            echo "image not uploading";
     }
}
    }