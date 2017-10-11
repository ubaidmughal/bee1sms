<?php
include('db.php');
include('functionContact.php');
if(isset($_POST["operationContact"]))
{
	if($_POST["operationContact"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblcontacts (ContactType, Name,Address,Phone,Email,DOB,TimeOfContact,WayOfContact,Profession) 
			VALUES (:ContactType, :Name,:Address,:Phone,:Email,:DOB,:TimeOfContact,:WayOfContact,:Profession)
		");
		$result = $statement->execute(
			array(
				':ContactType'	=>	$_POST["ContactType"],
				':Name'	=>	$_POST["Name"],
				':Address'	=>	$_POST["Address"],
				':Phone'	=>	$_POST["Phone"],
                ':Email'	=>	$_POST["Email"],
                ':DOB'	=>	$_POST["DOB"],
                ':TimeOfContact'	=>	$_POST["TimeOfContact"],
                ':WayOfContact'	=>	$_POST["WayOfContact"],
                ':Profession'	=>	$_POST["Profession"]

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationContact"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblcontacts 
			SET ContactType = :ContactType, Name = :Name , Address = :Address, Phone = :Phone,Email = :Email,DOB =:DOB,TimeOfContact = :TimeOfContact,WayOfContact = :WayOfContact,Profession = :Profession
			WHERE ContactId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ContactType'	=>	$_POST["ContactType"],
				':Name'	=>	$_POST["Name"],
                ':Address'	=>	$_POST["Address"],
                ':Phone'	=>	$_POST["Phone"],
                ':Email'	=>	$_POST["Email"],
                ':DOB'	=>	$_POST["DOB"],
                ':TimeOfContact'	=>	$_POST["TimeOfContact"],
                ':WayOfContact'	=>	$_POST["WayOfContact"],
                ':Profession'	=>	$_POST["Profession"],
				
				':id'			=>	$_POST["ContactId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>