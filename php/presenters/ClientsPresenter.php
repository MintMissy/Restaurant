<?php
require_once './php/fetchers/ClientsFetcher.php';
require_once 'PresentersUtils.php';

function PresentMostLavishClient($connection)
{
  $result = GetMostLavishClient($connection);
  PresentSingleMysqliRecord($result);
}

function PresentRestaurantMostLoyalClient($connection)
{
  $result = GetRestaurantMostLoyalClient($connection);
  PresentSingleMysqliRecord($result);
}
