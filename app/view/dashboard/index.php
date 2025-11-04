<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo WEBSITE_NAME ?> | Dashboard </title>
  <?php include("app/view/dashboard/css.php") ?>
</head>


<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


    <?php include("app/view/dashboard/navbar.php") ?>


    <?php include("app/view/dashboard/mainsidebar.php") ?>

    <?php include("app/view/dashboard/content.php") ?>

    <?php include("app/view/dashboard/footer.php") ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php include_once 'js.php'; ?>
</body>

</html>