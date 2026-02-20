<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $categoryname = $_POST['categoryname'];
    $Status = $_POST['Status'];

    $sql = "INSERT INTO categories (categoryname,Status)
       VALUES ('$categoryname','$Status')";

    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        echo "<script>window.location.href='list_category.php';</script>";

        // echo "insert Error";
    }
}
