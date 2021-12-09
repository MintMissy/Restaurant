<?php

$STANDARD_TAX_RATE = 0.20;

function GetNumberPercentageAsStr($number)
{
  $number = round($number, 2);
  return $number . "%";
}

function GetMinutesAndSecondFromNumber($number)
{
  $minutes = round($number / 60, 0);
  $seconds = round($number % 60, 0);
  return $minutes . "min " . $seconds . "s";
}

function GetGrossedPrice($price)
{
  global $STANDARD_TAX_RATE;
  return round($price * (1 - $STANDARD_TAX_RATE), 2);
}

function GetProportion($firstNumber, $secondNumber)
{
  return $firstNumber / $secondNumber;
}
