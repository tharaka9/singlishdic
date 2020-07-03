<?php

include('db.php');
include("function.php");

if(isset($_POST["word_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM words WHERE word_id = :word_id"
	);
	$result = $statement->execute(
		array(
			':word_id'	=>	$_POST["word_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>