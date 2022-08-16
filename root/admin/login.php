<?php
include_once __DIR__ . '/../inc/config.php';



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        html, body {
            height: 100%;
        }
    </style>
    <title>Login</title>
</head>
<body>

<div class="container container--login">
    <div class="login-form">
        <h2>Admin panel</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Login:</label>
                <input type="text" required class="form-control" id="email" placeholder="Login" name="login">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" required class="form-control" id="pwd" placeholder="Password" name="pswd">
            </div>




            <button type="submit" name="submit" class="btn btn-primary">Daxil ol</button>
        </form>
    </div>
</div>




