<?php

function get_total_all_records_DUE()
{
    include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblduetype");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_FeePay()
{
    include($_SERVER['DOCUMENT_ROOT'].'/db.php');
	$statement = $connection->prepare("SELECT * FROM tblfeepayable");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>