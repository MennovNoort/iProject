<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		  
		#fullBet {
			display: block;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			width: 60%;
			margin-top: 60px;
			
		}
		
		#likes {
			width: 175px;
			margin-top: 10px;
			display: flex;
			justify-content: space-between;
		}
		
		#likes button {
			width: 75px;
			height: 50px;
			display: inline-block;
			border-radius: 15px;
			border: 2px solid transparent;
		}
		
	</style>
</head>
<?php 
include 'header.php';

$id = $_GET['bet'];
$one_bet = "SELECT * FROM bets WHERE id ='$id'";
$do_bet = $connect->query($one_bet);
 while($row = $do_bet->fetch_assoc()){
     echo "<div id='fullBet'><br><b>Username: </b>".
        $row['username']."<br><b>Date: </b>".
		$row['date']."<br><br><b>League: </b>".
		$row['league']."<br><b>Game: </b>".
        $row['teams']."<br><b>Prediction: </b>".
        $row['prediction']."<br><b>Motivation: </b>".
        $row['description']."<br>";
     
     if ($_SESSION){
         if ($_SESSION['username']){
             $userid = $_SESSION['userid'];
             
           
             
             //select all -> users_liked {
             $select_all = "SELECT * FROM users_liked WHERE bet_id='$id'";
             $do_all = $connect->query($select_all);
             $number = 0;
             while($row2 = $do_all->fetch_assoc()){
             //$select_onr
                 $number = $number + $row2['status'];

             }
            
             echo "<b>Likes: </b>".$number; 
             $select_onr = "SELECT * FROM users_liked WHERE user_id='$userid' AND bet_id='$id'";
              $do_select = $connect->query($select_onr);
              $likes_of_user = $do_select->num_rows;  
             
             if($likes_of_user==0)
             {
                echo '
                <br><div id="likes">
                <a href="like_system.php?like=like0&bet='. $id.'">
                <button>LIKE</button><br>
                <a href="like_system.php?like=dislike0&bet=' .$id.'"><button>DISLIKE</button></a></div>';
             }
             else
             {
                 $row3 = $do_select->fetch_assoc();
                 if ($row3['status'] == 1){
                    echo '
                    <br><div id="likes">
                    <a href="like_system.php?like=unlike&bet='.$id.'"><button style="background-color: green;">UNLIKE</button></a>
                    <br><a href="like_system.php?like=dislike&bet='.$id.'"><button>DISLIKE</button></a></div>';
                 }
                 else if ($row3['status'] == -1){
                    echo '
                    <br><div id="likes">
                    <a href="like_system.php?like=like&bet='.$id.'">
                    <button>LIKE</button></a><br>
                    <a href="like_system.php?like=undislike&bet='.$id.'"><button style="background-color: red;">UNDISLIKE</button></a></div>';
                 }
                
                 
             
            }
    
         }
     }
 }