<?php

require_once "../../database.php";

$db = new Database("ecoms");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = $db->getdataByid('Brand', $id);
    $row = $res[0];

    $photo = $row['photo'];
    unlink("../../photo/" . $photo);

    $sql = "DELETE FROM Brand WHERE id=$id";
    $res = $db->execute($sql);

    if ($res) {
        echo "<script>alert('data deleted succesfully');</script>";
        echo "<script>window.location.href='./list_brand.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
