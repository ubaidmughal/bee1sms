<?php
include('db.php');
include('functionStudent.php');
if(isset($_POST["operationFamily"]))
{

    if($_POST["operationFamily"] == "getnames")
    {
        if(isset($_POST["FamilyName"]))
        {
            $query = '';
            $output = array();
            $query .= "SELECT * FROM tblstudent where FamilyGroup = '".$_POST["FamilyName"]."'";
            //if($_POST["length"] != -1)
                $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $data = array();
            //$filtered_rows = $statement->rowCount();
            foreach($result as $row)
            {
                $sub_array = array();            
                $sub_array[] = $row["StudentName"];
                $sub_array[] = $row["FamilyGroup"];
                $data[] = $sub_array;
            }
            $output = array(
                "draw"				=>	intval($_POST["draw"]),
                //"recordsTotal"		=> 	$filtered_rows,
                //"recordsFiltered"	=>	get_total_all_familystudents(),
                "data"				=>	$data
            );
            echo json_encode($output);
        }
    }

	if($_POST["operationFamily"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblfamilygroup (FamilyCode, FamilyName) 
			VALUES (:FamilyCode, :FamilyName)
		");
		$result = $statement->execute(
			array(
				':FamilyCode'	=>	$_POST["FamilyCode"],
				':FamilyName'	=>	$_POST["FamilyName"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationFamily"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblfamilygroup 
		  SET FamilyCode = :FamilyCode, FamilyName = :FamilyName
			WHERE FamilyId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':FamilyCode'	=>	$_POST["FamilyCode"],
				':FamilyName'	=>	$_POST["FamilyName"],
				':id'			=>	$_POST["FamilyId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>