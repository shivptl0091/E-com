<?php  require_once "../../database.php";
  $db = new Database("ecoms");
  $product_data = $db->getdata("product");



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
      height: 400px;
      width: 500px;
      border-radius: 10px;
      border: 1px solid;
    }

    body {
      height: 750px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

  </style>
</head>
<body>
  <form class="box p-5" action="insert_size_mapping_service.php" method="POST" enctype="multipart/form-data">
  
        <div class="mb-3">
                        <label>Product Name</label>
                        <select class="form-control" name="productname">

                          <?php

                            foreach ( $product_data as  $product_row) {


                              echo '<option value="'. $product_row['id'].'">'.$product_row['productname'].'</option>';
                            }

                                                      
                          ?>
                        </select>
                    </div>

      
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Size</label>
      <input type="text" name="size" class="form-control" aria-describedby="emailHelp">
    </div>
      <input type="checkbox" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>