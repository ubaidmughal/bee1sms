<?php

function get_total_all_records_school()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblschoolinfo");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_activity()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblactivities");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_section()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblsections");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_subject()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblsubject");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_class()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblclasses");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_schedule()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblclssecschedule");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>