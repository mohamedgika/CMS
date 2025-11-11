<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("app/view/dashboard/css.php") ?>
    <title>Dashboard | Category</title>
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
                        <?php
                        if ($_SESSION['error']) {
                            echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' .
                                $_SESSION['error']
                                . '</div>';
                        } else {
                            $_SESSION['error'] = "";
                        }
                        ?>
                        <?php
                        if ($_SESSION['success']) {
                            echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>' .
                                $_SESSION['success']
                                . '</div>';
                        } else {
                            $_SESSION['success'] = "";
                        }
                        ?>
                        <a type="button" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/users/create">Create
                            Category</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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


                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Created by</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($categories->getAll() as $category) {
                                            ?>
                                            <tr>
                                                <td><?php echo $category['id'] ?></td>
                                                <td><?php echo $category['name'] ?></td>
                                                <td><?php
                                                $user = $categories->user($category['user_id']);
                                                echo $user['f_name'] . ' ' . $user['l_name'];
                                                ?></td>
                                                <td><a type="button" class="btn btn-success"
                                                        href="<?php echo BASE_URL ?>admin/users/edit/<?php echo "" ?>">Edit</a>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-danger"
                                                        href="<?php echo BASE_URL ?>admin/users/delete/<?php echo "" ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include("app/view/dashboard/footer.php") ?>
    <?php include("app/view/dashboard/js.php") ?>

</body>

</html>


<?php
$_SESSION['error'] = "";
$_SESSION['success'] = "";
?>