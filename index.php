<?php
  include('config/db_connect.php');
  $sql = 'SELECT yak, created_by, created FROM yaks ORDER BY created';
  $result = mysqli_query($conn, $sql);
  $yaks = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <title>Yik Yak</title>
    <?php include ('templates/header.php'); ?>
    <h4>Yaks</h4>
    <ul>
      <div>



              <?php foreach($yaks as $yak): ?>
                <?php echo htmlspecialchars($yak['yak']); ?><br><br>
              <?php endforeach; ?>



      </div>
    </ul>
    <?php include ('templates/footer.php'); ?>
</html>
