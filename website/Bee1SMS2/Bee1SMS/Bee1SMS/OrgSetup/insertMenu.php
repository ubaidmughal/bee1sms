<?php
include('db.php');
include('functionMenu.php');
if(isset($_POST["operationMenu"]))
{
	if($_POST["operationMenu"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblmenus (MenuCode, MenuName,MenuType,GroupCode,Position,Title,Detail) 
			VALUES (:MenuCode, :MenuName,:MenuType,:GroupCode,:Position,:Title,:Detail)
		");
		$result = $statement->execute(
			array(
				':MenuCode'	=>	$_POST["MenuCode"],
				':MenuName'	=>	$_POST["MenuName"],
				':MenuType'	=>	$_POST["MenuType"],
				':GroupCode'	=>	$_POST["GroupCode"],
                ':Position'	=>	$_POST["Position"],
                ':Title'	=>	$_POST["Title"],
                ':Detail'	=>	$_POST["Detail"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationMenu"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblmenus 
			SET MenuCode = :MenuCode, MenuName = :MenuName , MenuType = :MenuType, GroupCode = :GroupCode,Position = :Position,Title = :Title,Detail =:Detail
			WHERE MenuId = :id
			"
		);
		$result = $statement->execute(
			array(
				':MenuCode'	=>	$_POST["MenuCode"],
				':MenuName'	=>	$_POST["MenuName"],
				':MenuType'	=>	$_POST["MenuType"],
				':GroupCode'	=>	$_POST["GroupCode"],
                ':Position'	=>	$_POST["Position"],
                ':Title'	=>	$_POST["Title"],
                ':Detail'	=>	$_POST["Detail"],
				
				':id'			=>	$_POST["MenuId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>