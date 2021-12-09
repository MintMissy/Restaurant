<?php
require_once './php/fetchers/MoneyFetchers.php';
require_once 'PresentersUtils.php';
require_once './php/Utils/NumberUtils.php';

function PresentCurrentMonthNetIncome($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $monthAgoDate = date($dateFormat, strtotime("-4 week"));

  $result = GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
  $record = mysqli_fetch_array($result)[0];
  echo "$" . $record;
}

function PresentCurrentWeekNetIncome($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $weekAgoDate = date($dateFormat, strtotime("-1 week"));

  $result = GetNetIncomeFromRange($connection, $currentDate, $weekAgoDate);
  $record = mysqli_fetch_array($result)[0];
  echo "$" . $record;
}

function PresentCurrentMonthGrossIncome($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $monthAgoDate = date($dateFormat, strtotime("-4 week"));

  $result = GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
  $record = mysqli_fetch_array($result)[0];
  echo "$" . GetGrossedPrice($record);
}

function PresentCurrentWeekGrossIncome($connection)
{
  global $STANDARD_TAX_RATE;

  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $weekAgoDate = date($dateFormat, strtotime("-1 week"));

  $result = GetNetIncomeFromRange($connection, $currentDate, $weekAgoDate);
  $record = mysqli_fetch_array($result)[0];
  echo "$" . GetGrossedPrice($record);
}
