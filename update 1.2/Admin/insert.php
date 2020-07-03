<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO words (word,mean) 
			VALUES (:word, :mean)
		");
		$result = $statement->execute(
			array(
				':word'	=>	$_POST["word"],
				':mean'	=>	$_POST["mean"],
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE words 
			SET word = :word, mean = :mean 
			WHERE word_id = :word_id
			"
		);
		$result = $statement->execute(
			array(
				':word'	=>	$_POST["word"],
				':mean'	=>	$_POST["mean"],
				':word_id' => $_POST["word_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>