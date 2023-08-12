<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST")
 {
    
    $pdo = require "database.php";
    $email = $_POST["email"];    
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($_POST["password"], $user["password_hash"]))
        {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: home.php");
            exit; 
        }
    }
    $is_invalid = true;
}
?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign-up form example">
    <meta name="author" content="Yazan">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="assets/login.css" rel="stylesheet">
  </head>
<html>
   <body>

    <div class = "container mt-4">
    <?php if($is_invalid): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>Invalid Information</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php endif; ?>
    </div>
    
    
    
<main class="form-signin w-100 m-auto">
  <form action = "" method = "post" novalidate>

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    


    <div class="form-floating">
      <input type="email" id="email" name = "email" class="form-control"
                          value = "<?= htmlspecialchars( $_POST["email"] ?? " ") ?>">
      <label for="email">Email</label>
    </div>


    <div class="form-floating">
      <input type="password" id="password" name = "password" class="form-control" >
      <label for="password">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>

    </body>
</html>

