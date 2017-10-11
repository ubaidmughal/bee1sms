<?php
include('db.php');
include('functionActivity.php');
if(isset($_POST["operationActivity"]))
{
	if($_POST["operationActivity"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblactivities (ActivityName, ActivityDescription) 
			VALUES (:ActivityName, :ActivityDescription)
		");
		$result = $statement->execute(
			array(
				':ActivityName'	=>	$_POST["ActivityName"],
				':ActivityDescription'	=>	$_POST["ActivityDescription"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationActivity"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblactivities 
			SET ActivityName = :ActivityName, ActivityDescription = :ActivityDescription 
			WHERE ActivityId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ActivityName'	=>	$_POST["ActivityName"],
				':ActivityDescription'	=>	$_POST["ActivityDescription"],
                
				
				':id'			=>	$_POST["ActivityId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>