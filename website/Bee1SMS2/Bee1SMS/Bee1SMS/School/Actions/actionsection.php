<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationSection"]))
{
    if($_POST["operationSection"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblsections ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE SectionName LIKE "%'.$_POST["search"]["value"].'%" ';
            
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY SectionId DESC ';
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
            $sub_array[] = $row["SectionName"];

            $sub_array[] = '<button type="button" name="update" id="'.$row["SectionId"].'" class="btn btn-warning btn-xs updateSection"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["SectionId"].'" class="btn btn-danger btn-xs deleteSection"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_section(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationSection"] == "fetch_single_record")
	{
        if(isset($_POST["SectionId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblsections 
		WHERE SectionId = '".$_POST["SectionId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["SectionName"] = $row["SectionName"];
                
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationSection"] == "delete")
	{
        if(isset($_POST["SectionId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblsections WHERE SectionId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["SectionId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationSection"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblsections (SectionName) 
			VALUES (:SectionName)
		");
		$result = $statement->execute(
			array(
				':SectionName'	=>	$_POST["SectionName"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSection"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblsections 
			SET SectionName = :SectionName
			WHERE SectionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SectionName'	=>	$_POST["SectionName"],
			
				
				':id'			=>	$_POST["SectionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>