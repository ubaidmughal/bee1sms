<?php
include('db.php');
include('functionSchedule.php');
if(isset($_POST["operationSch"]))
{
	if($_POST["operationSch"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblclssecschedule (FromTime, ToTime,Occurs,TeacherSubject) 
			VALUES (:FromTime, :ToTime,:Occurs,:TeacherSubject)
		");
		$result = $statement->execute(
			array(
				':FromTime'	=>	$_POST["FromTime"],
				':ToTime'	=>	$_POST["ToTime"],
				':Occurs'	=>	$_POST["Occurs"],
				':TeacherSubject'	=>	$_POST["TeacherSubject"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSch"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblclssecschedule 
			SET FromTime = :FromTime, ToTime = :ToTime , Occurs = :Occurs, TeacherSubject = :TeacherSubject
			WHERE ClassSectionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':FromTime'	=>	$_POST["FromTime"],
				':ToTime'	=>	$_POST["ToTime"],
                ':Occurs'	=>	$_POST["Occurs"],
                ':TeacherSubject'	=>	$_POST["TeacherSubject"],
				
				':id'			=>	$_POST["ClassSectionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>