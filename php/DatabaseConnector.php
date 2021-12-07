<?php
function OpenConnection()
{
  $dbHost = "localhost";
  $dbUser = "restaurant_admin";
  $dbPassword = "EcHgM.-qtgi.@68B";
  $db = "restaurant";

  $connection = new mysqli($dbHost, $dbUser, $dbPassword, $db) or die("Connect failed: %s\n" . $connection->error);

  return $connection;
}

function CloseConnection($connection)
{
  $connection->close();
}
