<?php
session_start();

include('config/db_connect.php');
include('timeago.php');

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
    // var_dump($yak);
    // mysqli_free_result($result);
    // mysqli_close($conn);
}

$sql2 = "SELECT * FROM comments WHERE yak = $id ORDER BY created DESC";
$result2 = mysqli_query($conn, $sql2);
$comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<?php include ('templates/header.php'); ?>
<div class="container center">
    <?php if($yak): ?>
        <?php echo "<p style='color:black; font-size: 22px'>". htmlspecialchars($yak['yak']) ."<p style='all:unset;'>"; ?>
        <p><?php echo "<p style='color:gray; font-size: 10px'>". get_time_ago(strtotime($yak['created'])) ."<p style='all:unset;'>"; ?></p>
        <form action="yakcomments.php" method="POST">
            <?php if(isset($_SESSION["loggedin"]) && $yak['created_by'] == $_SESSION['id']){ ?>
                <input type="hidden" name="id_to_delete" value="<?php echo $yak['id']; ?>">
                <input type="submit" name="delete" value="Delete Yak">
            <?php } ?>
        </form>
        <h5>Comments</h5>
        <?php
        if(isset($_SESSION["loggedin"])){ ?>
            <div align='center'><a href="postcomment.php?id=<?php echo $yak['id'] ?>">Post a comment</a></div>
        <?php } else { ?>
            <div align='center'>Please login to comment on a yak</div>
        <?php } ?>

        <ul class = "yak-layout">
            <div>
                <?php foreach($comments as $comment):
                    echo htmlspecialchars($comment['comment']);?><br><?php
                    echo "<p style='color:lightgray; font-size: 10px'>". get_time_ago(strtotime($comment['created'])) ."<p style='all:unset;'>"; ?> <!--I will echo html all I want Joe-->
                    <br><br>
                <?php endforeach; ?>
            </div>
        </ul>

    <?php else: ?>
        <h5>No such yak exists!</h5>
    <?php endif; ?>
</div>
<?php include ('templates/footer.php'); ?>
</html>
