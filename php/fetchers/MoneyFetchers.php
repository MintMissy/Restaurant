<?php
require_once './php/utils/DateUtils.php';

function GetNetIncomeFromRange($connection, $currentDate, $previousDate)
{
    $sqlNetIncomeFromRange = "SELECT SUM(o.quantity * m.cost_net) AS net_income FROM orders o JOIN meals m ON m.id = o.meal_id WHERE o.order_date < '$currentDate' AND o.order_date > '$previousDate'";
    return mysqli_query($connection, $sqlNetIncomeFromRange);
}

function GetCurrentMonthNetIncome($connection)
{
    global $mysqlDateFormat;

    $currentDate = date($mysqlDateFormat);
    $monthAgoDate = date($mysqlDateFormat, strtotime("-4 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
}

function GetCurrentWeekNetIncome($connection)
{
    global $mysqlDateFormat;

    $currentDate = date($mysqlDateFormat);
    $previousWeekDate = date($mysqlDateFormat, strtotime("-1 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $previousWeekDate);
}

function GetCurrentMonthGrossIncome($connection)
{
    global $mysqlDateFormat;

    $currentDate = date($mysqlDateFormat);
    $monthAgoDate = date($mysqlDateFormat, strtotime("-4 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
}

function GetCurrentWeekGrossIncome($connection)
{
    global $mysqlDateFormat;

    $currentDate = date($mysqlDateFormat);
    $previousWeekDate = date($mysqlDateFormat, strtotime("-1 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $previousWeekDate);
}

function GetPreviousMonthNetIncome($connection)
{
    global $mysqlDateFormat;

    $previousMonthDate = date($mysqlDateFormat, strtotime("-4 week"));
    $twoMonthAgoDate = date($mysqlDateFormat, strtotime("-8 week"));

    return GetNetIncomeFromRange($connection, $previousMonthDate, $twoMonthAgoDate);
}

function GetPreviousWeekNetIncome($connection)
{
    global $mysqlDateFormat;

    $previousWeekDate = date($mysqlDateFormat, strtotime("-1 week"));
    $twoWeeksAgoDate = date($mysqlDateFormat, strtotime("-2 week"));

    return GetNetIncomeFromRange($connection, $previousWeekDate, $twoWeeksAgoDate);
}
