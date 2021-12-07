<?php
require_once './php/fetchers/EmployeesFetcher.php';
require_once 'PresentersUtils.php';

function PresentDashboardCurrentlyWorkingEmployees($connection)
{
  $result = GetCurrentlyWorkingEmployees($connection);
}

function PresentDashboardEmployeesBlock($connection)
{
  $result = GetCurrentlyWorkingEmployees($connection);

  while ($paragraph = mysqli_fetch_array($result)) {
    echo '
    <p>
      <i class="material-icons">face</i>
      ' . $paragraph["name"] . ' ' . $paragraph["surname"] . ':
      <span class="card-content-value text-white--shade ff-roboto fs-300">' . $paragraph["job_position"] . '</span>
    </p>';
  }
}
