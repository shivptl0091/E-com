<?php
require_once "../../commen/header.php";
require_once "../../database.php";

$db = new database("ecoms");

// $where = "";
// if (isset($_GET['search'])) {
//   $search = $_GET['search'];
//   if ($search != "") {
//  $where = "WHERE id LIKE '%$search%' 
// OR mob LIKE '%$search%' 
// OR email LIKE '%$search%' 
// OR address LIKE '%$search%'";
//   }
// }
$data = $db->getdata('footer_settings',0, 0);

?>



<!-- Begin Page2 Content -->
<div class="container-fluid">

  <!-- Page2 Heading -->
  <h1 class="h3 mb-4 text-gray-800">Footer Settings Page</h1>

</div>
<!-- /.container-fluid -->



<div class="d-flex justify-content-end">
  <!-- <form class="d-flex" role="search" action="list_footer_settings.php"> -->
    <!-- <input class="form-control me-2 box" name="search" type="search" placeholder="Search" aria-label="Search" /> -->
    <!-- <button class="btn btn-outline-primary me-2 Search" type="submit">Search</button> -->
  </form>
  <!-- <a href="./insert_footer_settings_form.php" class="btn btn-primary m-2">ADD NEW</a> -->
  <!-- <a href="list_footer_settings.php" class="btn btn-outline-primary me-6">Reset</a> -->
  <!-- <a href="./login.php" class="btn btn-primary m-2">LOG OUT</a> -->
</div>

<div class="container-fluid mt-3">
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    img {
      height: 100px;
      width: 100px;
      border-radius: 10px;

    }
    </style>
  </head>
  <body>
    <?php  
      foreach ($data as $row) {

    if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $res = $db->getdataByid('footer_settings', $id);
  $row = $res[0];
}   
      if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $mob  = $_POST['mob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $web_name = $_POST['web_name'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_old = $_POST['img_old'];
        $image_name =  $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $photo_name = time() . $image_name;

        if (move_uploaded_file($tmp_name, "../../web_logo/" . $photo_name)) {

            unlink("../../web_logo/" . $img_old);
        }
    $sql = "UPDATE footer_settings SET mob ='$mob' , email = '$email',address = '$address', web_name = '$web_name' , web_logo='$photo_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='list_footer_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
}else{
     $sql = "UPDATE footer_settings SET mob ='$mob' , email = '$email' , address='$address' , web_name = '$web_name' WHERE id=$id";
    $res = $db->execute($sql);


    if ($res) {
        echo "<script>alert('data update succesfully');</script>";
        echo "<script>window.location.href='./list_footer_settings.php';</script>";
    } else {
        echo "Something Went Wrong";
    }
    
}
}
      }
?>

    <form class="box p-5" action="update_footer_settings_service.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
      <input type="number" name="mob" max="9999999999" min="999999999" class="form-control" aria-describedby="emailHelp" value="<?php echo $row['mob']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Web Name</label>
      <input type="text" name="web_name" class="form-control" value="<?php echo $row['web_name']; ?>">
    </div>
    <label for="">Upload Image</label>
    <input type="file" name="image" value="">
    <img src="<?php echo "../../web_logo/" . $row['web_logo']; ?>" />
    <input type="hidden" name="img_old" value="<?php echo $row['web_logo']; ?>">

    <div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  
  
  </body>
  </html>

</div>
<!-- End of Main Content -->


<!-- Footer -->
<?php
require_once "../../commen/footer.php";
?>