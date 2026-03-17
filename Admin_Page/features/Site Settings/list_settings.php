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
    $where = "WHERE id LIKE '%$search%' OR
     banner_title LIKE '%$search%' OR
      banner_subtitle LIKE '%$search%'OR
       banner_button_text LIKE '%$search%'OR ";
  }
}
$data = $db->getdata('site_settings', $limit, $offset, $where);

?>



<!-- Begin Page2 Content -->
<div class="container-fluid">

  <!-- Page2 Heading -->
  <h1 class="h3 mb-4 text-gray-800">Settings Page</h1>

</div>
<!-- /.container-fluid -->



<div class="d-flex justify-content-end">
  <form class="d-flex" role="search" action="list_settings.php">
    <input class="form-control me-2 box" name="search" type="search" placeholder="Search" aria-label="Search" />
    <button class="btn btn-outline-primary me-2 Search" type="submit">Search</button>
  </form>
  <a href="./insert_site_settings_form.php" class="btn btn-primary m-2">ADD NEW</a>
  <!-- <a href="./blank2.php" class="btn btn-primary m-2">Reset</a> -->
  <!-- <a href="./login.php" class="btn btn-primary m-2">LOG OUT</a> -->
</div>

<div class="container-fluid mt-3">
  <table class="table table-primary">
    <thead>
      <th>ID</th>
      <th>Logo</th>
      <th>Banner Title</th>
      <th>Banner Subtitle</th>
      <th>Banner Button Text</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $i=1;
      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td> <img class='profile-img' src='../../banner_image/" . $row['banner_image'] . "' alt='image not found'' > </td>";
        echo "<td>" . $row['banner_title'] . "</td>";
        echo "<td>" . $row['banner_subtitle'] . "</td>";
        echo "<td>" . $row['banner_button_text'] . "</td>";
        echo " <td><a href='update_site_settings_form.php?id=" . $row['id'] . "' class='btn btn-success'><i class='bi bi-pencil'></i></a> <button onclick='delete_site_settings(" . $row['id'] . ")' class='btn btn-danger'><i class='bi bi-trash'></i></button> </td>";

        echo "</tr>";
        $i++;
      }

      ?>
    </tbody>
  </table>
  <?php

  $res = $db->getdata('site_settings', 0, 0, $where);
  $totol_data = count($res);
  $total_page = ceil($totol_data / $limit);


  echo '<div class="d-flex justify-content-end"> 
                    <nav aria-label="Page2 navigation example ">
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
<!-- End of Main Content -->


<!-- Footer -->
<?php
require_once "../../commen/footer.php";
?>