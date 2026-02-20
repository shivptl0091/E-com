<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username  = $_POST['username'];
    $passwords = $_POST['passwords'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photos_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../photos/" . $photos_name)) {

            unlink("../../photos/" . $img_old);
        }  
    $sql = "UPDATE user SET username ='$username' , passwords = '$passwords', email = '$email' , role = '$role' , photos='$photos_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_user.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE user SET username ='$username' , passwords = '$passwords', email = '$email' , role = '$role'  WHERE id=$id";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_user.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
    
}
