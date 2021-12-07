<?php
function GetBusiestLocation($connection)
{
    $sqlBusiestLocation = "SELECT o.delivery_postcode FROM orders o JOIN ( SELECT delivery_postcode, COUNT(*) AS ctn FROM orders GROUP BY delivery_postcode ) o2 ON (o.delivery_postcode = o2.delivery_postcode) GROUP BY delivery_postcode ORDER BY o2.ctn DESC LIMIT 1";
    return mysqli_query($connection, $sqlBusiestLocation);
}
