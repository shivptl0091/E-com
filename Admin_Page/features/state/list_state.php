<?php
require_once "../../commen/header.php";
require_once "../../database.php";

$db = new database("ecoms");

$limit = 3;
$offset = 0;

$page = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $offset = ($page - 1) * $limit;
}
$where = "";
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  if ($search != "") {
    $where = "WHERE state.id LIKE '%$search%' OR country.country_name LIKE '%$search%' OR state.state_name LIKE '%$search%'";
  }
}

$query = 
"SELECT state.id,state.state_name,country.country_name FROM state 
join country ON state.country_name = country.id
 $where LIMIT $offset,$limit
";

$data=$db->get_data_from_query($query);

// $data = $db->getdata('state', $limit, $offset, $where);


?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">State page</h1>

</div>
<!-- /.container-fluid -->


<div class="d-flex justify-content-end">
  <form class="d-flex" role="search" action="list_state.php">
    <input class="form-control me-2 box" name="search" type="search" placeholder="Search" aria-label="Search" />
    <button class="btn btn-outline-primary me-2 Search" type="submit">Search</button>
  </form>
  <a href="./insert_state_form.php" class="btn btn-primary m-2">ADD NEW</a>
</div>

<div class="container-fluid mt-3">
  <table class="table table-primary">
    <thead>
      <th>ID</th>
      <th>Country Name</th>
      <th>State Name</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $i=1;
      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $i. "</td>";
        echo "<td>" . $row['country_name'] . "</td>";
        echo "<td>" . $row['state_name'] . "</td>";
        echo " <td><a href='update_state_form.php?id=" . $row['id'] . "' class='btn btn-success'><i class='bi bi-pencil'></i></a> <button onclick='delete_state(" . $row['id'] . ")' class='btn btn-danger'><i class='bi bi-trash'></i></button> </td>";

        echo "</tr>";
        $i++;
      }

      ?>
    </tbody>
  </table>
  <?php

$query =
 "SELECT state.id,state.state_name,country.country_name FROM state join country ON
state.country_name = country.id $where
";
$res=$db->get_data_from_query($query);

  // $res = $db->getdata('state', 0, 0, $where);
  $totol_data = count($res);
  $total_page = ceil($totol_data / $limit);


  echo '<div class="d-flex justify-content-end"> 
                    <nav aria-label="Page navigation example ">
                <ul class="pagination">';

  if ($page != 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
  }
  for ($k = 1; $k < $total_page; $k++) {
    $active = '';
    if ($page == $k) {
      $active = 'active';
    }
    echo '<li class="page-item"><a class="page-link ' . $active . '" href="?page=' . $k . '">' . $k . '</a></li>';
  }
  if ($page != $total_page) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
  }
  echo '  
                </ul>
            </nav>
        </div>';
  ?>





</div>
<!-- <button type="button" class="btn btn-outline-primary"></button> -->

</div>
<!-- End of Main Content -->


<!-- Footer -->
<?php
require_once "../../commen/footer.php";
?>