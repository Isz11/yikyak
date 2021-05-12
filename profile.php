<?php
session_start();
include('config/db_connect.php');

$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include ('templates/header.php'); ?>
  <section>
    <h4><?php echo $info['username']; ?></h4>
    <?php echo $info['karma'] . ' karma'; ?><br>
    <?php echo 'Created on ' . $info['created']; ?><br>
  </section>
  <?php include ('templates/footer.php'); ?>
</html>
