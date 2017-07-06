<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iProject</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		
		html, body {
			max-width: 100%;
			overflow-x: hidden;
		}
	
		h1 {
			margin-left: 5%;
			font-size: 20px;
			font-weight: 100;
			color: #2b2b2b;
			margin-top: 5px;
			margin-bottom:5px;
		}
		
		
		table {
			display:inline-block; 
			width: 83%; 
			border-top:2px solid #e74c3c; 
			margin-left: 5%; 
			margin-top: 10px;
			background-color: #ffffff;
			padding: 15px;
			margin-right: 5%;
		}
	
		#banner { 
			width: 100%;
		    height: 405px;
			margin-top: 15%;
			margin-bottom: 15%;
			display: none;
		}
		
		.tableRecent a {
			text-decoration: none;
			color: #fed700;
		}
		
		.tableRecent a:hover {
			color: #e74c3c;
		}
		
		.tableBest {
			border-top: 2px solid #fed700; 
		}
		
		@media screen and (min-width: 600px) {
			table {
				width: 43%;
				display: inline-table;
				margin: 0;
				margin-left: 5%;
				margin-top: 10px;
			}
			
			#recentH1 {
				margin-top: 75px;
			}
			
		}
		
		@media screen and (min-width: 950px) {
			
			
			#banner {
				display: block;
			}
		}
	
		
	</style>
</head>
	
<body>
	<?php include 'header.php';?><br>
	
		<h1 id="recentH1"><i>Recent Tips</i></h1>
		
				<?php

					$select_bet = "SELECT * FROM bets ORDER BY date DESC LIMIT 4";
					$do_select = $connect->query($select_bet);    

					while($row = $do_select->fetch_assoc()){
						echo 
								"<table class='tableRecent'><tr><td>League: <b>".$row['league']."</b></tr></td>".
								"<tr><td>Game:<b> ".$row['teams']."</b></tr></td>".
								"<tr><td>Prediction:<b> ".$row['prediction']."</b></tr></td>".
								"<tr><td>Date:<b> ".$row['date']."</b></tr></td>".
								"<tr><td><a href='bet.php?bet=".$row['id']."'>More info</a></tr></td></table>";
							}
					?>
		
		
		<br><br><br><br><h1><i>Best tips</i></h1>
		<?php
    
                // we illen ze sorteren op liked
    
             $select_all = "SELECT * FROM users_liked";
             $do_all = $connect->query($select_all);
            $user_liked=array();
             while($row2 = $do_all->fetch_assoc()){
                 array_push($user_liked,$row2);
             }
            //echo "<hr>USER_LIKED<br>";
            //var_dump($user_liked) ;
            //echo "<hr>";
            function getNumberLiked($bet_id)
            {
                global $user_liked;
                $number=0;
                for($i=0;$i<count($user_liked);$i++)
                {
                    if($user_liked[$i]["bet_id"]==$bet_id)
                    $number+=$user_liked[$i]['status'];
                }
                return $number;
            }
            $bet_table_id=array();
            $select_bet = "SELECT id FROM bets";
            $do_select = $connect->query($select_bet);    
            while($row = $do_select->fetch_assoc())
            {
                $id=$row['id'];
                $row=array( "id"=>$id, "liked"=>getNumberLiked($id) );
                array_push($bet_table_id,$row);
            }
            function sortByLiked($a,$b)
            {
                return $b["liked"]-$a["liked"];
            }
            usort($bet_table_id,"sortByLiked");
    
            //echo "bet_table_id<br>";
           // var_dump ($bet_table_id);
           // echo "<hr>";
    
            $sort_results=array();
            $select_bet = "SELECT * FROM bets WHERE id='".$bet_table_id[0]["id"]."' OR id='".$bet_table_id[1]["id"]."' OR id='".$bet_table_id[2]["id"]."' OR id='".$bet_table_id[3]["id"]."'";
//            echo "query: ".$select_bet;
            $do_select = $connect->query($select_bet);    
            while($row = $do_select->fetch_assoc()){
                $row["liked"]=getNumberLiked($row['id']);
                array_push($sort_results,$row);
            }
            usort($sort_results,"sortByLiked");
            //
            for($i=0;$i<count($sort_results);$i++)
            {
                $row=$sort_results[$i];
                echo "<table class='tableBest'><tr><td>League: <b>".$row['league'];
				echo "</b></td></tr>";
                echo "<tr><td>liked: <b>".$row['liked']."</b></td></tr>";
                echo "<tr><td>Game:<b> ".$row['teams']."</b></tr></td>";
				echo "<tr><td>Prediction:<b> ".$row['prediction']."</b></td></tr>";
				echo "<tr><td>Date:<b> ".$row['date']."</b></td></tr>";
				echo "<tr><td><a href='bet.php?bet=".$row['id']."'>";
                echo "More info</a></tr></td></table>";
            }
					?>
	
		<img id="banner" alt="banner" src="images/banner.png">
	
	<?php include 'footer.php';?>
		
</body>