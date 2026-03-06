<?php

    require_once "../../database.php";

    $db = new Database("ecoms");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
      $res = $db->getdataByid('categories', $id);
      $row = $res[0];

    
    $sql = "DELETE FROM categories WHERE id=$id";
    $res = $db->execute($sql);

    if ($res) {
        echo "<script>alert('data deleted succesfully');</script>";
        echo "<script>window.location.href='list_category.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }


    }
    
?>