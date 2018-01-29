<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationClass"]))
{

    if($_POST["operationClass"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblclasses ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE ClassName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR SubjectName LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY ClassId DESC ';
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
            //$sub_array[] = $image;
            $sub_array[] = $row["ClassName"];
      
            $sub_array[] = '<button type="button" name="update" id="'.$row["ClassId"].'" class="btn btn-warning btn-xs updateClass"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["ClassId"].'" class="btn btn-danger btn-xs deleteClass"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_class(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationClass"] == "fetch_single_record")
	{
        if(isset($_POST["ClassId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblclasses 
		WHERE ClassId = '".$_POST["ClassId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["ClassName"] = $row["ClassName"];
              
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationClass"] == "delete")
	{
        if(isset($_POST["ClassId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblclasses WHERE ClassId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["ClassId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationClass"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblclasses (ClassName) 
			VALUES (:ClassName)
		");
		$result = $statement->execute(
			array(
				':ClassName'	=>	$_POST["ClassName"]
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationClass"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblclasses 
			SET ClassName = :ClassName
			WHERE ClassId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ClassName'	=>	$_POST["ClassName"],
				
				
				':id'			=>	$_POST["ClassId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>