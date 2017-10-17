<?php
include('db.php');
include('functionSection.php');
if(isset($_POST["SectionId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblsections 
		WHERE SectionId = '".$_POST["SectionId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["SectionName"] = $row["SectionName"];
		
       
	}
	echo json_encode($output);
}
?>