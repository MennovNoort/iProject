<?php
session_start();


include '../includes/config.php';
include '../includes/db.php';

$username = $_SESSION['username'];
$match = $_GET['match'];
$league = $_GET['league'];
$prediction = $_POST['prediction'];
$description = $_POST['description'];

if($username){
    $insert_bet = "INSERT INTO bets (league, teams, prediction, description, username) VALUES ('$league','$match','$prediction','$description','$username')";
    $do_insert = $connect->query($insert_bet);
    header('location: ../index.php');
}
else{
    echo "You need to log in!";
}
?>