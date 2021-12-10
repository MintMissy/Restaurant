<?php
require_once './php/DatabaseConnector.php';

$connection = OpenConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Restaurant</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" type="image/png" href="./img/favicon32x32.png" />
</head>

<body>
  <!-- Navigation -->
  <header class="primary-header">
    <nav class="nav flex fs-600 text-white">
      <div class="nav-current-page">Storage</div>
      <div class="nav-right flex flow--horizontal letter-spacing-2 fs-500 ff-roboto capitalize">
        <ul class="nav-right__links flex flow--horizontal text-white--shade">
          <li class="nav-item"><a href="dashboard.php">home</a></li>
          <li class="nav-item"><a href="storage.php">storage</a></li>
          <li class="nav-item"><a href="orders.php">orders</a></li>
        </ul>
        <a href="index.php" class="btn text-dark ff-roboto capitalize letter-spacing-1 fs-500">
          <span style="margin-top: 3px;">Sign Out</span>
        </a>
      </div>
    </nav>
  </header>

  <main>
    <div class="grid grid-container grid-container--storage">
      <div class="card">
        <div class="table-filters flex">
          <div class="btn btn--round btn--small btn--light-gray">All</div>
          <div class="btn btn--round btn--small btn--light-gray">Nearly Depleted</div>
          <div class="btn btn--round btn--small btn--light-gray">Missing</div>
        </div>
        <div class="table-container">
          <table class="table tableFixHead">
            <thead class="fs-500 text-primary">
              <tr>
                <th>id</th>
                <th>item name</th>
                <th>quantity</th>
                <th>unit</th>
                <th>recommended amount</th>
              </tr>
            </thead>
            <tbody class="text-white--shade ff-roboto">
              <tr>
                <td>1</td>
                <td>egg</td>
                <td>12</td>
                <td>kg</td>
                <td>6</td>
              </tr>
              <?php ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>