<?php
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
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $monthAgoDate = date($dateFormat, strtotime("-4 week"));

  $result = GetMostlyBoughtMealFromRange($connection, $currentDate, $monthAgoDate);
  PresentSingleMysqliRecord($result);
}

function PresentFoodOfTheWeek($connection)
{
  $dateFormat = "Y-m-d H:i:s";

  $currentDate = date($dateFormat);
  $weekAgoDate = date($dateFormat, strtotime("-1 week"));

  $result = GetMostlyBoughtMealFromRange($connection, $currentDate, $weekAgoDate);
  PresentSingleMysqliRecord($result);
}
