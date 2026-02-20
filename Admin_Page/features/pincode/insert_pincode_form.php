<?php require_once "../../database.php";
$db = new Database("ecoms");
$country_data = $db->getdata("country");



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
      height: 500px;
      width: 500px;
      border-radius: 10px;
      border: 1px solid;
    }

    body {
      height: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <form class="box p-5" action="insert_pincode_service.php" method="POST">
    <!-- <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Country Nmae</label>
    <input type="text" name="country_name" class="form-control"  aria-describedby="emailHelp">
  </div> -->

    <div class="mb-3">
      <label>Country Name</label>
      <select class="form-control" name="country_name" id="country_name" onchange="get_country()">
        <option value="" disabled selected>Select Country</option>
        <?php

        foreach ($country_data as  $country_row) {


          echo '<option value="' . $country_row['id'] . '">' . $country_row['country_name'] . '</option>';
        }


        ?>
      </select>
    </div>

    <label>State Name</label>
      <select class="form-control" name="state_name" id="state_name" onchange="get_state()">
        <option value="">Select State</option>
      </select>

      <label>City Name</label>
<select class="form-control" name="city_name" id="city_name">
  <option value="" disabled selected>Select City</option>
</select>



    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Pincode</label>
      <input type="number" name="pincode" class="form-control" id="pincode" aria-describedby="emailHelp" max="999999" min="99999">
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" checked>
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>

  <script>
    const get_country = async () => {
      try {
        var country_name = document.getElementById("country_name").value;

        var formdata = new FormData();
        formdata.append("country_name", country_name);

        var response = await fetch(
          "http://localhost/E-com/features/city/get_state.php", {
            method: "POST",
            body: formdata,
          }
        );

        var json = await response.json();
        var state_data = json.state_data;

        // var state_html = '';
        var state_html = `<option value="" disabled selected>Select State</option>`;

        for (var i = 0; i < state_data.length; i++) {
          const element = state_data[i];
          state_html += `<option value="${element.id}"> ${element.state_name} </option>`;
        }

        document.getElementById("state_name").innerHTML = state_html;

      } catch (error) {
        alert("Something went wrong");
      }
    }
    // ..............
     const get_state = async () => {
  try {
    var state_id = document.getElementById("state_name").value;

    var formdata = new FormData();
    formdata.append("state_id", state_id);

    var response = await fetch(
      "http://localhost/E-com/features/pincode/get_city.php", {
        method: "POST",
        body: formdata,
      }
    );

    var json = await response.json();
    var city_data = json.city_data;

    var city_html = `<option value="" disabled selected>Select City</option>`;

    for (var i = 0; i < city_data.length; i++) {
      const element = city_data[i];
      city_html += `<option value="${element.id}">${element.city_name}</option>`;
    }

    document.getElementById("city_name").innerHTML = city_html;

  } catch (error) {
    alert("Something went wrong");
  }
};


  </script>

</body>

</html>