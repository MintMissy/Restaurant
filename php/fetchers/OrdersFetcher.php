<?php
require_once "./php/utils/DateUtils.php";

function GetOrdersAmountFromRange($connection, $currentDate, $previousDate)
{
    $sqlOrdersAmountFromRange = "SELECT COUNT(*) AS 'orders_amount' FROM orders WHERE order_date BETWEEN '$previousDate' AND '$currentDate'";
    return mysqli_query($connection, $sqlOrdersAmountFromRange);
}

function GetPendingOrders($connection)
{
    $sqlPendingOrders = "SELECT o.id, CONCAT(c.name, ' ', c.surname) AS 'client', m.name AS 'meal', o.quantity, o.delivery_place, o.delivery_postcode, o.order_date, o.shipment_date, o.pickup_date, o.order_type FROM orders o JOIN clients c on o.client_id = c.id JOIN meals m on o.meal_id = m.id WHERE ( o.pickup_date = '0000-00-00 00:00:00' AND o.order_type = 'Stationary' ) OR ( o.shipment_date = '0000-00-00 00:00:00' AND o.order_type = 'To go' ) ORDER BY o.order_date DESC";
    return mysqli_query($connection, $sqlPendingOrders);
}

function GetPendingOrdersAmount($connection)
{
    $sqlPendingOrdersAmount = "SELECT count(id) FROM orders WHERE ( pickup_date = '0000-00-00 00:00:00' AND order_type = 'Stationary' ) OR ( shipment_date = '0000-00-00 00:00:00' AND order_type = 'To go')";
    return mysqli_query($connection, $sqlPendingOrdersAmount);;
}

// Get shipped but not realized orders
function GetShippedOrders($connection)
{
    $sqlShippedOrders = "SELECT o.id, CONCAT(c.name, ' ', c.surname) AS 'client', m.name AS 'meal', o.quantity, o.delivery_place, o.delivery_postcode, o.order_date, o.shipment_date, o.pickup_date, o.order_type FROM orders o JOIN clients c on o.client_id = c.id JOIN meals m on o.meal_id = m.id WHERE o.shipment_date <> '0000-00-00 00:00:00' AND o.pickup_date = '0000-00-00 00:00:00' AND o.order_type = 'To go' ORDER BY o.shipment_date DESC";
    return mysqli_query($connection, $sqlShippedOrders);
}

function GetShippedOrdersAmount($connection)
{
    $sqlShippedOrdersAmount = "SELECT COUNT(*) FROM orders WHERE shipment_date <> '0000-00-00 00:00:00' AND pickup_date = '0000-00-00 00:00:00' AND order_type = 'To go'";
    return mysqli_query($connection, $sqlShippedOrdersAmount);
}

function GetRealizedOrders($connection, $limit)
{
    $sqlRealizedOrders = "SELECT o.id, CONCAT(c.name, ' ', c.surname) AS 'client', m.name AS 'meal', o.quantity, o.delivery_place, o.delivery_postcode, o.order_date, o.shipment_date, o.pickup_date, o.order_type FROM orders o JOIN clients c on o.client_id = c.id JOIN meals m on o.meal_id = m.id WHERE o.pickup_date <> '0000-00-00 00:00:00' ORDER BY o.order_date DESC LIMIT $limit";
    return mysqli_query($connection, $sqlRealizedOrders);
}

function GetRealizedOrdersAmount($connection)
{
    $sqlRealizedOrdersAmount = "SELECT COUNT(id) FROM `orders` WHERE pickup_date <> '0000-00-00 00:00:00'";
    return mysqli_query($connection, $sqlRealizedOrdersAmount);
}

// General, To go, Stationary returns avg time in minutes
function GetAveragePreparationTime($connection, $option = "general")
{
    switch ($option) {
        case "general":
            $sqlAveragePreparationTime = "SELECT AVG(t.time_diff) FROM ( SELECT TIMEDIFF(o1.pickup_date, o1.order_date) AS time_diff FROM orders o1 WHERE o1.order_type = 'Stationary' AND o1.order_date <> '0000-00-00 00:00:00' AND o1.pickup_date <> '0000-00-00 00:00:00' UNION ALL SELECT TIMEDIFF(o2.shipment_date, o2.order_date) AS time_diff FROM orders o2 WHERE o2.order_type = 'To go' AND o2.order_date <> '0000-00-00 00:00:00' AND o2.shipment_date <> '0000-00-00 00:00:00' ) t";
            return mysqli_query($connection, $sqlAveragePreparationTime);
        case "To go":
            $sqlAveragePreparationTime = "SELECT AVG(TIMEDIFF(shipment_date, order_date)) FROM orders WHERE order_type = 'To go' AND order_date <> '0000-00-00 00:00:00' AND shipment_date <> '0000-00-00 00:00:00'";
            return mysqli_query($connection, $sqlAveragePreparationTime);
        case "Stationary":
            $sqlAveragePreparationTime = "SELECT AVG(TIMEDIFF(pickup_date, order_date)) FROM orders WHERE order_type = 'Stationary' AND order_date <> '0000-00-00 00:00:00' AND pickup_date <> '0000-00-00 00:00:00'";
            return mysqli_query($connection, $sqlAveragePreparationTime);
        default:
            throw new Exception("Given average preparation time option doesn't exist", 1);
    }
}

