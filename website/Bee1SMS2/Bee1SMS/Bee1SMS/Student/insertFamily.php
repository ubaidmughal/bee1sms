<?php
include('db.php');
include('functionStudent.php');
if(isset($_POST["operationFamily"]))
{
	if($_POST["operationFamily"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblfamilygroup (FamilyCode, FamilyName,StudentName) 
			VALUES (:FamilyCode, :FamilyName,:StudentName)
		");
		$result = $statement->execute(
			array(
				':FamilyCode'	=>	$_POST["FamilyCode"],
				':FamilyName'	=>	$_POST["FamilyName"],
				':StudentName'	=>	$_POST["StudentName"]
				

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationFamily"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblfamilygroup 
		  SET FamilyCode = :FamilyCode, FamilyName = :FamilyName , StudentName = :StudentName
			WHERE FamilyId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':FamilyCode'	=>	$_POST["FamilyCode"],
				':FamilyName'	=>	$_POST["FamilyName"],
				':StudentName'	=>	$_POST["StudentName"],
			
				
				':id'			=>	$_POST["FamilyId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>