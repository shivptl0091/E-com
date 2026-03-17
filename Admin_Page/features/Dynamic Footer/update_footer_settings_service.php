<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $mob  = $_POST['mob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $web_name = $_POST['web_name'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../web_logo/" . $photo_name)) {

            unlink("../../web_logo/" . $img_old);
        }
    $sql = "UPDATE footer_settings SET mob ='$mob' , email = '$email',address = '$address', web_name = '$web_name' , web_logo='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_footer_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE footer_settings SET mob ='$mob' , email = '$email' , address='$address' , web_name = '$web_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='./list_footer_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
}

