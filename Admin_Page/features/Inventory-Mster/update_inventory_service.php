<?php
require_once "../../database.php";

$db = new database("ecoms");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $productname  = $_POST['productname'];
    $varientname = $_POST['varientname'];
    $stock = $_POST['stock'];
    $stock_bkup = $_POST['stock_bkup'];
    $date = $_POST['date'];

    $sql = "UPDATE inventory SET productname ='$productname' , varientname = '$varientname', stock = '$stock' , date = '$date' WHERE id=$id";
    $res = $db->execute($sql);

 if ($res) {


        $product_data =$db->get_data_from_query("SELECT stock from `product` WHERE id=$productname");

        if(sizeof($product_data)>0){
            $old_stock = $product_data[0]['stock'];
            $new_stock = ($old_stock -$stock_bkup ) + $stock;


            $sql = "UPDATE product SET stock=$new_stock WHERE id=$productname";

            $res = $db->execute($sql);

            }else{
                 $sql = "UPDATE inventory SET productname ='$productname' , varientname = '$varientname', stock = '$stock' , date = '$date' WHERE id=$id";
                 $res = $db->execute($sql);
                 
                         
                 
            }
 }

    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_inventory.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}
