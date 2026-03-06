<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $categoryname = $_POST['categoryname'];
    $Status = $_POST['Status'];
    $price = $_POST['price'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../categories_photo/" . $image_name)) {

    $sql = "INSERT INTO categories (categoryname,Status,price,categories_photo)
       VALUES ('$categoryname','$Status','$price','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        // echo "<script>window.location.href='list_category.php';</script>";

        echo "insert Error";
    }
  }else{
            echo "image not uploading";
     }
}
}
