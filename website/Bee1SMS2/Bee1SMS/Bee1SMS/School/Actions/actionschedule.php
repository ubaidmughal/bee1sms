<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationSch"]))
{

    if($_POST["operationSch"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblclssecschedule ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE FromTime LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR ToTime LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY ClassSectionId DESC ';
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
            $sub_array[] = $row["FromTime"];
            $sub_array[] = $row["ToTime"];
            $sub_array[] = $row["Occurs"];
            $sub_array[] = $row["TeacherSubject"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["ClassSectionId"].'" class="btn btn-warning btn-xs updateSch"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["ClassSectionId"].'" class="btn btn-danger btn-xs deleteSch"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_schedule(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationSch"] == "fetch_single_record")
	{
        if(isset($_POST["ClassSectionId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblclssecschedule 
		WHERE ClassSectionId = '".$_POST["ClassSectionId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["FromTime"] = $row["FromTime"];
                $output["ToTime"] = $row["ToTime"];
                $output["Occurs"] = $row["Occurs"];
                $output["TeacherSubject"] = $row["TeacherSubject"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationSch"] == "delete")
	{
        if(isset($_POST["ClassSectionId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblclssecschedule WHERE ClassSectionId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["ClassSectionId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationSch"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblclssecschedule (FromTime, ToTime,Occurs,TeacherSubject) 
			VALUES (:FromTime, :ToTime,:Occurs,:TeacherSubject)
		");
		$result = $statement->execute(
			array(
				':FromTime'	=>	$_POST["FromTime"],
				':ToTime'	=>	$_POST["ToTime"],
				':Occurs'	=>	$_POST["Occurs"],
				':TeacherSubject'	=>	$_POST["TeacherSubject"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSch"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblclssecschedule 
			SET FromTime = :FromTime, ToTime = :ToTime , Occurs = :Occurs, TeacherSubject = :TeacherSubject
			WHERE ClassSectionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':FromTime'	=>	$_POST["FromTime"],
				':ToTime'	=>	$_POST["ToTime"],
                ':Occurs'	=>	$_POST["Occurs"],
                ':TeacherSubject'	=>	$_POST["TeacherSubject"],
				
				':id'			=>	$_POST["ClassSectionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>