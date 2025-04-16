<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Operations</title>
</head>
<body>
    <h2>Arithmetic Calculator</h2>
    <form method="post">
        Enter First Number: <input type="number" name="num1" required><br><br>
        Enter Second Number: <input type="number" name="num2" required><br><br>
        Select Operation:
        <select name="operation">
            <option value="add">Addition (+)</option>
            <option value="sub">Subtraction (-)</option>
            <option value="mul">Multiplication (*)</option>
            <option value="div">Division (/)</option>
        </select><br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];
        $result = 0;

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                echo "<p>Result: $num1 + $num2 = $result</p>";
                break;
            case "sub":
                $result = $num1 - $num2;
                echo "<p>Result: $num1 - $num2 = $result</p>";
                break;
            case "mul":
                $result = $num1 * $num2;
                echo "<p>Result: $num1 * $num2 = $result</p>";
                break;
            case "div":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    echo "<p>Result: $num1 / $num2 = $result</p>";
                } else {
                    echo "<p>Division by zero is not allowed.</p>";
                }
                break;
        }
    }
    ?>
</body>
</html>
