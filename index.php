<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Restaurant</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" type="image/png" href="./img/favicon32x32.png" />
</head>

<body>
  <form action="dashboard.php" method="POST" class="login-form flex-column flow">
    <h1 class="login-form-title letter-spacing-1 fs-800">Welcome!</h1>
    <div class="login-form__inputs flow">
      <input type="text" name="login" class="login-form-input text-white--shade fs-500" required placeholder="Username" />
      <input type="password" name="password" class="login-form-input text-white--shade fs-500" required placeholder="Password" />
    </div>
    <input type="submit" value="login" class="btn btn--submit ff-roboto uppercase letter-spacing-2">
  </form>
</body>

</html>