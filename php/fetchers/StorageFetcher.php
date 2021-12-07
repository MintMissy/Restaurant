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

function GetIngredientsMissing($connection)
{
    $sqlIngredientsMissing = "SELECT * FROM storage WHERE item_quantity = 0;";
    return mysqli_query($connection, $sqlIngredientsMissing);
}
