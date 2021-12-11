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
        <?php
        function GetSelectedFilter()
        {
          if (!isset($_GET['filter'])) {
            return 'all';
          }

          switch ($_GET['filter']) {
            case 'all':
              return 'all';
            case 'nearlyDepleted':
              return 'nearlyDepleted';
            case 'missing':
              return 'missing';
            default:
              return 'all';
          }
        }

        $selectedBtnClasses = "btn btn--round text-dark btn--small";
        $unselectedBtnClasses = "btn btn--round btn--small btn--light-gray";

        $selectedFilter = GetSelectedFilter()
        ?>

        <div class="table-filters flex" role="filters-list" aria-label="filters-list">
          <a href="storage.php?filter=all#tableContainer" class="<?php echo $selectedFilter == 'all' ? $selectedBtnClasses : $unselectedBtnClasses ?>">All</a>
          <a href="storage.php?filter=nearlyDepleted#tableContainer" class="<?php echo $selectedFilter == 'nearlyDepleted' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Nearly Depleted</a>
          <a href="storage.php?filter=missing#tableContainer" class="<?php echo $selectedFilter == 'missing' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Missing</a>
        </div>

        <div id="tableContainer" class="table-container">
          <table class="table tableFixHead">
            <thead class="fs-500 text-primary">
              <tr>
                <th class="column-storage--id">id</th>
                <th class="column-storage--item-name">item name</th>
                <th class="column-storage--quantity">quantity</th>
                <th class="column-storage--unit">unit</th>
                <th class="column-storage--recommended-amount">recommended amount</th>
              </tr>
            </thead>
            <tbody class="text-white--shade ff-roboto">
              <?php echo $selectedFilter == 'all' ? PresentIngredientsAllBlock($connection) : '' ?>
              <?php echo $selectedFilter == 'nearlyDepleted' ? PresentIngredientsNearlyDepletedBlock($connection) : '' ?>
              <?php echo $selectedFilter == 'missing' ? PresentIngredientsMissingBlock($connection) : '' ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>