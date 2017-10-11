<?php
include('db.php');
include('functionOrg.php');
if(isset($_POST["OrgId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblorg 
		WHERE OrgId = '".$_POST["OrgId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["OrgCode"] = $row["OrgCode"];
		$output["OrgName"] = $row["OrgName"];
        $output["OrgType"] = $row["OrgType"];
		$output["Description"] = $row["Description"];
        $output["Address"] = $row["Address"];
        $output["City"] = $row["City"];
        $output["State"] = $row["State"];
        $output["ZipCode"] = $row["ZipCode"];
        $output["Phone"] = $row["Phone"];
        $output["AdminId"] = $row["AdminId"];
        $output["AdminPwd"] = $row["AdminPwd"];

	}
	echo json_encode($output);
}
?>