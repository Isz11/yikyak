<?php
session_start();

include('config/db_connect.php');
include('timeago.php');

if(isset($_POST['sorttop'])){
    //echo 'sort by top score'; // for testing
    $sql = 'SELECT * FROM yaks ORDER BY score DESC';
    $result = mysqli_query($conn, $sql);
    $yaks = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    //echo 'sort by new'; // for testing
    $sql = 'SELECT * FROM yaks ORDER BY created DESC';
    $result = mysqli_query($conn, $sql);
    $yaks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if(isset($_SESSION["loggedin"])){
    $id = $_SESSION['id'];
} else {
    $id = "";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <title>Yik Yak</title>
    <?php include ('templates/header.php'); ?>
    <h1>Welcome to Yik Yak, the anonymous social media app</h1>

    <?php
    if(isset($_SESSION["loggedin"])){ ?>
        <div align='center'><a href="postyak.php">Post a yak?</a></div>
    <?php } else { ?>
        <div align='center'>Please login to post a yak</div>
    <?php } ?>

    <div align='center'>
        <form class="" action="index.php" method="post">
            <button type="submit" name="sortnew">New</button>
            <button type="submit" name="sorttop">Top</button>
        </form>
    </div>
    <div id="status"></div>
    <h4 style="text-align:center">Yaks</h4>
    <ul class ="yak-layout">
        <div>
            <?php foreach($yaks as $yak):
                $yakid = $yak['id'];

                // count comments for each yak
                $sql = "SELECT COUNT(*) FROM comments WHERE yak = $yakid";
                $result = mysqli_query($conn, $sql);
                $comments = mysqli_fetch_assoc($result)['COUNT(*)'];

                echo htmlspecialchars($yak['yak']); ?><br><br></span>
                <?php if(isset($_SESSION["loggedin"])){ ?>
                    <form id="yak_upvote" class="" action="index.php" method="post">
                        <input id="yakid" type="hidden" name="yakid" value="<?php echo $yak['id'] ?>">
                        <input id="userid" type="hidden" name="userid" value="<?php echo $id ?>">
                        <button class ="up_btn" type="submit" name="upvote">
                            <span id="up_icon"><i class="fas fa-angle-up"></i></span>
                        </button>
                    </form>
                    <form id="yak_downvote" class="" action="index.php" method="post">
                        <input id="yakid" type="hidden" name="yakid" value="<?php echo $yak['id'] ?>">
                        <input id="userid" type="hidden" name="userid" value="<?php echo $id ?>">
                        <button class ="down_btn" type="submit" name="downvote">
                            <span id="down_icon"><i class="fas fa-angle-down"></i></span>
                        </button>
                    </form>
                <?php } ?>
                    <span class="votescore">
                        <?php
                        echo intval($yak['score']). ' karma'; ?><br><?php
                        echo get_time_ago(strtotime($yak['created'])); ?><br><?php
                        echo $comments;  ?>
                        <a href="yakcomments.php?id=<?php echo $yak['id'] ?>">Comments</a><br><br><br><br>
                <?php endforeach; ?>
        </div>
    </ul>
    <script type="text/javascript" src="sandbox.js"></script>
    <?php include ('templates/footer.php'); ?>
</html>
