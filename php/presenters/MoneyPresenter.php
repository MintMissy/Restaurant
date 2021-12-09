<?php
require_once './php/fetchers/MoneyFetchers.php';
require_once 'PresentersUtils.php';

function PresentCurrentMonthNetIncome($connection)
{
  $result = GetCurrentMonthNetIncome($connection);
  PresentSingleMysqliRecord($result, 'money');
}

function PresentCurrentWeekNetIncome($connection)
{
  $result = GetCurrentWeekNetIncome($connection);
  PresentSingleMysqliRecord($result, 'money');
}

function PresentCurrentMonthGrossIncome($connection)
{
  $result = GetCurrentMonthGrossIncome($connection);
  PresentSingleMysqliGrossPrice($result, 'money');
}

function PresentCurrentWeekGrossIncome($connection)
{
  $result = GetCurrentWeekGrossIncome($connection);
  PresentSingleMysqliGrossPrice($result, 'money');
}

function PresentPreviousMonthNetIncome($connection)
{
  $result = GetPreviousMonthNetIncome($connection);
  PresentSingleMysqliRecord($result, 'money');
}

function PresentPreviousWeekNetIncome($connection)
{
  $result = GetPreviousWeekNetIncome($connection);
  PresentSingleMysqliRecord($result, 'money');
}

function PresentLastWeekNetIncomeProportion($connection)
{
  # code...
}
