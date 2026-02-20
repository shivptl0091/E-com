<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $passwords = $_POST['passwords'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../photos/" . $image_name)) {

    $sql = "INSERT INTO user (username,passwords,email,role,photos)
       VALUES ('$username','$passwords','$email','$role','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_user.php';</script>";
    } else {
        echo "<script>window.location.href='list_user.php';</script>";

        // echo "insert Error";
    }
    }else{
            echo "image not uploading";

    
    }
}
    }
