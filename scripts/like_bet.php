<?php
include '../includes/db.php';
include '../includes/config.php';


if ($result->num_rows()==0){
    $like = "INSERT INTO users_liked ('user_id', 'bet_id') VALUES ('$userid','$betid')";
}
else{
    $dislike = "DELETE FROM users_liked WHERE user_id ='$userid' AND bet_id ='$betid'";
}
/*
$like = $_GET['like'];
$id = $_GET['id'];
if ($like == "like"){
    $like_query = "UPDATE bets SET likes = likes +1 WHERE id='$id'";
    $do_like = $connect->query($like_query);
    header('location: ../index.php');
}
if($like == "dislike"){
    $dislike_query = "UPDATE bets SET likes = likes -1 WHERE id='$id'";
    $do_dislike = $connect->query($dislike_query);
    header('location: ../index.php');
}
*/