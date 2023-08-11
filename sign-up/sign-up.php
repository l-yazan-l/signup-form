<?php
if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST['password']) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("It must contain at least 1 letter");
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    die("It must contain at least 1 number");
}

if ($_POST['password'] !== $_POST['password-confirmation']) {
    die("Password does not match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__."/database.php";

$checkEmailQuery = "SELECT id FROM user WHERE email = ?";
$checkEmailStmt = $mysqli->prepare($checkEmailQuery);
$checkEmailStmt->bind_param("s", $_POST['email']);
$checkEmailStmt->execute();
$checkEmailResult = $checkEmailStmt->get_result();

if ($checkEmailResult->num_rows > 0) {
    die("Email Already Taken");
}

$insertQuery = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$insertStmt = $mysqli->prepare($insertQuery);
$insertStmt->bind_param("sss", $_POST['name'], $_POST['email'], $password_hash);

if ($insertStmt->execute()) {
    echo "Sign-Up Successful";
} else {
    die($insertStmt->error . " " . $mysqli->errno);
}
