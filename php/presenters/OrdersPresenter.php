<?php
require_once './php/fetchers/OrdersFetcher.php';
require_once './php/Utils/NumberUtils.php';
require_once 'PresentersUtils.php';

function PresentPendingOrdersAmount($connection)
{
  $result = GetPendingOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentShippedOrdersAmount($connection)
{
  $result = GetShippedOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentRealizedOrdersAmount($connection)
{
  $result = GetRealizedOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentLastPurchaseDate($connection)
{
  $result = GetLastPurchaseDate($connection);
  PresentSingleMysqliRecord($result);
}

function PresentBusiestLocation($connection)
{
  $result = GetBusiestLocation($connection);
  PresentSingleMysqliRecord($result);
}

function PresentLastSoldMeal($connection)
{
  $result = GetLastSoldMeal($connection);
  PresentSingleMysqliRecord($result);
}

function PresentBusiestWeekDay($connection)
{
  $result = GetBusiestWeekDay($connection);
  echo $result;
}

function PresentQuietestWeekDay($connection)
{
  $result = GetQuietestWeekDay($connection);
  echo $result;
}

function PresentToGoOrdersPercentage($connection)
{
  $result = GetPercentageOfTypeOfOrder($connection, "To go");
  $toGoOrdersPercentage = mysqli_fetch_array($result)[0];

  echo GetNumberPercentageAsStr($toGoOrdersPercentage);
}

function PresentStationaryOrdersPercentage($connection)
{
  $result = GetPercentageOfTypeOfOrder($connection, "Stationary");
  $stationaryOrdersPercentage = mysqli_fetch_array($result)[0];

  echo GetNumberPercentageAsStr($stationaryOrdersPercentage);
}

function PresentAverageDeliveryTime($connection)
{
  $result = GetAverageDeliveryTime($connection);
  $averageDeliveryTime = mysqli_fetch_array($result)[0];

  echo GetMinutesAndSecondFromNumber($averageDeliveryTime);
}

function PresentAveragePreparationTime($connection, $orderType = "general")
{
  $result = GetAveragePreparationTime($connection, $orderType);
  $averagePreparationTime = mysqli_fetch_array($result)[0];

  echo GetMinutesAndSecondFromNumber($averagePreparationTime);
}

function PresentLastMonthOrdersAmount($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $monthAgoDate = date($dateFormat, strtotime("-4 week"));

  $result = GetOrdersAmountFromRange($connection, $currentDate, $monthAgoDate);
  PresentSingleMysqliRecord($result);
}

function PresentLastWeekOrderAmount($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $weekAgoDate = date($dateFormat, strtotime("-1 week"));

  $result = GetOrdersAmountFromRange($connection, $currentDate, $weekAgoDate);
  PresentSingleMysqliRecord($result);
}
