<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblteachers (teachercontact, teacherqualification) 
			VALUES (:teacher_contact, :teacher_qualification)
		");
		$result = $statement->execute(
			array(
				':teacher_contact'	=>	$_POST["teacher_contact"],
				':teacher_qualification'	=>	$_POST["teacher_qualification"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblteachers 
			SET teachercontact = :teacher_contact, teacherqualification = :teacher_qualification 
			WHERE TId = :id
			"
		);
		$result = $statement->execute(
			array(
				':teacher_contact'	=>	$_POST["teacher_contact"],
				':teacher_qualification'	=>	$_POST["teacher_qualification"],
				
				':id'			=>	$_POST["TId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>