<?php
session_start();

include('config/db_connect.php');

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM yaks WHERE id = $id_to_delete";
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }
}

// check get request ID parameter
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM yaks WHERE id = $id"; //make sql
    $result = mysqli_query($conn, $sql); // get the query result
    $yak = mysqli_fetch_assoc($result); // fetch result in array format
    // mysqli_free_result($result);
    // mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<?php include ('templates/header.php'); ?>
<div class="container center">
    <?php if($yak): ?>
        <h4><?php echo htmlspecialchars($yak['yak']); ?></h4>
        <p><?php echo date($yak['created']); ?></p>
        <form action="yakcomments.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $yak['id']; ?>">
            <input type="submit" name="delete" value="Delete">
        </form>
        <h5>Comments</h5>

        <!-- nothing here yet -->

    <?php else: ?>
        <h5>No such yak exists!</h5>
    <?php endif; ?>
</div>
<?php include ('templates/footer.php'); ?>
</html>
