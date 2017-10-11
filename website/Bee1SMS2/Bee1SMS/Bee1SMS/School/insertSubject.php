<?php
include('db.php');
include('functionSubject.php');
if(isset($_POST["operationSubject"]))
{
	if($_POST["operationSubject"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblsubject (SubjectName) 
			VALUES (:SubjectNames)
		");
		$result = $statement->execute(
			array(
				':SubjectNames'	=>	$_POST["SubjectNames"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSubject"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblsubject 
			SET SubjectName = :SubjectNames
			WHERE SubjectId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SubjectNames'	=>	$_POST["SubjectNames"],
			
				
				':id'			=>	$_POST["SubjectId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>