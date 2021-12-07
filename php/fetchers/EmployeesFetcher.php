<?php
function GetCurrentlyWorkingEmployees($connection)
{
    // ANCHOR Replace with real hour
    $currentHour = "10:45:12";
    $sqlCurrentlyWorkingEmployees = "SELECT * FROM employees WHERE shift_start < '$currentHour' AND '$currentHour' < shift_end ORDER BY job_position, name";
    return mysqli_query($connection, $sqlCurrentlyWorkingEmployees);
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
