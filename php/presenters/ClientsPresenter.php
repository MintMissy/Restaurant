<?php
require_once './php/fetchers/ClientsFetcher.php';
require_once 'PresentersUtils.php';

function PresentMostLavishClient($connection)
{
  $result = GetMostLavishClient($connection);
  PresentSingleMysqliRecord($result);
}

function PresentRestaurantBestClient($connection)
{
  $result = GetRestaurantBestClient($connection);
  PresentSingleMysqliRecord($result);
}
