<?php
require_once "../../database.php";


$db = new Database("ecoms");


if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $Varientname = $_POST['Varientname'];

    $sql = "INSERT INTO varient (productname,size,color,Varientname)
       VALUES ('$productname','$size','$color','$Varientname')";

       $res = $db->execute($sql);



    if ($res) {
        echo "<script>alert('data save succesfully');</script>";
        echo "<script>window.location.href='list_varient.php';</script>";
    } else {
        // echo "<script>window.location.href='list_varient.php';</script>";

        echo "insert Error";
    }
}
