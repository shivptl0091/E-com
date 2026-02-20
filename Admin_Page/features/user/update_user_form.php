<?php
require_once "../../database.php";
$db = new database("ecoms");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $res = $db->getdataByid('user', $id);
  $row = $res[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <style>
    .box {
      height: 600px;
      width: 500px;
      border-radius: 10px;
      border: 1px solid;
    }

    body {
      height: 700px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    img {
      height: 100px;
      width: 100px;
      border-radius: 10px;

    }
  </style>
</head>

<body>
  <form class="box p-5" action="update_user_service.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">User Name</label>
      <input type="text" name="username" class="form-control" aria-describedby="emailHelp" value="<?php echo $row['username']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="text" name="passwords" class="form-control" value="<?php echo $row['passwords']; ?>">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
    </div>

    <!-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Role</label>
      <input type="text" name="role" class="form-control" aria-describedby="emailHelp" value="<?php echo $row['role']; ?>">
    </div> -->

    <div class="form-group">
      <label>User Role</label>
      <select class="form-control" name="role">

        <?php
        if ($row['role'] == 1) {
          echo "<option value='0'>normal User</option>
                <option value='1' selected>Admin</option>";
        } else {
          echo "<option value='0' selected>Normal User</option>
                <option value='1'>Admin</option>";
        }
        ?>
      </select>
    </div>

    <label for="">Upload Image</label>
    <input type="file" name="image" value="">
    <img src="<?php echo "../../photos/" . $row['photos']; ?>" />
    <input type="hidden" name="img_old" value="<?php echo $row['photos']; ?>">

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>