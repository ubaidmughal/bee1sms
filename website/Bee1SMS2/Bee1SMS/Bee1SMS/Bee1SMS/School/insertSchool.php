<?php
include('db.php');
include('functionSchool.php');
if(isset($_POST["operationschool"]))
{
	if($_POST["operationschool"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblschoolinfo (SchoolName, Reg,Address,latitude,longitude) 
			VALUES (:SchoolName, :Reg,:Address,:Latitude,:Longitude)
		");
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Address'	=>	$_POST["Address"],
				':Latitude'	=>	$_POST["Latitude"],
                ':Longitude'	=>	$_POST["Longitude"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationschool"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblschoolinfo 
			SET SchoolName = :SchoolName, Reg = :Reg , Address = :Address, Latitude = :Latitude,Longitude = :Longitude
			WHERE SchoolId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Address'	=>	$_POST["Address"],
				':Latitude'	=>	$_POST["Latitude"],
                ':Longitude'	=>	$_POST["Longitude"],
				
				':id'			=>	$_POST["SchoolId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>