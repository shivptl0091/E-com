<?php

require_once "../../database.php";
$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $Brandname = $_POST['Brandname'];
    $Status = $_POST['Status'];

    
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = time() . $image['name'];
        $tmp_name = $image['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../photo/" . $image_name)) {

    $sql = "INSERT INTO Brand (Brandname,Status,photo)
       VALUES ('$Brandname','$Status','$image_name')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_brand.php';</script>";
    } else {
        echo "<script>window.location.href='list_brand.php';</script>";

        // echo "insert Error";
    }
    }else{
            echo "image not uploading";

    
    }
}
    }
