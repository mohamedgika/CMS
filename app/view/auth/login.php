<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/cms/public/bootstrap/css/bootstrap.min.css">
    <title>Login to <?php echo WEBSITE_NAME ?></title>
</head>

<body>
    <div class="container px-4 mt-5">
        <?php
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        } else {
            $error = '';
        }
        ?>
        <?php
        if (isset($_SESSION['success'])) {
            $success = $_SESSION['success'];
            echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
        }
        ?>
        <h1 class="text-center">Login To <?php echo WEBSITE_NAME ?></h1>
        <form class="row g-3 m-auto col-md-6" method="POST">
            <div class="col-md-6 mb-3 w-100">
                <label for="inputEmail4" class="form-label">Email</label>
                <?php
                if (!empty($_SESSION['emailError'])) {
                    echo '<input type="email" class="form-control is-invalid" id="inputEmail4" name="email">';
                    echo '<div class="invalid-feedback">' . $_SESSION['emailError'] . '</div>';
                } else {
                    echo '<input type="email" class="form-control" id="inputEmail4" name="email">';
                }
                ?>

            </div>
            <br>
            <div class="col-md-6 w-100">
                <label for="inputPassword4" class="form-label">Password</label>
                <?php
                if (!empty($_SESSION['passError'])) {
                    echo '<input type="password" class="form-control is-invalid" id="inputPassword4" name="pass">';
                    echo '<div class="invalid-feedback">' . $_SESSION['passError'] . '</div>';
                } else {
                    echo '<input type="password" class="form-control" id="inputPassword4" name="pass">';
                }
                ?>
            </div>
            <div class="col-12 mb-3">
                <input type="submit" class="btn btn-outline-primary btn-lg w-100" value="Sign in">
            </div>
        </form>
    </div>

    <script src="http://localhost/cms/public/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>