<?php 
include 'includes/config.php';
include 'includes/db.php';
session_start();

if ($_SESSION){
        if ($_SESSION['username']){
        echo "Welcome ".$_SESSION['username']."<br>";
        echo "<a href='tip_form.php'><button>Make a tip</button></a>
        <br>
        <a href='scripts/logout.php'>logout</a> <br> ";
        }
    }
    
    else{
        ?>
        <form action="scripts/login.php" method="POST">
        <input type="username" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input value="login" type="submit"><br>
        <a href="register_form.php">No account?</a>
    </form>
<?php
    }
$id = $_GET['bet'];

$one_bet = "SELECT * FROM bets WHERE id ='$id'";
$do_bet = $connect->query($one_bet);
 while($row = $do_bet->fetch_assoc()){
     echo $row['league']."<br>".
        $row['teams']."<br>".
        $row['prediction']."<br>".
        $row['description']."<br>".
        $row['username']."<br>".
        $row['date']."<br>";
     
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
             echo $number; 
             $select_onr = "SELECT * FROM users_liked WHERE user_id='$userid' AND bet_id='$id'";
              $do_select = $connect->query($select_onr);
              $likes_of_user = $do_select->num_rows;  
             
             if($likes_of_user==0)
             {
                echo '
                <br>
                <a href="like_system.php?like=like0&bet='. $id.'">
                <button>like</button></a><br>
                <a href="like_system.php?like=dislike0&bet=' .$id.'"><button>dislike</button></a>';

             }
             else
             {
                 $row3 = $do_select->fetch_assoc();
                 if ($row3['status'] == 1){
                    echo '
                    <br>
                    <a href="like_system.php?like=unlike&bet='.$id.'"><button>unlike</button></a>
                    <br><a href="like_system.php?like=dislike&bet='.$id.'"><button>dislike</button></a>';
                 }
                 else if ($row3['status'] == -1){
                    echo '
                    <br>
                    <a href="like_system.php?like=like&bet='.$id.'">
                    <button>like</button></a><br>
                    <a href="like_system.php?like=undislike&bet='.$id.'"><button>undislike</button></a>';
                 }
                
                 
             
            }
             
             
             
             
             
             /*echo 
            "<a href='scripts/like_bet.php?id=".$id."&like=like'><button>Like</button></a>
             <a href='scripts/like_bet.php?id=".$id."&like=dislike'><button>Dislike</button></a>";*/
             /*echo "
             <form action='#' method='POST'>
                <p>React to this post</p>
                <textarea></textarea><br><br>
                <input type='submit' value='React'>
             </form>";*/
         }
     }
 }