<?php

require_once "../../database.php";
$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $web_name = $_POST['web_name'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../web_logo/" . $image_name)) {

    $sql = "INSERT INTO footer_settings (mob,email,address,web_name,web_logo)
       VALUES ('$mob','$email','$address','$web_name','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_footer_settings.php';</script>";
    } else {
        // echo "<script>window.location.href='list_settings.php';</script>";

        echo "insert Error";
    }
    }else{
            echo "image not uploading";

    
    }
}
    }
