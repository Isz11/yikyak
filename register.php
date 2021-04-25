<?php
  include('config/db_connect.php');
  $username = '';
  $password = '';
  $errors = ['username'=>'','password'=>''];

  if(isset($_POST['submit'])){
    // check the username
    if(empty($_POST['email'])){
      $errors['username'] = 'A username is required <br/>';
    } else {
      $username = $_POST ['username'];
      if(!preg_match('/^[a-zA-Z]+$/',$username)){
        $errors['username'] = 'Username can only be letters';
      }
    }
    // check the password
    if(empty($_POST['password'])){
      $errors['password'] = 'A username is required <br/>';
    } else {
      $username = $_POST ['password'];
      if(!preg_match('/^[a-zA-Z0-9_\s]+$/',$password)){
        $errors['password'] = 'Password can only be letters, numbers, spaces and underscore';
      }
    }
  } // end of the POST check

if(array_filter($errors)){

} else {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "INSERT INTO user(username,password) VALUES('$username', '$password')";

  // save to the db and check
  if(mysqli_query($conn, $sql)){
    // header('Location: index.php');
  } else {
    echo 'Query error: ' . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include ('templates/header.php'); ?>
  <section>
    <h4>Register</h4>
    <form class="" action="register.php" method="POST">
      <input type="text" name="username" value="" placeholder="Username">
      <br><br>
      <input type="password" name="password" value="" placeholder="Password">
      <br><br>
      <input type="submit" name="submit" value="Register">
    </form>
  </section>
  <?php include ('templates/footer.php'); ?>
</html>
