<?php
require_once './php/DatabaseConnector.php';

require_once 'php/presenters/OrdersPresenter.php';
require_once 'php/presenters/StoragePresenter.php';
require_once 'php/presenters/DatesPresenter.php';

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
</head>

<body>
  <!-- Navigation -->
  <header class="primary-header">
    <nav class="nav flex fs-600 text-white">
      <div class="nav-current-page">Dashboard</div>
      <div class="nav-right flex flow--horizontal letter-spacing-2 fs-500 ff-roboto capitalize">
        <ul class="nav-right__links flex flow--horizontal text-white--shade">
          <li class="nav-item"><a href="">home</a></li>
          <li class="nav-item"><a href="">storage</a></li>
          <li class="nav-item"><a href="">orders</a></li>
        </ul>
        <a href="index.php" class="btn text-dark ff-roboto capitalize letter-spacing-1 fs-500">
          <span style="margin-top: 3px;">Sign Out</span>
        </a>
      </div>
    </nav>
  </header>

  <main>
    <div class="grid grid-container--dashboard">
      <!-- Review Card -->
      <div class="card card--review flow">
        <!-- Monthly Review -->
        <div>
          <h1 class="ff-roboto fs-600 vertical-center">
            <i class="material-icons text-primary fs-700">donut_large</i>
            Monthly Review
          </h1>
          <div class="card-content card-content--review flex">
            <div class="text-primary--tint">
              <h2 class="text-white">
                <i class="material-icons">explore</i>
                Overview
              </h2>
              <p>
                Date Range:
                <span class="card-content-value text-white--shade ff-roboto fs-300">
                  <?php PresentDateRangeToPast("-4 week") ?>
                </span>
              </p>
              <p>
                Total orders:
                <span class="card-content-value text-white--shade ff-roboto fs-300">26</span>
              </p>
              <p>
                Food of the Month:
                <span class="card-content-value text-white--shade ff-roboto fs-300">Chips</span>
              </p>
            </div>
            <div class="text-primary--tint">
              <h2 class="text-white">
                <span class="material-icons">monetization_on</span>
                Income
              </h2>
              <p>
                Gross:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$14.00</span>
              </p>
              <p>
                Net:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$14.00</span>
              </p>
            </div>
            <div class="text-primary--tint">
              <h2 class="text-white">
                <span class="material-icons">trending_up</span>
                Revenue
              </h2>
              <p class="week-review__content-progress">
                Last week:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$1400</span>
              </p>
              <p class="week-review__content-progress">
                This week:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$1600</span>
              </p>
              <p class="week-review__content-progress">
                Proportion:
                <span class="card-content-value text-white--shade ff-roboto fs-300">125%</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Weekly Review -->
        <div>
          <h1 class="ff-roboto fs-600 vertical-center">
            <i class="material-icons text-primary fs-700">donut_large</i>
            Weekly Review
          </h1>
          <div class="card-content card-content--review flex">
            <div class="text-primary--tint">
              <h2 class="text-white">
                <i class="material-icons">explore</i>
                Overview
              </h2>
              <p>
                Date Range:
                <span class="card-content-value text-white--shade ff-roboto fs-300">
                  <?php PresentDateRangeToPast("-1 week") ?>
                </span>
              </p>
              <p>
                Total orders:
                <span class="card-content-value text-white--shade ff-roboto fs-300">26</span>
              </p>
              <p>
                Food of the Week:
                <span class="card-content-value text-white--shade ff-roboto fs-300">Chips</span>
              </p>
            </div>
            <div class="text-primary--tint">
              <h2 class="text-white">
                <span class="material-icons">monetization_on</span>
                Income
              </h2>
              <p>
                Gross:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$14.00</span>
              </p>
              <p>
                Net:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$14.00</span>
              </p>
            </div>
            <div class="text-primary--tint">
              <h2 class="text-white">
                <span class="material-icons">trending_up</span>
                Revenue
              </h2>
              <p class="week-review__content-progress">
                Last week:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$1400</span>
              </p>
              <p class="week-review__content-progress">
                This week:
                <span class="card-content-value text-white--shade ff-roboto fs-300">$1600</span>
              </p>
              <p class="week-review__content-progress">
                Proportion:
                <span class="card-content-value text-white--shade ff-roboto fs-300">+25%</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Orders Card -->
      <div class="card card--orders">
        <h1 class="ff-roboto fs-600 vertical-center">
          <i class="material-icons text-primary fs-700">room_service</i>
          Orders
        </h1>
        <div class="card-content card-content--orders flex-column">
          <!-- Pending -->
          <a href="" class="highlighted-row flex fs-500">
            <p>
              <i class="material-icons text-primary--tint">pending_actions</i>
              Pending: <span class="card-content-value text-white--shade ff-roboto">
                <?php PresentPendingOrdersAmount($connection) ?>
              </span>
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
          <!-- Shipped -->
          <a href="" class="highlighted-row flex fs-500">
            <p>
              <i class="material-icons text-primary--tint">directions_car</i>
              Shipped: <span class="card-content-value text-white--shade ff-roboto">
                <?php PresentShippedOrdersAmount($connection) ?>
              </span>
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
          <!-- Realized -->
          <a href="" class="highlighted-row flex fs-500">
            <p>
              <i class="material-icons text-primary--tint">task_alt</i>
              Realized: <span class="card-content-value text-white--shade ff-roboto">
                <?php PresentRealizedOrdersAmount($connection) ?>
              </span>
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
        </div>
      </div>
      <!-- Storage Card -->
      <div class="card card--storage">
        <h1 class="ff-roboto fs-600 vertical-center">
          <i class="material-icons text-primary fs-700">kitchen</i>
          Storage
        </h1>
        <div class="card-content card-content--orders flex-column">
          <!-- View Products -->
          <a href="" class="highlighted-row flex fs-500">
            <p>
              <i class="material-icons text-primary--tint">archive</i>
              View Products
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
          <!-- Warning Products -->
          <a href="" class="highlighted-row flex fs-500">
            <p class="text-warning">
              <i class="material-icons">report_problem</i>
              <?php PresentIngredientsNearlyDepletedAmount($connection) ?> Ingredients Nearly Depleted
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
          <!-- Error Products -->
          <a href="" div class="highlighted-row flex fs-500">
            <p class="text-error">
              <i class="material-icons">error</i>
              <?php PresentIngredientsMissingAmount($connection) ?> Ingredients Missing
            </p>
            <i class="material-icons highlighted-row__icon text-primary--tint">visibility</i>
          </a>
        </div>
      </div>
      <!-- Statistics Card -->
      <div class="card card--statistics flow">
        <h1 class="ff-roboto fs-600 vertical-center">
          <i class="material-icons text-primary fs-700">bar_chart</i>
          Statistics
        </h1>
        <div class="text-primary--tint">
          <p>
            <i class="material-icons">local_shipping</i>
            Average Delivery Time:
            <span class="card-content-value text-white--shade ff-roboto fs-300">15min 5s
            </span>
          </p>
          <p>
            <i class="material-icons">star</i>
            Mostly bought meal:
            <span class="card-content-value text-white--shade ff-roboto fs-300">Pepper Chicken</span>
          </p>
          <p>
            <i class="material-icons">star</i>
            Lorem Ipsum:
            <span class="card-content-value text-white--shade ff-roboto fs-300">Chips</span>
          </p>
        </div>
      </div>
      <!-- Marketing Card -->
      <div class="card card--marketing flow">
        <h1 class="ff-roboto fs-600 vertical-center">
          <i class="material-icons text-primary fs-700">manage_search</i>
          Marketing
        </h1>
        <div class="text-primary--tint">
          <p>
            <i class="material-icons">apartment</i>
            The Busiest City:
            <span class="card-content-value text-white--shade ff-roboto fs-300">Leszno
            </span>
          </p>
          <p>
            <i class="material-icons">event</i>
            Busiest Day:
            <span class="card-content-value text-white--shade ff-roboto fs-300">Friday
            </span>
          </p>
          <p>
            <i class="material-icons">history</i>
            Last purchase date:
            <span class="card-content-value text-white--shade ff-roboto fs-300">20.05.2021 10:05</span>
          </p>
          <p>
            <i class="material-icons">lunch_dining</i>
            The Last sold meal:
            <span class="card-content-value text-white--shade ff-roboto fs-300">Spaghetti Bolognese</span>
          </p>
        </div>
      </div>
      <!-- Employees Card -->
      <div class="card card--employees flow">
        <h1 class="ff-roboto fs-600 vertical-center">
          <i class="material-icons text-primary fs-700">groups</i>
          Employees
        </h1>
        <div class="text-primary--tint">
          <p>
            <i class="material-icons">face</i>
            Mark Johnson:
            <span class="card-content-value text-white--shade ff-roboto fs-300">At Work
            </span>
          </p>
          <p>
            <i class="material-icons">face</i>
            Mark Johnson:
            <span class="card-content-value text-white--shade ff-roboto fs-300">On Vacation</span>
          </p>
          <p>
            <i class="material-icons">face</i>
            Mark Johnson:
            <span class="card-content-value text-white--shade ff-roboto fs-300">After Work</span>
          </p>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<?php CloseConnection($connection); ?>