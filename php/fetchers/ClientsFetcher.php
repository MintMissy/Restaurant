<?php

function GetMostLavishClient($connection)
{
    $sqlMostLavishClient = "SELECT CONCAT(c.name, ' ', c.surname) AS best_client, SUM(m.cost_net) AS spent_money FROM orders o JOIN clients c ON c.id = o.client_id JOIN meals m ON m.id = o.meal_id GROUP BY c.id ORDER BY spent_money DESC LIMIT 1";
    return mysqli_query($connection, $sqlMostLavishClient);
}

// Get client name and surname who made the biggest number of orders
// Returns [client, orderedMeals]
function GetRestaurantMostLoyalClient($connection)
{
    $sqlRestaurantBestClient = "SELECT CONCAT(c.name, ' ', c.surname) AS best_client, COUNT(o.id) AS orders_amount FROM orders o JOIN clients c ON c.id = o.client_id GROUP BY c.id ORDER BY orders_amount DESC LIMIT 1";
    return mysqli_query($connection, $sqlRestaurantBestClient);
}
