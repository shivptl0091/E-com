<?php
require_once "../../database.php";
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
      height: 470px;
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
  <form class="box p-5" action="insert_varient_service.php" method="POST">

  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Varient Name</label>
      <input type="text" name="Varientname" class="form-control" aria-describedby="emailHelp">
    </div>

      <div class="mb-3">
  <label>Product Name</label>
  <select class="form-control" name="productname" id="productname" onchange="get_color_size()">
    <option value="" disabled selected>Select Product</option>

    <?php
    foreach ($product_data as $product_row) {
    
          echo '<option value="' . $product_row['id'] . '">' . $product_row['productname'] . '</option>';

    }
    ?>

  </select>
</div>

    <div class="mb-3">
      <label>Size</label>
      <select class="form-control" name="size" id="size">
      </select>
    </div>
    <div class="mb-3">
      <label>Color</label>
      <select class="form-control" name="color" id="color">

      </select>
    </div>
    <!-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Colors</label>
      <input type="text" name="colors" class="form-control" aria-describedby="emailHelp">
    </div> -->
    <input type="checkbox" class="form-check-input">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>


  <script>
    const get_color_size = async () => {
      try {

        var productname = document.getElementById("productname").value;
        var formdata = new FormData();
        formdata.append("productname", productname)

        var response = await fetch(
          "http://localhost/E-com/features/Varient-Master/get_size_colors.php", {
            method: "POST",
            body: formdata,
          }
        );

        // var response = await fetch('http://localhost/E-com/features/Varient%20Master/get_size_colors.php', options);

        var json = await response.json();

        var color_data = json.color_data;

        var color_html = '';  
        color_html += `  <option value="" disabled selected>Select Color</option>`;
        for (let i = 0; i < color_data.length; i++) {
          const element = color_data[i];
          color_html += `<option value='${element.id}'> ${element.colors} </option>`;
        }
        document.getElementById("color").innerHTML = color_html;


      
        
       var size_data = json.size_data;
       console.log(size_data);
         var size_html  = `<option value="" disabled selected>Select Size</option>`;

        for (var i = 0; i < size_data.length; i++) {
          const element = size_data[i];
          size_html += `<option value="${element.id}"> ${element.size} </option>`;

        }

        document.getElementById("size").innerHTML = size_html;


      } catch (error) {

        alert("something went wrong")
      }
    }
  </script>
</body>

</html>