<?php
function GetNetIncomeFromRange($connection, $currentDate, $previousDate)
{
    $sqlNetIncomeFromRange = "SELECT SUM(o.quantity * m.cost_net) AS net_income FROM orders o JOIN meals m ON m.id = o.meal_id WHERE o.order_date < '$currentDate' AND o.order_date > '$previousDate'";
    return mysqli_query($connection, $sqlNetIncomeFromRange);
}

function GetCurrentMonthNetIncome($connection)
{
    $dateFormat = "Y-m-d H:i:s";

    $currentDate = date($dateFormat);
    $monthAgoDate = date($dateFormat, strtotime("-4 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
}

function GetCurrentWeekNetIncome($connection)
{
    $dateFormat = "Y-m-d H:i:s";

    $currentDate = date($dateFormat);
    $previousWeekDate = date($dateFormat, strtotime("-1 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $previousWeekDate);
}

function GetCurrentMonthGrossIncome($connection)
{
    $dateFormat = "Y-m-d H:i:s";

    $currentDate = date($dateFormat);
    $monthAgoDate = date($dateFormat, strtotime("-4 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $monthAgoDate);
}

function GetCurrentWeekGrossIncome($connection)
{
    global $STANDARD_TAX_RATE;

    $dateFormat = "Y-m-d H:i:s";

    $currentDate = date($dateFormat);
    $previousWeekDate = date($dateFormat, strtotime("-1 week"));

    return GetNetIncomeFromRange($connection, $currentDate, $previousWeekDate);
}

function GetPreviousMonthNetIncome($connection)
{
    $dateFormat = "Y-m-d H:i:s";

    $previousMonthDate = date($dateFormat, strtotime("-4 week"));
    $twoMonthAgoDate = date($dateFormat, strtotime("-8 week"));

    return GetNetIncomeFromRange($connection, $previousMonthDate, $twoMonthAgoDate);
}

function GetPreviousWeekNetIncome($connection)
{
    $dateFormat = "Y-m-d H:i:s";

    $previousWeekDate = date($dateFormat, strtotime("-1 week"));
    $twoWeeksAgoDate = date($dateFormat, strtotime("-2 week"));

    return GetNetIncomeFromRange($connection, $previousWeekDate, $twoWeeksAgoDate);
}
