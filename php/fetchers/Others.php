<?php
function GetBusiestLocation($connection)
{
    $sqlBusiestLocation = "SELECT delivery_postcode, COUNT(id) AS orders_amount FROM orders GROUP BY delivery_postcode ORDER BY orders_amount DESC LIMIT 1";
    return mysqli_query($connection, $sqlBusiestLocation)[0];
}
