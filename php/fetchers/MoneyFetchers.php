<?php
function GetNetIncomeFromRange($connection, $currentDate, $previousDate)
{
    $sqlNetIncomeFromRange = "SELECT SUM(o.quantity * m.cost_net) AS net_income FROM orders o JOIN meals m ON m.id = o.meal_id WHERE o.order_date < '$currentDate' AND o.order_date > '$previousDate'";
    return mysqli_query($connection, $sqlNetIncomeFromRange);
}
