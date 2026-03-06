<?php

require_once "../../database.php";
$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $banner_title = $_POST['banner_title'];
    $banner_subtitle = $_POST['banner_subtitle'];
    $banner_button_text = $_POST['banner_button_text'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../banner_image/" . $image_name)) {

    $sql = "INSERT INTO site_settings (banner_title,banner_subtitle,banner_button_text,mob,email,address,banner_image)
       VALUES ('$banner_title','$banner_subtitle','$banner_button_text','$mob','$email','$address','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_settings.php';</script>";
    } else {
        // echo "<script>window.location.href='list_settings.php';</script>";

        echo "insert Error";
    }
    }else{
            echo "image not uploading";

    
    }
}
    }
