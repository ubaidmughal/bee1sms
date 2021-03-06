<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationSubject"]))
{

    if($_POST["operationSubject"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblsubject ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE SubjectName LIKE "%'.$_POST["search"]["value"].'%" ';
            
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY SubjectId DESC ';
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
            $sub_array[] = $row["SubjectName"];

            $sub_array[] = '<button type="button" name="update" id="'.$row["SubjectId"].'" class="btn btn-warning btn-xs updateSubject"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["SubjectId"].'" class="btn btn-danger btn-xs deleteSubject"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_subject(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationSubject"] == "fetch_single_record")
	{
        if(isset($_POST["SubjectId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblsubject
		WHERE SubjectId = '".$_POST["SubjectId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["SubjectName"] = $row["SubjectName"];
                
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationSubject"] == "delete")
	{
        if(isset($_POST["SubjectId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblsubject WHERE SubjectId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["SubjectId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationSubject"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblsubject (SubjectName) 
			VALUES (:SubjectNames)
		");
		$result = $statement->execute(
			array(
				':SubjectNames'	=>	$_POST["SubjectNames"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSubject"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblsubject 
			SET SubjectName = :SubjectNames
			WHERE SubjectId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SubjectNames'	=>	$_POST["SubjectNames"],
			
				
				':id'			=>	$_POST["SubjectId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>