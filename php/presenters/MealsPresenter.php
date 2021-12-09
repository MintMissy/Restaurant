<?php
require_once './php/utils/DateUtils.php';
require_once './php/fetchers/MealsFetcher.php';
require_once 'PresentersUtils.php';

function PresentLeastRevenueMeal($connection)
{
  $result = GetLeastBoughtMeal($connection);
  PresentSingleMysqliRecord($result);
}

function PresentMostRevenueMeal($connection)
{
  $result = GetMostRevenueMeal($connection);
  PresentSingleMysqliRecord($result);
}

function PresentLeastBoughtMeal($connection)
{
  $result = GetLeastBoughtMeal($connection);
  PresentSingleMysqliRecord($result);
}

function PresentMostlyBoughtMeal($connection)
{
  $result = GetMostlyBoughtMeal($connection);
  PresentSingleMysqliRecord($result);
}

function PresentFoodOfTheMonth($connection)
{
  global $mysqlDateFormat;

  $currentDate = date($mysqlDateFormat);
  $monthAgoDate = date($mysqlDateFormat, strtotime("-4 week"));

  $result = GetMostlyBoughtMealFromRange($connection, $currentDate, $monthAgoDate);
  PresentSingleMysqliRecord($result);
}

function PresentFoodOfTheWeek($connection)
{
  global $mysqlDateFormat;

  $currentDate = date($mysqlDateFormat);
  $weekAgoDate = date($mysqlDateFormat, strtotime("-1 week"));

  $result = GetMostlyBoughtMealFromRange($connection, $currentDate, $weekAgoDate);
  PresentSingleMysqliRecord($result);
}
