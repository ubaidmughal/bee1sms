<?php
include('db.php');
include('functionClass.php');
if(isset($_POST["operationClass"]))
{
	if($_POST["operationClass"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblclasses (ClassName, Section,SubjectName) 
			VALUES (:ClassName, :Section,:SubjectName)
		");
		$result = $statement->execute(
			array(
				':ClassName'	=>	$_POST["ClassName"],
				':Section'	=>	$_POST["Section"],
				':SubjectName'	=>	$_POST["SubjectName"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationClass"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblclasses 
			SET ClassName = :ClassName, Section = :Section , SubjectName = :SubjectName
			WHERE ClassId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ClassName'	=>	$_POST["ClassName"],
				':Section'	=>	$_POST["Section"],
				':SubjectName'	=>	$_POST["SubjectName"],
				
				':id'			=>	$_POST["ClassId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>