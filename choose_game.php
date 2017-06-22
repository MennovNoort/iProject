<?php
include 'includes/config.php';
include 'includes/db.php';

$league = $_POST['league'];
echo "Choose a game (".$league.")";

$select_matches = "SELECT * FROM matches WHERE league = '$league'";
$result_select = $connect->query($select_matches);
?>
<form method="post" action="make_prediction.php?league=<?php echo $league; ?>">
<p>Choose match: </p>
<select name="match">
    <?php 
    while($row = $result_select->fetch_assoc()){
        echo "<option value='". $row['home_team']. " - " .$row['away_team']."'>"
            . $row['home_team']." - " .$row['away_team']."</option>";
    }
    ?>
    
</select>
    <input type="submit" value="Next step">
</form>
