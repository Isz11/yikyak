<?php
if(isset($_POST['upvote']) && isset($_SESSION["loggedin"])){
    $yakid = mysqli_real_escape_string($conn, $_POST['yakid']);
    $sqlu1 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = 1";
    $sqlu2 = "SELECT COUNT(*) FROM votes WHERE user = $id AND yak = $yakid AND vote = -1";
    $resultu1 = mysqli_query($conn, $sqlu1);
    $resultu2 = mysqli_query($conn, $sqlu2);
    $alreadyupvoted1 = mysqli_fetch_assoc($resultu1)['COUNT(*)'];
    $alreadydownvoted1 = mysqli_fetch_assoc($resultu2)['COUNT(*)'];
    if($alreadyupvoted1 > 0){
        $sqlu3 = "UPDATE votes SET vote = 0 WHERE yak = $yakid";
        $sqlu4 = "UPDATE yaks SET score = score - 1 WHERE id = $yakid";
        if(mysqli_query($conn, $sqlu3) && mysqli_query($conn, $sqlu4)){
            echo 'you upvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($alreadydownvoted1 > 0) {
        $sqlu5 = "UPDATE votes SET vote = 1 WHERE yak = $yakid";
        $sqlu6 = "UPDATE yaks SET score = score + 2 WHERE id = $yakid";
        if(mysqli_query($conn, $sqlu5) && mysqli_query($conn, $sqlu6)){
            echo 'you upvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } else {
        $sqlu7 = "INSERT INTO votes(user,yak,vote) VALUES('$id','$yakid','1')";
        $sqlu8 = "UPDATE yaks SET score = score + 1 WHERE id = $yakid";
        if(mysqli_query($conn, $sqlu7) && mysqli_query($conn, $sqlu8)){
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
    $resultd1 = mysqli_query($conn, $sqld1);
    $resultd2 = mysqli_query($conn, $sqld2);
    $alreadyupvoted2 = mysqli_fetch_assoc($resultd1)['COUNT(*)'];
    $alreadydownvoted2 = mysqli_fetch_assoc($resultd2)['COUNT(*)'];
    if($alreadydownvoted2 > 0){
        $sqld3 = "UPDATE votes SET vote = 0 WHERE yak = $yakid";
        $sqld4 = "UPDATE yaks SET score = score + 1 WHERE id = $yakid";
        if(mysqli_query($conn, $sqld3) && mysqli_query($conn, $sqld4)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } elseif($alreadyupvoted2 > 0) {
        $sqld5 = "UPDATE votes SET vote = -1 WHERE yak = $yakid";
        $sqld6 = "UPDATE yaks SET score = score - 2 WHERE id = $yakid";
        if(mysqli_query($conn, $sqld5) && mysqli_query($conn, $sqld6)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    } else {
        $sqld7 = "INSERT INTO votes(user,yak,vote) VALUES('$id','$yakid','-1')";
        $sqld8 = "UPDATE yaks SET score = score - 1 WHERE id = $yakid";
        if(mysqli_query($conn, $sqld7) && mysqli_query($conn, $sqld8)){
            echo 'you downvoted this yak';
            header("Refresh:0");
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}
