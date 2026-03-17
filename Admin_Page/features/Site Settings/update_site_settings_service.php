<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $banner_title  = $_POST['banner_title'];
    $banner_subtitle = $_POST['banner_subtitle'];
    $banner_button_text = $_POST['banner_button_text'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../banner_image/" . $photo_name)) {

            unlink("../../banner_image/" . $img_old);
        }
    $sql = "UPDATE site_settings SET banner_title ='$banner_title' , banner_subtitle = '$banner_subtitle',banner_button_text = '$banner_button_text', banner_image='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE site_settings SET banner_title ='$banner_title' , banner_subtitle = '$banner_subtitle' , banner_button_text='$banner_button_text' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='./list_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
}

