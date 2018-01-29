<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationFamily"]))
{

    if($_POST["operationFamily"] == "fetch")
    {
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblfamilygroup ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE familyCode LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR FamilyName LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY FamilyId DESC ';
        }
        if($_POST["length"] != -1)
        {
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row)
        {
            $sub_array = array();
            $sub_array[] = $row["FamilyName"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["FamilyId"].'" class="btn btn-warning btn-xs updateFamily"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["FamilyId"].'" class="btn btn-danger btn-xs deleteFamily"><i class="fa fa-trash-o"></i></button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_family(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationFamily"] == "fetch_single_record")
    {
        if(isset($_POST["FamilyId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblfamilygroup 
		WHERE FamilyId = '".$_POST["FamilyId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["FamilyCode"] = $row["FamilyCode"];
                $output["FamilyName"] = $row["FamilyName"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationFamily"] == "delete")
    {
        if(isset($_POST["FamilyId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblfamilygroup WHERE FamilyId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id' => $_POST["FamilyId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

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