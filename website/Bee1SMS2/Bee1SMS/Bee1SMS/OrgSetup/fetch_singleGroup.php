<?php
include('db.php');
include('functionGroup.php');
if(isset($_POST["GroupId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblmenugroup 
		WHERE GroupId = '".$_POST["GroupId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["GroupCode"] = $row["GroupCode"];
		$output["GroupName"] = $row["GroupName"];
        $output["GroupPosition"] = $row["Position"];
		
	}
	echo json_encode($output);
}
?>