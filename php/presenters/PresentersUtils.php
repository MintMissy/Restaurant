<?php
require_once './php/Utils/NumberUtils.php';

function PresentSingleMysqliRecord($mysqli_result, $displayFormat = "general")
{
  $record = mysqli_fetch_array($mysqli_result)[0];

  switch ($displayFormat) {
    case 'general':
      echo $record;
      break;
    case 'money':
      echo '$' . $record;
      break;
    default:
      echo $record;
      break;
  }
}

// Displays grossed price after calling.  
function PresentSingleMysqliGrossPrice($mysqli_result_net_price, $displayFormat = "general")
{
  $record = mysqli_fetch_array($mysqli_result_net_price)[0];
  $grossedPrice = GetGrossedPrice($record);

  switch ($displayFormat) {
    case 'general':
      echo $grossedPrice;
      break;
    case 'money':
      echo '$' . $grossedPrice;
      break;
    default:
      echo $grossedPrice;
      break;
  }
}
