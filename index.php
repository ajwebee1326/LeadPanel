<?php
include 'conn.php';
validae_login();

$page = $_GET['page'] ?? 1; 

$inquiriesSql = "SELECT * FROM inquiries LIMIT 2 OFFSET ".(($page - 1) * 2);
$inquiries = $conn->query($inquiriesSql);
$inquiries_table_keys = [];
if($inquiries->num_rows){
  $inquiries = $inquiries->fetch_all(MYSQLI_ASSOC);
  $inquiries_table_keys = array_keys($inquiries[0]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    <?php echo APP_NAME;?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <?php include 'includes/sidebar.php'  ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Inquiries table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <?php
                      foreach($inquiries_table_keys as $key){
                        echo "<th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>$key</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($inquiries as $inquiry){
                      echo "<tr>";
                      foreach($inquiry as $key => $value){
                        echo "<td>";
                        echo "<div class='d-flex px-2 py-1'>";
                        echo "<div class='d-flex flex-column justify-content-center'>";
                        echo "<h6 class='mb-0 text-sm'>$value</h6>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                      }
                     
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                  <!-- paginations -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php include 'includes/footer.php'; ?>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>