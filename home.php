<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>

<body>

    <?php
    session_start();
    print_r($_SESSION['email']);
    ?>

</body>

</html>