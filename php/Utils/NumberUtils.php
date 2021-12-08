<?php

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
