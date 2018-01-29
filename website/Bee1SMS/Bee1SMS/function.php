<?php

function upload_image()
{
	if(isset($_FILES["SchoolLogo"]))
	{
		
		$new_name =  $_FILES['SchoolLogo']['name'];
		
		move_uploaded_file($_FILES['SchoolLogo']['tmp_name']);
		return $new_name;
	}
}

function get_image_name($SchoolId)
{
	include('db.php');
	$statement = $connection->prepare("SELECT Logo FROM tblschoolinfo WHERE SchoolId = '$SchoolId'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["Logo"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblschoolinfo");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>