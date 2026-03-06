<?php

require_once "../../database.php";

$db = new Database("ecoms");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = $db->getdataByid('site_settings', $id);
    $row = $res[0];

    $photo = $row['site_settings'];
    unlink("../../site_settings_Photo/" . $photo);

    $sql = "DELETE FROM site_settings WHERE id=$id";
    $res = $db->execute($sql);

    if ($res) {
        echo "<script>alert('data deleted succesfully');</script>";
        echo "<script>window.location.href='./list_settings.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
