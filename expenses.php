<?php

include "data.php";
include "functions.php";
 
$category = "";

if (isset($_GET["category"])) {
    $category = $_GET["category"];
} 

$search = "";

if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

$total = calculateTotal($expenses);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Expenses</title>

</head>

<body>
    <form method="GET">

    <input
        type="text"
        name="search"
        placeholder="Search expense"
    >

    <button type="submit">
        Search
    </button>

</form>
<form method="GET">

    <select name="category">

        <option value="">All Categories</option>

        <option value="Food">Food</option>

        <option value="Transport">Transport</option>

        <option value="Education">Education</option>

        <option value="Entertainment">Entertainment</option>

    </select>

    <button type="submit">Filter</button>

</form>

<div class="container">

    <h1>All Expenses</h1>

    <table border="1" width="100%">
      
        <tr>
             <th>Action</th> 
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Category</th>

        </tr>

        <?php foreach ($expenses as $expense): ?>

<?php

if (
    $search == "" ||
    preg_match("/" . preg_quote($search, "/") . "/i", $expense["name"])
):

?>

<tr>
    
         <td>

    <a href="delete_expense.php?id=<?php echo $expense['id']; ?>">
        Delete
    </a>

</td>
            <td>
                <?php echo $expense["id"]; ?>
            </td>

            <td>
                <?php echo $expense["name"]; ?>
            </td>

            <td>
                Rs. <?php echo $expense["amount"]; ?>
            </td>

            <td>
                <?php echo getCategoryMessage($expense["category"]); ?>
            </td>

        </tr>
        <?php endif; ?>

        <?php endforeach; ?>

    </table>

    <h2>
        Total: Rs. <?php echo $total; ?>
    </h2>

</div>

</body>

</html>