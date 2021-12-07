<?php
function GetPendingOrders($connection)
{
    $sqlPendingOrders = "";
    return;
}

function GetPendingOrdersAmount($connection)
{
    return;
}


// Get shipped but not realized orders
function GetShippedOrders($connection)
{
    $sqlShippedOrders = "";
    return;
}

function GetShippedOrdersAmount($connection)
{
    return;
}

function GetRealizedOrders($connection)
{
    $sqlRealizedOrders = "SELECT * FROM `orders` WHERE pickup_date <> 0000-00-00 00:00:00";
    return mysqli_query($connection, $sqlRealizedOrders);
}

function GetRealizedOrdersAmount($connection)
{
    $sqlRealizedOrdersAmount = "SELECT COUNT(id) FROM `orders` WHERE pickup_date <> 0000-00-00 00:00:00";
    return mysqli_query($connection, $sqlRealizedOrdersAmount);
}

function GetAverageDeliveryTime($connection)
{
    $sqlAverageDeliveryTime = "";
    return;
}

function GetAveragePreparationTime($connection)
{
    $sqlAveragePreparationTime = "";
    return;
}

function GetLastPurchaseDate($connection)
{
    $sqlLastPurchaseDate = "";
    return;
}

function GetLastSoldMeal($connection)
{
    $sqlLastSoldMeal = "";
    return;
}

function GetPercentageOfStationaryOrders($connection)
{
    $sqlGetPercentageOfStationaryOrders = "";
    return;
}

function GetPercentageOfToGoOrders($connection)
{
    $sqlGetPercentageOfToGoOrders = "";
    return;
}
