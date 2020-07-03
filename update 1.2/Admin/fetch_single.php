<?php
include('db.php');
include('function.php');
if(isset($_POST["word_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM words 
		WHERE word_id = '".$_POST["word_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["word"] = $row["word"];
		$output["mean"] = $row["mean"];
	}
	echo json_encode($output);
}
?>