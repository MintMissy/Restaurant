<?php
function GetIngriedientsList($connection)
{
    $sqlIngriedientsList = "SELECT * FROM storage";
    return mysqli_query($connection, $sqlIngriedientsList);
}

function GetIngredientsNearlyDepleted($connection)
{
    $sqlIngredientsNearDepleted = "";
    return;
}

function GetIngredientsMissing($connection)
{
    $sqlIngredientsMissing = "";
    return;
}
