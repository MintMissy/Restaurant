<?php
$mysqlDateFormat = "Y-m-d H:i:s";

function ConvertIntToWeekDay($weekDay)
{
  switch ($weekDay) {
    case 0:
      return "Monday";
    case 1:
      return "Tuesday";
    case 2:
      return "Wednesday";
    case 3:
      return "Thursday";
    case 4:
      return "Friday";
    case 5:
      return "Saturday";
    case 6:
      return "Sunday";
    default:
      throw new Exception("Error given int is higher than 6, cannot convert number to day", 1);
  }
}
