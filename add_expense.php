<?php

include "data.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $amount = $_POST["amount"];
    $category = $_POST["category"];

    if ($name == "") {

        $message = "Expense name is required.";

    } elseif ($amount <= 0) {

        $message = "Amount must be greater than 0.";

    } else {

        $message = "Expense added successfully.";

    }
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Expense</title>

</head>

<body>

<div class="container">

    <h1>Add Expense</h1>

    <form method="POST">

        <label>Expense Name</label>
        <br>

        <input type="text" name="name">

        <br><br>

        <label>Amount</label>
        <br>

        <input type="number" name="amount">

        <br><br>

        <label>Category</label>
        <br>

        <select name="category">

            <option value="Food">Food</option>

            <option value="Transport">
                Transport
            </option>

            <option value="Education">
                Education
            </option>

            <option value="Entertainment">
                Entertainment
            </option>

            <option value="Other">
                Other
            </option>

        </select>

        <br><br>

        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Add Expense
        </button>

    </form>

</div>

</body>

</html>