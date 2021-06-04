<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="styles.css">
<style type="text/css">
  body {
    background-color: #38d9c6;
  }
  .logo-writing{
    width: 500px;
    margin: 40px auto -30px;
    display: block;
    position: relative;
    top: -30px;
  }
  .logo{
    width: 100px;
    margin: 40px auto -30px;
    display: block;
    position: relative;
    top: -30px;
  }
  h1 {
    text-align: center;
  }
</style>
  <head>
      <script src="https://kit.fontawesome.com/12e0829d40.js" crossorigin="anonymous"></script>
      <meta charset="utf-8">
      <title>Yik Yak</title>
      <?php
      // session_start();

      if(isset($_SESSION["loggedin"])){
          echo 'Welcome ' . $_SESSION['name'] . '!'; ?>
          <a href="logout.php">Logout</a><br>
          <a href="profile.php">Your profile</a>
      <?php } else { ?>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
      <?php } ?>
      <a href="index.php">
      <img alt="Qries" src="images/yikyaklogo1" class="logo">
      </a>
  </head>
  <body>
