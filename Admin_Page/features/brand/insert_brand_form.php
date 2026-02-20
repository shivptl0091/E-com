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
      height: 500px;
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
  <form class="box p-5" action="insert_brand_service.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Brand Nmae</label>
      <input type="text" name="Brandname" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Stayus</label>
      <input type="text" name="Status" class="form-control">
    </div>
    <label for="">Upload Image</label>
    <input type="File" name="image" accept="image">
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>