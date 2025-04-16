<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h2>Factorial Calculator</h2>
    
    <form method="post">
        Enter a number: <input type="number" name="number" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["number"];
        $factorial = 1;

        if ($num < 0) {
            echo "<p>Factorial is not defined for negative numbers.</p>";
        } else {
            for ($i = 1; $i <= $num; $i++) {
                $factorial *= $i;
            }
            echo "<p>Factorial of $num is: <strong>$factorial</strong></p>";
        }
    }
    ?>
</body>
</html>
