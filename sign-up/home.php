<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // Include or require the database connection configuration
    require "database.php";
    
    // Assuming you have a PDO connection in the "database.php" file
    $pdo = require "database.php";
    
    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM user WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"]);
    $stmt->execute();
    
    // Fetch the result as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <H1>Home</H1>
    <?php if (isset($user)): ?>
        <p>Welcome to the home page <?php echo htmlspecialchars($user["name"]); ?>.</p>
        <p><a href="log-out.php">Log out</a></p>
        <?php else: ?>
            <p><a href="index.php">Sign up</a> or <a href="login-index.php">Sign in.</a></p>
             <?php endif; ?>
</body>
</html>