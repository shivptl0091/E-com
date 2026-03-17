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
$where = "WHERE varient.id LIKE '%$search%' OR varient.productname LIKE '%$search%' OR size_mapping.size LIKE '%$search%' OR colors.colors LIKE '%$search%'";

  }
}
// 

$query = "SELECT varient.id,Varient.Varientname,product.productname,size_mapping.size,colors.colors AS color
FROM varient
JOIN product ON varient.productname = product.id
JOIN size_mapping ON varient.size = size_mapping.id
JOIN colors ON varient.color = colors.id
$where
LIMIT $offset,$limit";



// 
$data = $db->getdata('varient', $limit, $offset, $where);

// echo "<pre>";
// print_r($data);
// die();

?>



<!-- Begin Page2 Content -->
<div class="container-fluid">

  <!-- Page2 Heading -->
  <h1 class="h3 mb-4 text-gray-800">Varient Master Page</h1>

</div>
<!-- /.container-fluid -->



<div class="d-flex justify-content-end">
  <form class="d-flex" role="search" action="list_varient.php">
    <input class="form-control me-2 box" name="search" type="search" placeholder="Search" aria-label="Search" />
    <button class="btn btn-outline-primary me-2 Search" type="submit">Search</button>
  </form>
  <a href="./insert_varient_form.php" class="btn btn-primary m-2">ADD NEW</a>
</div>

<div class="container-fluid mt-3">
  <table class="table table-primary">
    <thead>
      <th>ID</th>
      <th>Varient Name</th>
      <th>Product Name</th>
      <th>size</th>
      <th>color</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $row['Varientname'] . "</td>";
        echo "<td>" . $row['productname'] . "</td>";
        echo "<td>" . $row['size'] . "</td>";
        echo "<td>" . $row['color'] . "</td>";
        echo " <td><a href='update_varient_form.php?id=" . $row['id'] . "' class='btn btn-success'><i class='bi bi-pencil'></i></a> <button onclick='delete_varient(" . $row['id'] . ")' class='btn btn-danger'><i class='bi bi-trash'></i></button> </td>";

        echo "</tr>";
        $i++;
      }

      ?>
    </tbody>
  </table>
  <?php
  // 
$query = "SELECT varient.id,Varient.Varientname,product.productname,size_mapping.size,colors.colors AS color
FROM varient
JOIN product ON varient.productname = product.id
JOIN size_mapping ON varient.size = size_mapping.id
JOIN colors ON varient.color = colors.id
$where
";






  // 

  $res = $db->getdata('varient', 0, 0, $where);
  $totol_data = count($res);
  $total_page = ceil($totol_data / $limit);


  echo '<div class="d-flex justify-content-end"> 
                    <nav aria-label="Page2 navigation example ">
                <ul class="pagination">';

  if ($page != 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
  }
  for ($k = 1; $k <= $total_page; $k++) {
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
<!-- End of Main Content -->


<!-- Footer -->
<?php
require_once "../../commen/footer.php";
?>