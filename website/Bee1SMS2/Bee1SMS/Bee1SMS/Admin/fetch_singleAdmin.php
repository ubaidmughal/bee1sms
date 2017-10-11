<?php
include('db.php');
include('functionAdmin.php');
if(isset($_POST["AdminId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbluser 
		WHERE AdminId = '".$_POST["AdminId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["UserName"] = $row["UserName"];
		$output["Email"] = $row["Email"];
        $output["DateReg"] = $row["DateReg"];
		$output["Password"] = $row["Password"];
      
	}
	echo json_encode($output);
}
?>