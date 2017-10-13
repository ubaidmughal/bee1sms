<?php

function get_total_all_records_BM()
{
    include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblbookmaster");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_QM()
{
    include('db.php');
	$statement = $connection->prepare("SELECT * FROM tblquemaster");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>