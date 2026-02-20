<?php
  require_once "../../database.php";
$db = new database("ecoms");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $db->getdataByid('country', $id);
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
        .box{
            height: 400px;
            width: 500px;
            border-radius: 10px;
            border: 1px solid;
        }
        body{
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
   <form class="box p-5" action="update_country_service.php" method="POST" >
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Country Name</label>
    <input type="text" name="country_name" class="form-control"  aria-describedby="emailHelp" value="<?php echo $row['country_name']; ?>">
  </div>
 
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1" checkdate>Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>