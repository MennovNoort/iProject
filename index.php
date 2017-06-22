<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php 
    include 'includes/db.php';
    include 'includes/config.php';
    
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
     $select_bet = "SELECT * FROM bets";
        $do_select = $connect->query($select_bet);    
            
        while($row = $do_select->fetch_assoc()){
            echo 
                $row['league']."<br>".
                $row['teams']."<br>".
                $row['prediction']."<br>".
                $row['date']."<br>";
                echo "<a href='bet.php?bet=".$row['id']."'>More info</a>";
            }
    ?>
    
</body>
</html>
