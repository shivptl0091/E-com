<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $varientname = $_POST['varientname'];
    $stock = $_POST['stock'];
    // $date = $_POST['date'];
     $date = date("Y-m-d");
    $sql = "INSERT INTO inventory (productname,varientname,stock,date) VALUES ('$productname','$varientname','$stock','$date')";

    $res = $db->execute($sql);


    if ($res) {


        $product_data =$db->get_data_from_query("SELECT stock from `product` WHERE id=$productname");

        if(sizeof($product_data)>0){
            $old_stock = $product_data[0]['stock'];
            $new_stock= $old_stock + $stock;

            $sql = "UPDATE product SET stock=$new_stock WHERE id=$productname";

            $res = $db->execute($sql);
          
            }

        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_inventory.php';</script>";
    } else {
        // echo "<script>window.location.href=list_inventory.php';</script>";

        echo "insert Error";
    }
}
