<?php
include('db.php');
include('functionSection.php');
if(isset($_POST["operationSection"]))
{
	if($_POST["operationSection"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblsections (SectionName) 
			VALUES (:SectionName)
		");
		$result = $statement->execute(
			array(
				':SectionName'	=>	$_POST["SectionName"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSection"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblsections 
			SET SectionName = :SectionName
			WHERE SectionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SectionName'	=>	$_POST["SectionName"],
			
				
				':id'			=>	$_POST["SectionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>