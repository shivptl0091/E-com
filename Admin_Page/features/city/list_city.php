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
    $where = "WHERE id LIKE '%$search%' OR country_name LIKE '%$search%' OR state_name LIKE '%$search%' OR city_name LIKE '%$search%'";
  }
}
$query = "SELECT city.id,city.city_name,state.state_name,country.country_name FROM city
join country ON city.country_name = country.id
join state ON city.state_name = state.id
 $where LIMIT $offset,$limit


";


$data=$db->get_data_from_query($query);

// $data = $db->getdata('city', $limit, $offset, $where);

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">City page</h1>

</div>
<!-- /.container-fluid -->


<div class="d-flex justify-content-end">
  <form class="d-flex" role="search" action="list_state.php">
    <input class="form-control me-2 box" name="search" type="search" placeholder="Search" aria-label="Search" />
    <button class="btn btn-outline-primary me-2 Search" type="submit">Search</button>
  </form>
  <a href="./insert_city_form.php" class="btn btn-primary m-2">ADD NEW</a>
</div>

<div class="container-fluid mt-3">
  <table class="table table-primary">
    <thead>
      <th>ID</th>
      <th>Country Name</th>
      <th>State Name</th>
      <th>City Name</th>
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
        echo "<td>" . $row['city_name'] . "</td>";
        echo " <td><a href='update_city_form.php?id=" . $row['id'] . "' class='btn btn-success'><i class='bi bi-pencil'></i></a> <button onclick='delete_city(" . $row['id'] . ")' class='btn btn-danger'><i class='bi bi-trash'></i></button> </td>";

        echo "</tr>";
        $i++;
      }

      ?>
    </tbody>
  </table>
  <?php
  $query = "SELECT city.id,city.city_name,state.state_name,country.country_name FROM city
join country ON city.country_name = country.id
join state ON city.state_name = state.id
 $where 
";
$res=$db->get_data_from_query($query);

  // $res = $db->getdata('city', 0, 0, $where);
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