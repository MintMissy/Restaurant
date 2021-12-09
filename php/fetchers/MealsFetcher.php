<?php
function GetMostlyBoughtMealFromRange($connection, $currentDate, $previousDate)
{
    $sqlMostlyBoughMealFromTimeRange = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id WHERE o.order_date > '$previousDate' AND o.order_date < '$currentDate' GROUP BY m.id ORDER BY SUM(o.quantity) DESC LIMIT 1";
    return mysqli_query($connection, $sqlMostlyBoughMealFromTimeRange);
}

function GetLeastRevenueMeal($connection)
{
    $sqlLeastRevenueMeal = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id WHERE 1 GROUP BY m.id ORDER BY SUM(o.quantity * m.cost_net) LIMIT 1";
    return mysqli_query($connection, $sqlLeastRevenueMeal);
}

function GetMostRevenueMeal($connection)
{
    $sqlMostRevenueMeal = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id WHERE 1 GROUP BY m.id ORDER BY SUM(o.quantity * m.cost_net) DESC LIMIT 1";
    return mysqli_query($connection, $sqlMostRevenueMeal);
}

function GetLeastBoughtMeal($connection)
{
    $sqlLeastBoughtMeal = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id WHERE 1 GROUP BY m.id ORDER BY SUM(o.quantity) LIMIT 1";
    return mysqli_query($connection, $sqlLeastBoughtMeal);
}

function GetMostlyBoughtMeal($connection)
{
    $sqlMostBoughtMeal = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id WHERE 1 GROUP BY m.id ORDER BY SUM(o.quantity) DESC LIMIT 1";
    return mysqli_query($connection, $sqlMostBoughtMeal);
}
