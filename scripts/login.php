<?php 
session_start();

$username = $_POST['username'];
$password = md5 ($_POST['password']);

if ($username && $password) {
    include '../includes/config.php';
    include '../includes/db.php';
    
    $queryusername = "SELECT * FROM users WHERE username = '$username'";
    $resultsusername = $connect->query($queryusername);
    
    if ($resultsusername->num_rows > 0){
        while($row = $resultsusername->fetch_assoc()){
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }
        if ($username == $dbusername && ($password) == $dbpassword)
        {
            $_SESSION['username']=$dbusername;
            header ("location: ../index.php");
        }
        else 
        {
            echo "Password is not right!";
        }
    }
    else 
    {
        echo "Username doesn't exist!";
    }
}
else 
{
    echo "Both fields needs to be filled in!";
}

?>