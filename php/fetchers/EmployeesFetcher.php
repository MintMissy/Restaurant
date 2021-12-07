<?php
function GetCurrentlyWorkingEmployees($connection)
{
    $sqlCurrentlyWorkingEmployees = "";
    return;
}

function GetEmployeesOnVacation($connection)
{
    $sqlEmployeesOnVacation = "";
    return;
}

function GetEmployeesAfterWork($connection)
{
    $sqlEmployeesAfterWork = "";
    return;
}

function GetEmployeesWithLessLeftDaysOff($connection, $leftDaysOffAmount)
{
    $sqlEmployeesWithLessDaysOff = "SELECT * FROM `clients` WHERE left_days_off < $leftDaysOffAmount";
    return mysqli_query($connection, $sqlEmployeesWithLessDaysOff);
}

function GetEmployeesWithMoreLeftDaysOff($connection, $leftDaysOffAmount)
{
    $sqlEmployeesWithMoreLeftDaysOff = "SELECT * FROM `clients` WHERE left_days_off > $leftDaysOffAmount";
    return mysqli_query($connection, $sqlEmployeesWithMoreLeftDaysOff);
}
