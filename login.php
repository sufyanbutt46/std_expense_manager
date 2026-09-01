<?php
session_start();

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }

    if (!empty($_POST["website"])) {
        $website = test_input($_POST["website"]);
    }

    if (!empty($_POST["comment"])) {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $isValid = false;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if ($isValid) {
        $_SESSION["user_name"] = $name;
        $_SESSION["user_email"] = $email;

        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error { color: #FF0000; }
</style>
</head>
<body>

<h2>PHP Form Validation Example</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name:
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>

    E-mail:
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    Comment:
    <textarea name="comment" rows="5" cols="40"><?php echo htmlspecialchars($comment); ?></textarea>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>>Female
    <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="other" <?php if ($gender == "other") echo "checked"; ?>>Other
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>