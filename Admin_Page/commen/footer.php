  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; Mr.shivpatel 2026</span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.php">Logout</a>
              </div>
          </div>
      </div>
  </div>
  <script>
      const delete_category = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_category.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const deletedata1 = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "datele_brand.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const deletedata2 = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_user.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const deletedataproduct = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_product.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }


      const delete_size_mapping = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_size_mapping.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const delete_colors = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_colors.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }

      const delete_varient = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_varient.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }

      const delete_country = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_country.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const delete_state = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_state.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }

      }
      const delete_city = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_city.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }
      }
      const delete_pincode = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_pincode.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }
      }
          const delete_inventory = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_inventory.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }
      }
          const delete_product_photo = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "delete_product_photo.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }
      }
          const delete_site_settings = (id) => {

          let value = confirm("do you want to delete data");

          try {
              window.location.href = "datele_site_settings.php?id=" + id;
          } catch (error) {
              alert("something want wrong ?");

          }
      }
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="http://localhost/E-com/Admin_Page/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/E-com/Admin_Page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/E-com/Admin_Page/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/E-com/Admin_Page/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="http://localhost/E-com/Admin_Page/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="http://localhost/E-com/js/demo/chart-area-demo.js"></script>
  <script src="http://localhost/E-com/js/demo/chart-pie-demo.js"></script> -->

  </body>

  </html>