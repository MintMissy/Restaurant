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
    <nav class="nav nav--clear-bottom flex fs-600 text-white">
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
    <div class="grid grid-container--storage">
      <div class="table-filters flex">
        <div class="btn btn--round btn--small btn--light-gray">All</div>
        <div class="btn btn--round btn--small btn--light-gray">Nearly Depleted</div>
        <div class="btn btn--round btn--small btn--light-gray">Missing</div>
      </div>

      <div class="table-container">
        <table class="table tableFixHead">
          <thead>
            <tr class="table-row table-row--heading">
              <th class="fs-500 text-primary">id</th>
              <th class="fs-500 text-primary">item name</th>
              <th class="fs-500 text-primary">quantity</th>
              <th class="fs-500 text-primary">unit</th>
              <th class="fs-500 text-primary">recommended amount</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>
            <tr class="table-row">
              <td class="text-white--shade ff-roboto">1</td>
              <td class="text-white--shade ff-roboto">egg</td>
              <td class="text-white--shade ff-roboto">12</td>
              <td class="text-white--shade ff-roboto">kg</td>
              <td class="text-white--shade ff-roboto">6</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>