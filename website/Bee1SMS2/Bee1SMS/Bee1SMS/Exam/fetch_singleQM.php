<?php
include('db.php');
include('functionQM.php');
if(isset($_POST["QuestionId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblquemaster 
		WHERE QuestionId = '".$_POST["QuestionId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["chapter"] = $row["Chapter"];
		$output["bookname"] = $row["BookName"];
        $output["QuestionType"] = $row["QuestionType"];
		$output["QuestionString"] = $row["QuestionString"];
        $output["McqsOption"] = $row["McqsOption"];
	}
	echo json_encode($output);
}
?>