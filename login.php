<?php
  // Initialize the session
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: index.php");
      exit;
  }

  include('config/db_connect.php');

  $username = '';
  $password = '';
  $errors = ['username'=>'','password'=>''];

  if(isset($_POST['submit'])){
    // check the username
    if(empty($_POST['username'])){
      $errors['username'] = 'Please enter your username <br/>';
    } else {
    }

    // check the password
    if(empty($_POST['password'])){
      $errors['password'] = 'Please enter your password <br/>';
    } else {
    }

   // end of the POST check

  if ($stmt = $conn->prepare("SELECT id, password FROM user WHERE username = ?")) {
   	$stmt->bind_param('s', $_POST['username']);
   	$stmt->execute();
   	// Store the result so we can check if the account exists in the database.
   	$stmt->store_result();

    if ($stmt->num_rows > 0) {
    	$stmt->bind_result($id, $password);
    	$stmt->fetch();
    	// Account exists, now we verify the password.
    	// Note: remember to use password_hash in your registration file to store the hashed passwords.
    	if ($_POST['password'] === $password) {
    		// Verification success! User has logged-in!
    		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
    		session_regenerate_id();
    		$_SESSION['loggedin'] = TRUE;
    		$_SESSION['name'] = $_POST['username'];
    		$_SESSION['id'] = $id;
    		echo 'Welcome ' . $_SESSION['name'] . '!';
    	} else {
    		// Incorrect password
    		echo 'Incorrect username and/or password!';
    	}
    } else {
    	// Incorrect username
    	echo 'Incorrect username and/or password!';
    }
  }
 	$stmt->close();

}

?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include ('templates/header.php'); ?>
  <section>
    <h4>Login</h4>
    <form class="" action="login.php" method="POST">
      <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Username">
      <div class="">
        <?php echo $errors['username']; ?>
      </div>
      <br><br>
      <input type="password" name="password" value="" placeholder="Password">
      <div class="">
        <?php echo $errors['password']; ?>
      </div>
      <br><br>
      <div class="">
        <input type="submit" name="submit" value="Login" class="btn">
      </div>
    </form>
  </section>
  <?php include ('templates/footer.php'); ?>
</html>
