<?php
include('db.php');
include('functionQM.php');
if(isset($_POST["operationQM"]))
{
	if($_POST["operationQM"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblquemaster (Chapter, BookName,QuestionType,QuestionString,McqsOption) 
			VALUES (:Chapter, :BookName,:QuestionType,:QuestionString,:McqsOption)
		");
		$result = $statement->execute(
			array(
				':Chapter'	=>	$_POST["Chapter"],
				':BookName'	=>	$_POST["BookName"],
				':QuestionType'	=>	$_POST["QuestionType"],
				':QuestionString'	=>	$_POST["QuestionString"],
                ':McqsOption'	=>	$_POST["McqsOption"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationQM"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblquemaster 
			SET Chapter = :Chapter, BookName = :BookName , QuestionType = :QuestionType, QuestionString = :QuestionString, McqsOption = :McqsOption
			WHERE QuestionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':Chapter'	=>	$_POST["Chapter"],
				':BookName'	=>	$_POST["BookName"],
				':QuestionType'	=>	$_POST["QuestionType"],
				':QuestionString'	=>	$_POST["QuestionString"],
                ':McqsOption'	=>	$_POST["McqsOption"],
				
				':id'			=>	$_POST["QuestionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>