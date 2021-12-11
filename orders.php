<?php
require_once './php/DatabaseConnector.php';
require_once './php/presenters/OrdersPresenter.php';

$connection = OpenConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders - Restaurant</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" type="image/png" href="./img/favicon32x32.png" />
</head>

<body>
  <!-- Navigation -->
  <header class="primary-header">
    <nav class="nav flex fs-600 text-white">
      <div class="nav-current-page">Orders</div>
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
          switch ($_GET['filter']) {
            case 'pending':
              return 'pending';
            case 'shipped':
              return 'shipped';
            case 'lastRealized50':
              return 'lastRealized50';
            case 'lastRealized200':
              return 'lastRealized200';
            default:
              return 'lastRealized50';
          }
        }

        $selectedBtnClasses = "btn btn--round text-dark btn--small";
        $unselectedBtnClasses = "btn btn--round btn--small btn--light-gray";

        $selectedFilter = GetSelectedFilter()
        ?>

        <div class="table-filters flex" role="filters-list" aria-label="filters-list">
          <a href="orders.php?filter=pending#tableContainer" class="<?php echo $selectedFilter == 'pending' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Pending</a>
          <a href="orders.php?filter=shipped#tableContainer" class="<?php echo $selectedFilter == 'shipped' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Shipped</a>
          <a href="orders.php?filter=lastRealized50#tableContainer" class="<?php echo $selectedFilter == 'lastRealized50' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Realized (50)</a>
          <a href="orders.php?filter=lastRealized200#tableContainer" class="<?php echo $selectedFilter == 'lastRealized200' ? $selectedBtnClasses : $unselectedBtnClasses ?>">Realized (200)</a>
        </div>

        <div id="tableContainer" class="table-container">
          <table class="table tableFixHead">
            <thead class="fs-500 text-primary">
              <tr>
                <th class="column-orders--id">id</th>
                <th class="column-orders--client">client</th>
                <th class="column-orders--meal">meal</th>
                <th class="column-orders--quantity">quantity</th>
                <th class="column-orders--dlvr-place">dlvr place</th>
                <th class="column-orders--dlvr-postcode">dlvr postcode</th>
                <th class="column-orders--order-date">order date </th>
                <th class="column-orders--shipment-date">shipment date</th>
                <th class="column-orders--pickup-date">pickup date</th>
                <th class="column-orders--order-type">order type</th>
              </tr>
            </thead>
            <tbody class="text-white--shade ff-roboto">
              <?php echo $selectedFilter == 'pending' ? PresentOrdersPendingBlock($connection) : '' ?>
              <?php echo $selectedFilter == 'shipped' ? PresentOrdersShippedBlock($connection) : '' ?>
              <?php echo $selectedFilter == 'lastRealized50' ? PresentOrdersRealizedBlock($connection, 50) : '' ?>
              <?php echo $selectedFilter == 'lastRealized200' ? PresentOrdersRealizedBlock($connection, 200) : '' ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>