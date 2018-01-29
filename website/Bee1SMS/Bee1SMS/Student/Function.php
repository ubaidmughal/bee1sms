<?php



function upload_document()
{
	if(isset($_FILES["Post_image"]))
	{
		
		$new_name =  $_FILES['Post_image']['name'];
		$destination = '' . $new_name;
		move_uploaded_file($_FILES['Post_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_document_name($Post_id)
{
	include('db.php');
	$statement = $connection->prepare("SELECT Image FROM tblpost WHERE PostId = '$Post_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["Image"];
	}
}
function get_total_all_records()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblstudent");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_family()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblfamilygroup");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_schedule()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblclassschedule");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


?>