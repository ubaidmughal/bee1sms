<?php


function get_total_all_records_school()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblschoolinfo");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_activity()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblactivities");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_section()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblsections");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_subject()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblsubject");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


function get_total_all_records_ClassSubject()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblclasssubject");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_class()
{
    include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblclasses");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_schedule()
{
	include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblclassschedule");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>