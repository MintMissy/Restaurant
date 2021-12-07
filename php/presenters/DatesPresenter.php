<?php

function PresentDateRangeToPast($timeBehind, $dateFormat = 'd.m', $dateSeparator = ' - ')
{
  $currentDate = date($dateFormat, time());
  $pastDate = date($dateFormat, strtotime($timeBehind));
  echo $pastDate . $dateSeparator . $currentDate;
}
