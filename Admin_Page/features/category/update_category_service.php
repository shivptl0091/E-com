<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $categoryname  = $_POST['categoryname'];
    $Status = $_POST['Status'];

    $sql = "UPDATE categories SET categoryname ='$categoryname' , Status = '$Status' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
