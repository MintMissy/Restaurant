<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login into database</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php
    $admin_login = 'login';
    $admin_password = 'zaq1';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login == $admin_login && $password == $admin_password) {
            // echo ("logged in");
        }
    } else {
        // echo ("Fill the form");
    }
    ?>

    <form action="dashboard.php" method="POST" class="login-form">
        <h1>Login into Restaurant</h1>
        <div class="input-container">
            <input type="text" name="login" required placeholder="Username" />
        </div>

        <div class="input-container">
            <input type="password" name="password" required placeholder="Password" />
        </div>

        <input type="submit" value="login" class="btn--submit">
    </form>

</body>

</html>