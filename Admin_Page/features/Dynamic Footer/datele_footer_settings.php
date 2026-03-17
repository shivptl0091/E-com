<?php

require_once "../../database.php";

$db = new Database("ecoms");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = $db->getdataByid('footer_settings', $id);
    $row = $res[0];

    $photo = $row['footer_settings'];
    unlink("../../web_logo/" . $photo);

    $sql = "DELETE FROM footer_settings WHERE id=$id";
    $res = $db->execute($sql);

    if ($res) {
        echo "<script>alert('data deleted succesfully');</script>";
        echo "<script>window.location.href='./list_footer_settings.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
