<?php
require_once './php/fetchers/StorageFetcher.php';
require_once 'PresentersUtils.php';

function PresentIngredientsNearlyDepletedAmount($connection)
{
  $result = GetIngredientsNearlyDepletedAmount($connection);
  PresentSingleMysqliRecord($result);
}

function PresentIngredientsMissingAmount($connection)
{
  $result = GetIngredientsMissingAmount($connection);
  PresentSingleMysqliRecord($result);
}
