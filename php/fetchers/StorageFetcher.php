<?php
function GetIngredientsList($connection)
{
    $sqlIngredientsList = "SELECT * FROM storage";
    return mysqli_query($connection, $sqlIngredientsList);
}

function GetIngredientsNearlyDepleted($connection)
{
    $sqlIngredientsNearDepleted = "SELECT * FROM storage WHERE (item_quantity < recommended_quantity) AND item_quantity <> 0;";
    return mysqli_query($connection, $sqlIngredientsNearDepleted);
}

function GetIngredientsNearlyDepletedAmount($connection)
{
    $sqlIngredientsNearDepletedAmount = "SELECT COUNT(*) FROM storage WHERE (item_quantity < recommended_quantity) AND item_quantity <> 0;";
    return mysqli_query($connection, $sqlIngredientsNearDepletedAmount);
}

function GetIngredientsMissing($connection)
{
    $sqlIngredientsMissing = "SELECT * FROM storage WHERE item_quantity = 0;";
    return mysqli_query($connection, $sqlIngredientsMissing);
}

function GetIngredientsMissingAmount($connection)
{
    $sqlIngredientsMissingAmount = "SELECT COUNT(*) FROM storage WHERE item_quantity = 0;";
    return mysqli_query($connection, $sqlIngredientsMissingAmount);
}
