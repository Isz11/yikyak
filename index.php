<?php
session_start();

include('config/db_connect.php');
$sql = 'SELECT yak, created_by, created, score FROM yaks ORDER BY created DESC';
$result = mysqli_query($conn, $sql);
$yaks = mysqli_fetch_all($result, MYSQLI_ASSOC);



function get_time_ago( $time )
{
    $time_difference = time() - $time + 3600;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60               =>  'month',
                24 * 60 * 60                    =>  'day',
                60 * 60                         =>  'hour',
                60                              =>  'minute',
                1                               =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
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


    <h4 style="text-align:center">Yaks</h4>
    <ul class = "yak-layout">
        <div>
            <?php foreach($yaks as $yak): ?>
                <?php
                    echo htmlspecialchars($yak['yak']); ?><br>
                    <a style='color:lightgray; font-size: 12px;' href="#"> Upvote </a><a style='color:lightgray; font-size: 12px' href="#"> Downvote </a><?php
                    echo intval($yak['score']);
                    echo "<p style='color:lightgray; font-size: 10px'>". get_time_ago(strtotime($yak['created'])) ."<p style='all:unset;'>";
                ?><br><br>
            <?php endforeach; ?>
        </div>
    </ul>

    <?php include ('templates/footer.php'); ?>
</html>
