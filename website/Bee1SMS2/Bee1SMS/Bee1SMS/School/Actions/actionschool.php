<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationschool"]))
{
	if($_POST["operationschool"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
        
          
        
		$statement = $connection->prepare("
			INSERT INTO tblschoolinfo (SchoolName, Reg,Address,latitude,longitude) 
			VALUES (:SchoolName, :Reg,:Address,:Latitude,:Longitude)
		");
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Address'	=>	$_POST["Address"],
				':Latitude'	=>	$_POST["Latitude"],
                ':Longitude'	=>	$_POST["Longitude"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationschool"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblschoolinfo 
			SET SchoolName = :SchoolName, Reg = :Reg , Address = :Address, Latitude = :Latitude,Longitude = :Longitude
			WHERE SchoolId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Address'	=>	$_POST["Address"],
				':Latitude'	=>	$_POST["Latitude"],
                ':Longitude'	=>	$_POST["Longitude"],
				
				':id'			=>	$_POST["SchoolId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}

    if($_POST["operationschool"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblschoolinfo ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE SchoolName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Reg LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY SchoolId DESC ';
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
            $sub_array[] = $row["SchoolName"];
            $sub_array[] = $row["Reg"];
            $sub_array[] = $row["Address"];
            $sub_array[] = $row["latitude"];
            $sub_array[] = $row["longitude"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["SchoolId"].'" class="btn btn-warning btn-xs updateSchool"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["SchoolId"].'" class="btn btn-danger btn-xs deleteSchool"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_school(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationschool"] == "fetch_single_record")
	{
        if(isset($_POST["SchoolId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblschoolinfo 
		WHERE SchoolId = '".$_POST["SchoolId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["SchoolName"] = $row["SchoolName"];
                $output["Reg"] = $row["Reg"];
                $output["Address"] = $row["Address"];
                $output["Latitude"] = $row["latitude"];
                $output["Longitude"] = $row["longitude"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationschool"] == "delete")
	{
        if(isset($_POST["SchoolId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblschoolinfo WHERE SchoolId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["SchoolId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }
}

?>