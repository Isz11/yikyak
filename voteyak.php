<?php
if(isset($_POST['upvote']) && isset($_SESSION["loggedin"])){
    $yakid = mysqli_real_escape_string($conn, $_POST['yakid']);
    $sqlu1 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 1";
    $sqlu2 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = -1";
    $sqlu3 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 0";
    $resultu1 = mysqli_query($conn, $sqlu1);
    $resultu2 = mysqli_query($conn, $sqlu2);
    $resultu3 = mysqli_query($conn, $sqlu3);
    $alreadyupvoted1 = mysqli_fetch_assoc($resultu1)['COUNT(*)'];
    $alreadydownvoted1 = mysqli_fetch_assoc($resultu2)['COUNT(*)'];
    $removedvote1 = mysqli_fetch_assoc($resultu3)['COUNT(*)'];
    if($alreadyupvoted1 > 0){
        $sql = "UPDATE votes SET vote = 0 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score - 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma - 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you removed your vote';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($alreadydownvoted1 > 0) {
        $sql = "UPDATE votes SET vote = 1 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score + 2 WHERE id = $yakid";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
            echo 'you upvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($removedvote1 > 0) {
        $sql = "UPDATE votes SET vote = 1 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score + 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma + 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you upvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO votes(user,yak,vote) VALUES('$id','$yakid','1')";
        $sql2 = "UPDATE yaks SET score = score + 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma + 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you upvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}

if(isset($_POST['downvote']) && isset($_SESSION["loggedin"])){
    $yakid = mysqli_real_escape_string($conn, $_POST['yakid']);
    $sqld1 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 1";
    $sqld2 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = -1";
    $sqld3 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 0";
    $resultd1 = mysqli_query($conn, $sqld1);
    $resultd2 = mysqli_query($conn, $sqld2);
    $resultd3 = mysqli_query($conn, $sqld3);
    $alreadyupvoted1 = mysqli_fetch_assoc($resultd1)['COUNT(*)'];
    $alreadydownvoted1 = mysqli_fetch_assoc($resultd2)['COUNT(*)'];
    $removedvote1 = mysqli_fetch_assoc($resultd3)['COUNT(*)'];
    if($alreadydownvoted1 > 0){
        $sql = "UPDATE votes SET vote = 0 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score + 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma - 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you removed your vote';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($alreadyupvoted1 > 0) {
        $sql = "UPDATE votes SET vote = -1 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score - 2 WHERE id = $yakid";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($removedvote1 > 0) {
        $sql = "UPDATE votes SET vote = -1 WHERE yak = $yakid";
        $sql2 = "UPDATE yaks SET score = score - 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma + 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO votes(user,yak,vote) VALUES('$id','$yakid','-1')";
        $sql2 = "UPDATE yaks SET score = score - 1 WHERE id = $yakid";
        $sql3 = "UPDATE user SET karma = karma + 1 WHERE id = $id";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}
