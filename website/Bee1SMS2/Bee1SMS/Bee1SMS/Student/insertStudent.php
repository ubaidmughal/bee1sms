<?php
include('db.php');
include('functionStudent.php');
if(isset($_POST["operationStudent"]))
{
	if($_POST["operationStudent"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblstudent (StudentCode, StudentName,FamilyGroup,Class,FatherName,Age,DOB,Gender,Address,ContactPerson) 
			VALUES (:StudentCode, :StudentName,:FamilyGroup,:Class,:FatherName,:Age,:DOB,:Gender,:Address,:ContactPerson)
		");
		$result = $statement->execute(
			array(
				':StudentCode'	=>	$_POST["StudentCode"],
				':StudentName'	=>	$_POST["StudentName"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
				':Class'	=>	$_POST["Class"],
                ':FatherName'	=>	$_POST["FatherName"],
				':Age'	=>	$_POST["Age"],
				':DOB'	=>	$_POST["DOB"],
				':Gender'	=>	$_POST["Gender"],
                ':Address'	=>	$_POST["Address"],
				':ContactPerson'	=>	$_POST["ContactPerson"]

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationStudent"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblstudent 
		  SET StudentCode = :StudentCode, StudentName = :StudentName , FamilyGroup = :FamilyGroup, Class = :Class, FatherName = :FatherName,Age = :Age,DOB = :DOB,Gender = :Gender,Address = :Address,ContactPerson =:ContactPerson
			WHERE StudentId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':StudentCode'	=>	$_POST["StudentCode"],
				':StudentName'	=>	$_POST["StudentName"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
				':Class'	=>	$_POST["Class"],
                ':FatherName'	=>	$_POST["FatherName"],
				':Age'	=>	$_POST["Age"],
				':DOB'	=>	$_POST["DOB"],
				':Gender'	=>	$_POST["Gender"],
                ':Address'	=>	$_POST["Address"],
				':ContactPerson'	=>	$_POST["ContactPerson"],
				
				':id'			=>	$_POST["StudentId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>