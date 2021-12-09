<?php
require_once './php/Utils/NumberUtils.php';

function PresentSingleMysqliRecord($mysqliResult, $displayFormat = "general")
{
  $record = mysqli_fetch_array($mysqliResult)[0];

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
function PresentSingleMysqliGrossPrice($mysqliResultNetPrice, $displayFormat = "general")
{
  $record = mysqli_fetch_array($mysqliResultNetPrice)[0];
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

function PresentSingleMysqliProportion($first_mysqli_result, $second_mysqli_result, $displayFormat = "general")
{
  $firstNumber = mysqli_fetch_array($first_mysqli_result)[0];
  $secondNumber = mysqli_fetch_array($second_mysqli_result)[0];

  $proportion = GetProportion($firstNumber, $secondNumber);

  switch ($displayFormat) {
    case 'general':
      echo $proportion;
      break;
    case 'rounded percentage':
      echo round($proportion * 100, 2) . '%';
      break;
    default:
      echo $proportion;
      break;
  }
}
