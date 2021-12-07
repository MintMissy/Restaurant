<?php
function PresentSingleMysqliRecord($mysqli_result)
{
  $record = mysqli_fetch_array($mysqli_result)[0];
  echo $record;
}
