<?php
include('db.php');
include('functionContact.php');
if(isset($_POST["ContactId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblcontacts 
		WHERE ContactId = '".$_POST["ContactId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["ContactType"] = $row["ContactType"];
		$output["Name"] = $row["Name"];
        $output["Address"] = $row["Address"];
		$output["Phone"] = $row["Phone"];
        $output["Email"] = $row["Email"];
        $output["DOB"] = $row["DOB"];
        $output["TimeOfContact"] = $row["TimeOfContact"];
        $output["WayOfContact"] = $row["WayOfContact"];
        $output["Profession"] = $row["Profession"];
	}
	echo json_encode($output);
}
?>