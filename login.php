<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container px-4 mt-5">

        <h1 class="text-center">Login Page</h1>
        <form class="row g-3 m-auto col-md-6" action="validationLogin.php"
            method="POST">
            <div class="col-md-6 mb-3 w-100">
                <label for="inputEmail4" class="form-label">Email</label>
                <?php
                if (!empty($emailError)) {
                    echo '<input type="email" class="form-control is-invalid" id="inputEmail4" name="email">';
                    echo '<div class="invalid-feedback">' . $emailError . '</div>';
                } else {
                    echo '<input type="email" class="form-control" id="inputEmail4" name="email">';
                }
                ?>

            </div>
            <br>
            <div class="col-md-6 w-100">
                <label for="inputPassword4" class="form-label">Password</label>
                <?php
                if (!empty($passError)) {
                    echo '<input type="password" class="form-control is-invalid" id="inputPassword4" name="pass">';
                    echo '<div class="invalid-feedback">' . $passError . '</div>';
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

    <script src="./js/bootstrap.min.js"></script>
</body>

</html>