<?php

function calculateTotal($expenses)
{
    $total = 0;

    foreach ($expenses as $expense) {
        $total += $expense["amount"];
    }

    return $total;
}


function calculateRemaining($budget, $total)
{
    return $budget - $total;
}


function getCategoryMessage($category)
{
    switch ($category) {

        case "Food":
            return "Food Expense";

        case "Transport":
            return "Transport Expense";

        case "Education":
            return "Education Expense";

        case "Entertainment":
            return "Entertainment Expense";

        default:
            return "Other Expense";
    }
}

?>