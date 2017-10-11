<?php
include('db.php');
include('functionMenu.php');
if(isset($_POST["MenuId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblmenus 
		WHERE MenuId = '".$_POST["MenuId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["MenuCode"] = $row["MenuCode"];
		$output["MenuName"] = $row["MenuName"];
        $output["MenuType"] = $row["MenuType"];
        $output["GroupCode"] = $row["GroupCode"];
		$output["Position"] = $row["Position"];
        $output["Title"] = $row["Title"];
        $output["Detail"] = $row["Detail"];
	}
	echo json_encode($output);
}
?>