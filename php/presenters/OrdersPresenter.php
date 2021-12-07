<?php
require_once './php/fetchers/OrdersFetcher.php';
require_once 'PresentersUtils.php';

function PresentPendingOrdersAmount($connection)
{
  $result = GetPendingOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentShippedOrdersAmount($connection)
{
  $result = GetShippedOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentRealizedOrdersAmount($connection)
{
  $result = GetRealizedOrdersAmount($connection);
  PresentSingleMysqliRecord($result);
}
