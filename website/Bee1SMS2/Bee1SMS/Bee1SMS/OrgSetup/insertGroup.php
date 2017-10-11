<?php
include('db.php');
include('functionGroup.php');
if(isset($_POST["operationGroup"]))
{
	if($_POST["operationGroup"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblmenugroup (GroupCode, GroupName,Position) 
			VALUES (:GroupCode, :GroupName,:GroupPosition)
		");
		$result = $statement->execute(
			array(
				':GroupCode'	=>	$_POST["GroupCode"],
				':GroupName'	=>	$_POST["GroupName"],
				':GroupPosition'	=>	$_POST["GroupPosition"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationGroup"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblmenugroup 
			SET GroupCode = :GroupCode, GroupName = :GroupName , Position = :GroupPosition
			WHERE GroupId = :id
			"
		);
		$result = $statement->execute(
			array(
				':GroupCode'	=>	$_POST["GroupCode"],
				':GroupName'	=>	$_POST["GroupName"],
				':GroupPosition'	=>	$_POST["GroupPosition"],
				
				
				':id'			=>	$_POST["GroupId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>