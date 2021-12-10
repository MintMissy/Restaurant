<?php
require_once './php/DatabaseConnector.php';
require_once './php/presenters/StoragePresenter.php';

$connection = OpenConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Storage - Restaurant</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" type="image/png" href="./img/favicon32x32.png" />
  <script src="js/filters.js" defer></script>
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
        <div class="table-filters flex" role="filters-list" aria-label="filters-list">
          <div aria-selected="true" role="filter" aria-controls="all-table-data" class="btn btn--round text-dark btn--small">All</div>
          <div aria-selected="true" role="filter" aria-controls="nearly-depleted-table-data" class="btn btn--round btn--small btn--light-gray">Nearly Depleted</div>
          <div aria-selected="true" role="filter" aria-controls="missing-table-data" class="btn btn--round btn--small btn--light-gray">Missing</div>
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
            <tbody class="text-white--shade ff-roboto" id="all-table-data" role="table-data">
              <?php PresentIngredientsAllBlock($connection) ?>
            </tbody>
            <tbody hidden class="text-white--shade ff-roboto" id="nearly-depleted-table-data" role="table-data">
              <?php PresentIngredientsNearlyDepletedBlock($connection) ?>
            </tbody>
            <tbody hidden class="text-white--shade ff-roboto" id="missing-table-data" role="table-data">
              <?php PresentIngredientsMissingBlock($connection) ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>