<?php 
$league = $_GET['league'];
$match = $_POST['match'];
echo $league."<br>". $match;

?>
<form method="POST" action="scripts/post_prediction.php?league=<?php echo $league."&match=".$match; ?>">
    <p>Prediction: </p>
<textarea name="prediction">
    
</textarea>
    <p>Description: </p>
<textarea name="description">
</textarea>
    <br>
<input type="submit">
</form>