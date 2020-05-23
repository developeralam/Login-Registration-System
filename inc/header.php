<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'/../lib/Session.php';
  Session::init();
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login Registration System In PHP</title>
  </head>
  <body>
    <div class="container">
      
      <!-- Header Top -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <a class="navbar-brand" href="index.php">PHP Login Registration system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto">
            <?php if (Session::get('login') == true) { ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?id=<?php echo Session::get('id') ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?action=logout">Logout</a>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </nav>
      <!-- Header Top End -->

      <!-- Main Content Start -->
      <div class="main-content card">