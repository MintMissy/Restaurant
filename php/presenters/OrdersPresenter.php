<?php
require_once './php/utils/DateUtils.php';
require_once './php/utils/NumberUtils.php';
require_once './php/fetchers/OrdersFetcher.php';
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
  global $mysqlDateFormat;

  $currentDate = date($mysqlDateFormat);
  $monthAgoDate = date($mysqlDateFormat, strtotime("-4 week"));

  $result = GetOrdersAmountFromRange($connection, $currentDate, $monthAgoDate);
  PresentSingleMysqliRecord($result);
}

function PresentLastWeekOrderAmount($connection)
{
  global $mysqlDateFormat;

  $currentDate = date($mysqlDateFormat);
  $weekAgoDate = date($mysqlDateFormat, strtotime("-1 week"));

  $result = GetOrdersAmountFromRange($connection, $currentDate, $weekAgoDate);
  PresentSingleMysqliRecord($result);
}

function PresentOrdersPendingBlock($connection)
{
  $result = GetPendingOrders($connection);
  GenerateOrdersBlock($result);
}

function PresentOrdersShippedBlock($connection)
{
  $result = GetShippedOrders($connection);
  GenerateOrdersBlock($result);
}

function PresentOrdersRealizedBlock($connection, $recordLimit)
{
  $result = GetRealizedOrders($connection, $recordLimit);
  GenerateOrdersBlock($result);
}

function ConvertSpaceToNewLine($string)
{
  return str_replace(' ', '<br/>', $string);
}

function GetFormattedCellDate($date)
{
  if ($date == '0000-00-00 00:00:00') {
    return '';
  }
  return ConvertSpaceToNewLine($date);
}

function GetFormattedDeliveryPlace($deliveryPlace)
{
  $secondCommaPosition = 0;
  $commaCounter = 0;

  // Get second comma position
  for ($i = 0; $i < strlen($deliveryPlace); $i++) {
    if ($deliveryPlace[$i] != ',') {
      continue;
    }

    if ($commaCounter == 1) {
      $secondCommaPosition = $i;
      break;
    }
    $commaCounter++;
  }

  $mainLocation = substr($deliveryPlace, 0, $secondCommaPosition);
  $streetAddress = substr($deliveryPlace, $secondCommaPosition + 1, strlen($deliveryPlace));
  return $mainLocation . '<br/>' . $streetAddress;
}

function GenerateOrdersBlock($result)
{
  while ($row = mysqli_fetch_array($result)) {
    echo "
    <tr>
      <td>" . $row['id'] . "</td>
      <td>" . ConvertSpaceToNewLine($row['client']) . "</td>
      <td>" . $row['meal'] . "</td>
      <td>" . $row['quantity'] . "</td>
      <td>" . GetFormattedDeliveryPlace($row['delivery_place']) . "</td>
      <td>" . $row['delivery_postcode'] . "</td>
      <td>" . GetFormattedCellDate($row['order_date']) . "</td>
      <td>" . GetFormattedCellDate($row['shipment_date']) . "</td>
      <td>" . GetFormattedCellDate($row['pickup_date']) . "</td>
      <td>" . $row['order_type'] . "</td>
    <tr/>
    ";
  }
}
