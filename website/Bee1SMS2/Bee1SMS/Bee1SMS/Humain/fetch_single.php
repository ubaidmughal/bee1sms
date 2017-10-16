<?php
include('db.php');
include('function.php');
if(isset($_POST["EmpId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblhresources 
		WHERE EmpId = '".$_POST["EmpId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["EmpCode"] = $row["EmpCode"];
		$output["FirstName"] = $row["FirstName"];
        $output["LastName"] = $row["LastName"];
        $output["JobTitle"] = $row["JobTitle"];
        $output["Designation"] = $row["Designation"];
        $output["HireDate"] = $row["HireDate"];
		
	}
	echo json_encode($output);
}
?>