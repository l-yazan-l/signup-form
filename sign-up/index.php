<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Sign-up</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sign-up.css" rel="stylesheet">
  </head>

    
<main class="form-signin w-100 m-auto">
  <form action = "sign-up.php" method = "post" novalidate>
    
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="name" id="name" name = "name" class="form-control" >
      <label for="name">Name</label>
    </div>


    <div class="form-floating">
      <input type="email" id="email" name = "email" class="form-control" >
      <label for="email">Email</label>
    </div>


    <div class="form-floating">
      <input type="password" id="password" name = "password" class="form-control" >
      <label for="password">Password</label>
    </div>

    <div class="form-floating">
      <input type="password" id="password-confirmation" name = "password-confirmation" class="form-control" >
      <label for="password-confirmation">Password Confirmation</label>
    </div>

    <!-- <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div> -->
    <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
  </form>
</main>

    </body>
</html>
