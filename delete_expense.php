<?php

include "data.php";

// Check if ID was provided
if (isset($_GET["id"])) {

    $id = (int) $_GET["id"];

    $found = false;

    foreach ($expenses as $expense) {

        if ($expense["id"] == $id) {

            $found = true;

            echo "<h2>Expense Found</h2>";

            echo "Expense Name: " . $expense["name"] . "<br>";
            echo "Amount: Rs. " . $expense["amount"] . "<br>";
            echo "Category: " . $expense["category"] . "<br>";

            break;
        }
    }

    if (!$found) {
        echo "<h2>Expense not found!</h2>";
    }

} else {

    echo "<h2>No expense ID provided.</h2>";

}

?>

<br>

<a href="expenses.php">Back to Expenses</a>