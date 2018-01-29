<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationDue"]))
{

    if($_POST["operationDue"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblduetype ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE DueType LIKE "%'.$_POST["search"]["value"].'%" ';
            
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY DueId DESC ';
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
            $sub_array[] = $row["DueType"];
          
            $sub_array[] = '<button type="button" name="update" id="'.$row["DueId"].'" class="btn btn-warning btn-xs updateDue"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["DueId"].'" class="btn btn-danger btn-xs deleteDue"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_DUE(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

     if($_POST["operationDue"] == "fetch_single_record")
	{
        if(isset($_POST["DueId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblduetype 
		WHERE DueId = '".$_POST["DueId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["DueTypes"] = $row["DueType"];
               
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationDue"] == "delete")
	{
        if(isset($_POST["DueId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblduetype WHERE DueId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["DueId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationDue"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblduetype (DueType) 
			VALUES (:DueType)
		");
		$result = $statement->execute(
			array(
				':DueType'	=>	$_POST["DueTypes"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationDue"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblduetype 
			SET DueType = :DueType
			WHERE DueId = :id
			"
		);
		$result = $statement->execute(
			array(
				':DueType'	=>	$_POST["DueTypes"],
				
				':id'			=>	$_POST["DueId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>