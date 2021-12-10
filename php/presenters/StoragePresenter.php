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

function PresentIngredientsAllBlock($connection)
{
  $result = GetIngredientsList($connection);
  GenerateIngredientsBlock($result);
}

function PresentIngredientsNearlyDepletedBlock($connection)
{
  $result = GetIngredientsNearlyDepleted($connection);
  GenerateIngredientsBlock($result);
}

function PresentIngredientsMissingBlock($connection)
{
  $result = GetIngredientsMissing($connection);
  GenerateIngredientsBlock($result);
}

function GenerateIngredientsBlock($result)
{
  while ($row = mysqli_fetch_array($result)) {
    echo "
    <tr>
      <td>" . $row['id'] . "</td>
      <td>" . $row['item_name'] . "</td>
      <td>" . $row['item_quantity'] . "</td>
      <td>" . $row['quantity_unit'] . "</td>
      <td>" . $row['recommended_quantity'] . "</td>
    <tr/>
    ";
  }
}