function GetAverageDeliveryTime($connection)
{
    $sqlAverageDeliveryTime = "SELECT AVG(TIMEDIFF(pickup_date, shipment_date)) FROM orders WHERE order_type = 'To go' AND shipment_date <> '0000-00-00 00:00:00' AND pickup_date <> '0000-00-00 00:00:00'";
    return mysqli_query($connection, $sqlAverageDeliveryTime);
}

function GetLastPurchaseDate($connection)
{
    $sqlLastPurchaseDate = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d %H:%i:%S') FROM orders ORDER BY order_date DESC LIMIT 1";
    return mysqli_query($connection, $sqlLastPurchaseDate);
}

function GetLastSoldMeal($connection)
{
    $sqlLastSoldMeal = "SELECT m.name FROM orders o JOIN meals m ON m.id = o.meal_id ORDER BY order_date DESC LIMIT 1";
    return mysqli_query($connection, $sqlLastSoldMeal);
}

function GetPercentageOfTypeOfOrder($connection, $order_type)
{
    switch ($order_type) {
        case "To go":
            $sqlGetPercentageOfTypeOfOrder = "SELECT COUNT(*) / ( SELECT COUNT(*) FROM orders ) * 100 FROM orders o1 WHERE o1.order_type = 'To go';";
            return mysqli_query($connection, $sqlGetPercentageOfTypeOfOrder);
        case "Stationary":
            $sqlGetPercentageOfTypeOfOrder = "SELECT COUNT(*) / ( SELECT COUNT(*) FROM orders ) * 100 FROM orders o1 WHERE o1.order_type = 'Stationary';";
            return mysqli_query($connection, $sqlGetPercentageOfTypeOfOrder);
        default:
            throw new Exception("Given order type option doesn't exist", 1);
    }
}

function GetBusiestLocation($connection)
{
    $sqlBusiestLocation = "SELECT o.delivery_postcode FROM orders o JOIN ( SELECT delivery_postcode, COUNT(*) AS ctn FROM orders GROUP BY delivery_postcode ) o2 ON (o.delivery_postcode = o2.delivery_postcode) GROUP BY delivery_postcode ORDER BY o2.ctn DESC LIMIT 1";
    return mysqli_query($connection, $sqlBusiestLocation);
}

function GetBusiestWeekDay($connection)
{
    $sqlBusiestDay = "SELECT WEEKDAY(order_date) FROM orders group by WEEKDAY(ORDER_DATE) ORDER BY count(order_date) DESC LIMIT 1";
    $result = mysqli_query($connection, $sqlBusiestDay);
    $busiestDayAsNumber = mysqli_fetch_array($result)[0];
    $busiestDay = ConvertIntToWeekDay($busiestDayAsNumber);
    return $busiestDay;
}

function GetQuietestWeekDay($connection)
{
    $sqlQuietestDay = "SELECT WEEKDAY(order_date) FROM orders group by WEEKDAY(ORDER_DATE) ORDER BY count(order_date) LIMIT 1";
    $result = mysqli_query($connection, $sqlQuietestDay);
    $quietestDayAsNumber = mysqli_fetch_array($result)[0];
    $quietestDay = ConvertIntToWeekDay($quietestDayAsNumber);
    return $quietestDay;
}

// Returns array of [weekDayAsInt, orderAmount]
function GetOrderAmountByDay($connection)
{
    $sqlOrderAmountByDay = "SELECT WEEKDAY(order_date) AS busiest_day, COUNT(*) AS orders_amount FROM `orders` GROUP BY busiest_day ORDER BY orders_amount DESC LIMIT 1";
    return mysqli_query($connection, $sqlOrderAmountByDay);
}
