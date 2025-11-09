<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("app/view/dashboard/css.php") ?>
    <title>Dashboard | User | Edit</title>
</head>

<body>
    <?php include("app/view/dashboard/navbar.php") ?>
    <?php include("app/view/dashboard/mainsidebar.php") ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                        <a type="button" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/users">Back</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit User</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Edit User <b><?php echo $_SESSION["user_edit"]["f_name"]; ?> <?php echo $_SESSION["user_edit"]["l_name"]; ?></b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter First Name" name="fname"
                                            value="<?php echo $_SESSION["user_edit"]["f_name"]; ?>">
                                        <?php
                                        if ($_SESSION['fnameError']) {
                                            echo '<div class="alert alert-danger alert-dismissible">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' . $_SESSION['fnameError'] . '</div>';
                                        } else {
                                            $_SESSION['fnameError'] = "";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Last Name" name="lname"
                                            value="<?php echo $_SESSION["user_edit"]["l_name"]; ?>">
                                        <?php
                                        if ($_SESSION['lnameError']) {
                                            echo '<div class="alert alert-danger alert-dismissible">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' .
                                                $_SESSION['lnameError']
                                                . '</div>';
                                        } else {
                                            $_SESSION['lnameError'] = "";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email" name="email"
                                            value="<?php echo $_SESSION["user_edit"]["email"]; ?>">
                                        <?php
                                        if ($_SESSION['emailError']) {
                                            echo '<div class="alert alert-danger alert-dismissible">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' .
                                                $_SESSION['emailError']
                                                . '</div>';
                                        } else {
                                            $_SESSION['emailError'] = "";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password" name="password"
                                            value="<?php echo $_SESSION["user_edit"]["password"]; ?>">
                                        <?php
                                        if ($_SESSION['passError']) {
                                            echo '<div class="alert alert-danger alert-dismissible">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' .
                                                $_SESSION['passError']
                                                . '</div>';
                                        } else {
                                            $_SESSION['passError'] = "";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Role</label>
                                        <select name="role" class="form-control">
                                            <?php if ($_SESSION["user_edit"]["role"] == "admin") { ?>
                                                <option selected value="admin">Admin</option>
                                                <option value="guest">Guest</option>
                                            <?php } else { ?>
                                                <option selected value="guest">Guest</option>
                                                <option value="admin">Admin</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include("app/view/dashboard/footer.php") ?>
    <?php include("app/view/dashboard/js.php") ?>

</body>

</html>