<?php
include('db.php');
include('functionBM.php');
if(isset($_POST["operationbook"]))
{
	if($_POST["operationbook"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblbookmaster (BookNames, Author,Publisher,ContactPerson) 
			VALUES (:BookNames, :Author,:Publisher,:ContactPerson)
		");
		$result = $statement->execute(
			array(
				':BookNames'	=>	$_POST["BookNames"],
				':Author'	=>	$_POST["Author"],
				':Publisher'	=>	$_POST["Publisher"],
				':ContactPerson'	=>	$_POST["ContactPerson"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationbook"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblbookmaster 
			SET BookNames = :BookNames, Author = :Author , Publisher = :Publisher, ContactPerson = :ContactPerson
			WHERE BookId = :id
			"
		);
		$result = $statement->execute(
			array(
				':BookNames'	=>	$_POST["BookNames"],
				':Author'	=>	$_POST["Author"],
                ':Publisher'	=>	$_POST["Publisher"],
                ':ContactPerson'	=>	$_POST["ContactPerson"],
				
				':id'			=>	$_POST["BookId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>