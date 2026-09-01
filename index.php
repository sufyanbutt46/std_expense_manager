<?php

include "data.php";
include "functions.php";

$total = calculateTotal($expenses);
$remaining = calculateRemaining($budget, $total);
if ($total > $budget) {

    $warning = "Budget Exceeded!";

} elseif ($total >= $budget * 0.8) {

    $warning = "You have used 80% of your budget.";

} else {

    $warning = "Your spending is under control.";

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Expense Manager</title>

</head>

<body>

<div class="container">

    <h1 style="color: #06b41e;"> Student Expense & Budget Manager</h1>

    <div class="cards">

        <div class="card">
            <h3>Monthly Budget</h3>
            <p>Rs. <?php echo $budget; ?></p>
        </div>

        <div class="card">
            <h3>Total Expenses</h3>
            <p>Rs. <?php echo $total; ?></p>
        </div>

        <div class="card">
            <h3>Remaining</h3>
            <p>Rs. <?php echo $remaining; ?></p>
        </div>
        <h2><?php echo $warning; ?></h2>

    </div>

    <div class="buttons">

        <a href="add_expense.php">
            <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add Expense</button>
        </a>

        <a href="expenses.php">
            <button style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; cursor: pointer;">View Expenses</button>
        </a>

    </div>

</div>

</body>

</html>