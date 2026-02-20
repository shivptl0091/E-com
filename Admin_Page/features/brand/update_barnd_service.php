<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $Brandname  = $_POST['Brandname'];
    $Status = $_POST['Status'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../photo/" . $photo_name)) {

            unlink("../../photo/" . $img_old);
        }
    $sql = "UPDATE Brand SET Brandname ='$Brandname' , Status = '$Status', photo='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_brand.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE Brand SET Brandname ='$Brandname' , Status = '$Status' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='./list_brand.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
}

