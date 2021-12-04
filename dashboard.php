<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

  <nav class="nav">
    <div class="nav__brand">Dashboard</div>
    <ul class="nav-links">
      <a href="">
        <li class="nav__link">Home</li>
      </a>
      <a href="">
        <li class="nav__link">Storage</li>
      </a>
      <a href="">
        <li class="nav__link">Orders</li>
      </a>
      <a href="login.php">
        <li class="nav__link btn--log-out">Log Out</li>
      </a>
    </ul>
  </nav>

  <div class="cards-container">
    <div class="card week-review">
      <h1>
        <span class="material-icons">donut_large</span>
        Monthly Review
      </h1>
      <div class="week-review__content">
        <div class="container">
          <h2>
            <span class="material-icons">explore</span>
            Overview
          </h2>
          <p>Date: 15.09-30.09 </span></p>
          <p>Total orders: 26</span></p>
          <p>Food of Month: Chips</span></p>
        </div>
        <div class="container">
          <h2>
            <span class="material-icons">monetization_on</span>
            Income
          </h2>
          <p>Pre-tax: $14.00</span></p>
          <p>Net: $14.00</span></p>
        </div>
        <div class="container">
          <h2>
            <span class="material-icons">trending_up </span>
            Revenue
          </h2>
          <p class="week-review__content-progress">Last week: $1400</p>
          <p class="week-review__content-progress">This week income: $1600</p>
          <p class="week-review__content-progress">
            Difference: +25%</p>
        </div>
      </div>

      <h1>
        <span class="material-icons">data_usage</span>
        Weekly Review
      </h1>
      <div class="week-review__content">
        <div class="container">
          <h2>
            <span class="material-icons">explore</span>
            Overview
          </h2>
          <p>Date: 15.09-30.09 </p>
          <p>Total orders: 26</p>
          <p>Food of Week: Fries</span></p>
        </div>
        <div class="container">
          <h2>
            <span class="material-icons">monetization_on</span>
            Income
          </h2>
          <p>Pre-tax: $14.00</span></p>
          <p>Net: $14.00</span></p>
        </div>
        <div class="container">
          <h2>
            <span class="material-icons">trending_up </span>
            Revenue
          </h2>
          <p class="week-review__content-progress">Last week: $1400</p>
          <p class="week-review__content-progress">This week income: $1600</p>
          <p class="week-review__content-progress">
            Difference: +25%</p>
        </div>
      </div>
    </div>
    <div class="card orders">
      <h1>
        <span class="material-icons">room_service</span>
        Orders
      </h1>
      <a href="">
        <div class="highlighted-row">
          <p>
            <span class="material-icons">pending_actions</span>
            Pending: 5
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
      <a href="">
        <div class="highlighted-row">
          <p>
            <span class="material-icons">directions_car</span>
            Shipped: 5
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
      <a href="">
        <div class="highlighted-row">
          <p>
            <span class="material-icons">task_alt</span>
            Realised: 2
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
    </div>
    <div class="card marketing">
      <h1>
        <span class="material-icons">manage_search</span>
        Marketing
      </h1>
      <p>
        <span class="material-icons">apartment</span>
        Busiest city: Leszno
      </p>
      <p>
        <span class="material-icons">event</span>
        Busiest day: Friday, 13-4-2021
      </p>
      <p>
        <span class="material-icons">history</span>
        Last purchase date: 15-12-2021
      </p>
      <p>
        <span class="material-icons">lunch_dining</span>
        Last bought product: Chips
      </p>
    </div>
    <div class="card statistics">
      <h1>
        <span class="material-icons">bar_chart</span>
        Statictics
      </h1>
      <p>
        <span class="material-icons">local_shipping</span>
        Average delivery time: 15 min 0 sec
      </p>
      <p>
        <span class="material-icons">star</span>
        Favorite meal: Chips
      </p>

    </div>

    <div class="card storage">
      <h1>
        <span class="material-icons">kitchen</span>
        Storage
      </h1>
      <a href="">
        <div class="highlighted-row">
          <p class="error">
            <span class="material-icons error">error</span>
            Missing Products
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
      <a href="">
        <div class="highlighted-row">
          <p class="warning">
            <span class="material-icons warning">report_problem</span>
            Products on end
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
      <a href="">
        <div class="highlighted-row">
          <p>
            <span class="material-icons">archive</span>
            View products
          </p>
          <span class="highlighted-row__icon material-icons">visibility</span>
        </div>
      </a>
    </div>

    <div class="card employees">
      <h1>
        <span class="material-icons">groups</span>
        Employees
      </h1>
      <p>Matt Johnson: Working</p>
      <p>Matt Johnson: Vacation</p>
      <p>Matt Johnson: Working</p>
      <p>Matt Johnson: Out side work</p>
    </div>

  </div>
</body>

</html>