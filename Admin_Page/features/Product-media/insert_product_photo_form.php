<?php require_once "../../database.php";
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
  <form class="box p-5" action="insert_product_photo_service.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Product Name</label>
      <select class="form-control" name="productname" id="productname" onchange="get_varient_size()">
        <option value="" disabled selected>Select Product</option>

        <?php

        foreach ($product_data as  $product_row) {


          echo '<option value="' . $product_row['id'] . '">' . $product_row['productname'] . '</option>';
        }


        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Varient Name</label>
      <select name="Varientname" id="Varientname" class="form-control">
        <option value="" disabled selected>Select Varient</option>
      </select>
    </div>

     <label for="">Upload Image</label>
    <input type="File" name="image" accept="image">

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  <script>
    const get_varient_size = async () => {
      try {

        var productname = document.getElementById("productname").value;
        var formdata = new FormData();
        formdata.append("productname", productname)

        var response = await fetch(
          "http://localhost/E-com/features/Inventory-Mster/get_varient.php", {
            method: "POST",
            body: formdata,
          }
        );


        var json = await response.json();

        var Varientname_data = json.Varientname_data;

        var varient_html = '';
        varient_html += `  <option value="" disabled selected>Select Varient</option>`;
        for (let i = 0; i < Varientname_data.length; i++) {
          const element = Varientname_data[i];
          varient_html += `<option value='${element.id}'> ${element.Varientname} </option>`;
        }
        document.getElementById("Varientname").innerHTML = varient_html;



      } catch (error) {

        alert("something went wrong")
      }
    }
  </script>
</body>

</html>