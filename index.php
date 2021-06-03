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
                $yakscore = intval($yak['score']);

                // count comments for each yak
                $sql = "SELECT COUNT(*) FROM comments WHERE yak = $yakid";
                $result = mysqli_query($conn, $sql);
                $comments = mysqli_fetch_assoc($result)['COUNT(*)'];

                if(isset($_SESSION["loggedin"])){
                // detect whether user has already upvoted and change upvote icon accordingly
                    $sqlu = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 1";
                    $resultu = mysqli_query($conn, $sqlu);
                    $alreadyupvoted = mysqli_fetch_assoc($resultu)['COUNT(*)'];
                    if($alreadyupvoted > 0){
                        $up_icon = "fas fa-chevron-circle-up";
                    } else {
                        $up_icon = "fas fa-angle-up";
                    }

                    // detect whether user has already downvoted and change upvote icon accordingly
                    $sqld = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = -1";
                    $resultd = mysqli_query($conn, $sqld);
                    $alreadydownvoted = mysqli_fetch_assoc($resultd)['COUNT(*)'];
                    if($alreadydownvoted > 0){
                        $down_icon = "fas fa-chevron-circle-down";
                    } else {
                        $down_icon = "fas fa-angle-down";
                    }
                }

                echo htmlspecialchars($yak['yak']); ?><br><br></span>
                <?php if(isset($_SESSION["loggedin"])){ ?>

                    <button data-id="<?php echo $yak['id']; ?>" class ="up_btn" type="button" name="upvote">
                        <span id="<?php echo 'upVoted'.$yak['id'] ?>"><i class="<?php echo $up_icon; ?>"></i></span>
                    </button>

                    <button data-id="<?php echo $yak['id']; ?>" class ="down_btn" type="button" name="downvote">
                        <span id="<?php echo 'downVoted'.$yak['id'] ?>"><i class="<?php echo $down_icon; ?>"></i></span>
                    </button>
                <?php } ?>
                <span id="<?php echo 'scoreOf'.$yak['id']; ?>" class="votescore">
                    <?php echo $yakscore; ?>
                </span><br><?php
                    echo get_time_ago(strtotime($yak['created'])); ?><br><?php
                    echo $comments;  ?>
                    <a href="yakcomments.php?id=<?php echo $yak['id'] ?>">Comments</a><br><br><br><br>
            <?php endforeach; ?>
        </div>
    </ul>
    <script type="text/javascript">
        let userid = "<?php echo $id; ?>";
    </script>
    <script type="text/javascript" src="sandbox.js"></script>
    <?php include ('templates/footer.php'); ?>
</html>
