<?php
session_start();

include('config/db_connect.php');
$sql = 'SELECT yak, created_by, created FROM yaks ORDER BY created';
$result = mysqli_query($conn, $sql);
$yaks = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_POST['submit'])){
    if(empty($_POST['yakentry'])){
        echo 'Please enter a yak';
    } else {
        $newyak = mysqli_real_escape_string($conn, $_POST['yakentry']);
        $sql = "INSERT INTO yaks(yak,created_by,score) VALUES('$newyak','unknownUser','0')";
        if(mysqli_query($conn, $sql)){
          header('Location: index.php');
        } else {
          echo 'Query error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <title>Yik Yak</title>
    <?php include ('templates/header.php'); ?>
    <h1>Welcome to Yik Yak, the anonymous social media app</h1>
    <h4>Yaks</h4>
    <ul>
      <div class = "yak-layout">
        <?php foreach($yaks as $yak): ?>
          <?php echo htmlspecialchars($yak['yak']); ?><br><br>
        <?php endforeach; ?>
      </div>
    </ul>
    <form class="" action="index.php" method="post">
        <div>
            <textarea name="yakentry" rows="8" cols="80" placeholder="Enter your yak here"></textarea>
        </div>
        <div class="">
          <input type="submit" name="submit" value="Yak" class="btn">
        </div>
    </form>
    <?php include ('templates/footer.php'); ?>
</html>
