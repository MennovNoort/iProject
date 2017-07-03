<?php 
session_start();
include 'includes/db.php';
include 'includes/config.php';
$userid = $_SESSION['userid'];
$id = $_GET['bet'];
$like = isset($_GET['like'])?$_GET['like']:'';
switch ($like){
    //insert
    case "like0": 
    $insert_like = "INSERT INTO `users_liked`(`user_id`, `bet_id`, `status`) VALUES ('$userid','$id','1')";
    $do_insert = $connect->query($insert_like); 
    header("location: bet.php?bet=$id");
    break;  
        
    case "dislike0":
    $insert_dislike = "INSERT INTO `users_liked`(`user_id`, `bet_id`, `status`) VALUES ('$userid','$id','-1')";    
    $do_insert = $connect->query($insert_dislike);    
    header("location: bet.php?bet=$id");
    break;
    //update
    case "like":
    $update_like = "UPDATE users_liked SET status = '1'  WHERE user_id = '$userid' AND bet_id = '$id'";
    $do_update = $connect->query($update_like);    
    header("location: bet.php?bet=$id");
    break;  
        
    case "dislike":
    $update_dislike = "UPDATE users_liked SET status = '-1'  WHERE user_id = '$userid' AND bet_id = '$id'";  
    $do_update1 = $connect->query($update_dislike);
    header("location: bet.php?bet=$id");
    break;
        
    //delete
    case "unlike":
    $delete_like = "DELETE FROM users_liked WHERE user_id = '$userid' AND bet_id = '$id'";
    $do_delete_like = $connect->query($delete_like);
    header("location: bet.php?bet=$id");
        
    break;
    case "undislike":
    $delete_dislike = "DELETE FROM users_liked WHERE user_id = '$userid' AND bet_id = '$id'";
    $do_delete_dislike = $connect->query($delete_dislike);    
    header("location: bet.php?bet=$id");
    break;  
}
?>