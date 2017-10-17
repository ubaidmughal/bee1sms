<?php
include('db.php');
include('functionAdmin.php');
if(isset($_POST["operationAdmin"]))
{
	if($_POST["operationAdmin"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tbluser (UserName, Email,DateReg,Password) 
			VALUES (:UserName, :Email,:DateReg,:Password)
		");
		$result = $statement->execute(
			array(
				':UserName'	=>	$_POST["UserName"],
				':Email'	=>	$_POST["Email"],
				':DateReg'	=>	$_POST["DateReg"],
				':Password'	=>	$_POST["Password"],
               

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationAdmin"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbluser
		  SET UserName = :UserName, Email = :Email , DateReg = :DateReg, Password = :Password
			WHERE AdminId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':UserName'	=>	$_POST["UserName"],
				':Email'	=>	$_POST["Email"],
				':DateReg'	=>	$_POST["DateReg"],
				':Password'	=>	$_POST["Password"],
                
				
				':id'			=>	$_POST["AdminId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>