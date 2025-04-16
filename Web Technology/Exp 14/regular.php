<!DOCTYPE html>
<html>
<head>
    <title>Enhanced Form Validation</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<h2>User Registration Form</h2>

<form method="post">
    Username: <input type="text" name="username"><br><br>
    Date of Birth: <input type="date" name="dob"><br><br>
    Mobile Number: <input type="text" name="mobile"><br><br>
    Aadhar Number: <input type="text" name="aadhar"><br><br>
    Password: <input type="password" name="password"><br><br>
    PIN Code: <input type="text" name="pincode"><br><br>
    PAN Number: <input type="text" name="pan"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $aadhar = $_POST['aadhar'];
    $password = $_POST['password'];
    $pincode = $_POST['pincode'];
    $pan = $_POST['pan'];

    $errors = [];

    // Username (4-15 characters, letters, digits, _)
    if (!preg_match('/^[a-zA-Z0-9_]{4,15}$/', $username)) {
        $errors[] = "Invalid Username";
    }

    // DOB (age must be 18+)
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $age = $today->diff($birthDate)->y;
    if ($age < 18) {
        $errors[] = "You must be at least 18 years old.";
    }

    // Mobile
    if (!preg_match('/^[6-9]\d{9}$/', $mobile)) {
        $errors[] = "Invalid Mobile Number";
    }

    // Aadhar
    if (!preg_match('/^\d{12}$/', $aadhar)) {
        $errors[] = "Invalid Aadhar Number";
    }

    // Password (min 6 chars, at least 1 letter and 1 number)
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/', $password)) {
        $errors[] = "Password must be at least 6 characters with letters and numbers";
    }

    // PIN Code
    if (!preg_match('/^[1-9][0-9]{5}$/', $pincode)) {
        $errors[] = "Invalid PIN Code";
    }

    // PAN Number
    if (!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pan)) {
        $errors[] = "Invalid PAN Number";
    }

    // Output
    if (empty($errors)) {
        echo "<p class='success'>All inputs are valid!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
?>

</body>
</html>
