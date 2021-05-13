<?php
session_start();

include('config/db_connect.php');

$yakid = (int) $_GET['id']; // grabs yak id from url
// echo 'this yak id is ' . $yakid . "</br>" . 'the logged in user is ' . $_SESSION['id'] . "</br>";

if(isset($_POST['submit'])){
    if(empty($_POST['yakcomment'])){
        echo 'Please enter a comment';
    } else {
        $newcomment = mysqli_real_escape_string($conn, $_POST['yakcomment']);
        $yakid = mysqli_real_escape_string($conn, $_POST['yakid']);
        $id = $_SESSION['id']; // this grabs the id of the logged in user
        $sql = "INSERT INTO comments(user,yak,comment) VALUES('$id','$yakid','$newcomment')";
        $sql2 = "UPDATE user SET karma = karma + 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
          header("Location: yakcomments.php?id=$yakid");
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
    <h1>Post a comment</h1>
    <form class="" action="postcomment.php" method="post">
        <input type="hidden" name="yakid" value="<?php echo htmlspecialchars($yakid) ?>">
        <div>
            <textarea name="yakcomment" rows="8" cols="80" placeholder="Enter your comment here"></textarea>
        </div>
        <div class="">
            <?php
            if(isset($_SESSION["loggedin"])){ ?>
                <input type="submit" name="submit" value="Post comment" class="btn">
            <?php } else {
                echo 'Please login to comment on a yak';
            } ?>
        </div>
    </form>



    <?php include ('templates/footer.php'); ?>
</html>
