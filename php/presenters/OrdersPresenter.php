<?php
require_once './php/fetchers/OrdersFetcher.php';
require_once 'PresentersUtils.php';
require_once "./php/Utils/DateUtils.php";

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
