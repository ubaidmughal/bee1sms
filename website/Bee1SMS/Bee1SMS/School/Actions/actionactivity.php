<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationActivity"]))
{

    if($_POST["operationActivity"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblactivities ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE ActivityName LIKE "%'.$_POST["search"]["value"].'%" ';
              
            $query .= 'OR ActivityDate LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR ActivityDescription LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY ActivityId DESC ';
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
            //$image = '';
            //if($row["image"] != '')
            //{
            //    $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
            //}
            //else
            //{
            //    $image = '';
            //}
            $sub_array = array();
            //$sub_array[] = $image;
            $sub_array[] = $row["ActivityName"];
            $sub_array[] = $row["ActivityDate"];
            $sub_array[] = $row["ActivityDescription"];
            
            $sub_array[] = '<button type="button" name="update" id="'.$row["ActivityId"].'" class="btn btn-warning btn-xs updateActivity"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["ActivityId"].'" class="btn btn-danger btn-xs deleteActivity"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_activity(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationActivity"] == "fetch_single_record")
	{
        if(isset($_POST["ActivityId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblactivities 
		WHERE ActivityId = '".$_POST["ActivityId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["ActivityName"] = $row["ActivityName"];
                $output["ActivityDate"] = $row["ActivityDate"];
                $output["ActivityDescription"] = $row["ActivityDescription"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationActivity"] == "delete")
	{
        if(isset($_POST["ActivityId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblactivities WHERE ActivityId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["ActivityId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationActivity"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblactivities (ActivityName,ActivityDate, ActivityDescription) 
			VALUES (:ActivityName, :ActivityDate,:ActivityDescription)
		");
		$result = $statement->execute(
			array(
				':ActivityName'	=>	$_POST["ActivityName"],
                ':ActivityDate'	=>	$_POST["ActivityDate"],
				':ActivityDescription'	=>	$_POST["ActivityDescription"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationActivity"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblactivities 
			SET ActivityName = :ActivityName,ActivityDate=:ActivityDate, ActivityDescription = :ActivityDescription 
			WHERE ActivityId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ActivityName'	=>	$_POST["ActivityName"],
                ':ActivityDate'	=>	$_POST["ActivityDate"],
				':ActivityDescription'	=>	$_POST["ActivityDescription"],
                
				
				':id'			=>	$_POST["ActivityId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>