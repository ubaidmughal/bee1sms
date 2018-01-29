<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationSchedule"]))
{

    if($_POST["operationSchedule"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblclassschedule ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE Class LIKE "%'.$_POST["search"]["value"].'%" ';
            
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY ScheduleId DESC ';
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
            $sub_array[] = $row["Class"];
            $sub_array[] = $row["Section"];
            $sub_array[] = $row["Day"];
            $sub_array[] = $row["FromTime"];
            $sub_array[] = $row["ToTime"];
            $sub_array[] = $row["Subject"];
            $sub_array[] = $row["Teacher"];
            
            $sub_array[] = '<button type="button" name="update" id="'.$row["ScheduleId"].'" class="btn btn-warning btn-xs updateSchedule"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["ScheduleId"].'" class="btn btn-danger btn-xs deleteSchedule"><i class="fa fa-trash-o"></i></button>';
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

    if($_POST["operationSchedule"] == "fetch_single_record")
	{
        if(isset($_POST["ScheduleId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblclassschedule
		WHERE ScheduleId = '".$_POST["ScheduleId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["Class"] = $row["Class"];
                $output["Section"] = $row["Section"];
                $output["Day"] = $row["Day"];
                $output["FromTime"] = $row["FromTime"];
                $output["ToTime"] = $row["ToTime"];
                $output["Subject"] = $row["Subject"];
                $output["Teacher"] = $row["Teacher"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationSchedule"] == "delete")
	{
        if(isset($_POST["ScheduleId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblclassschedule WHERE ScheduleId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["ScheduleId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationSchedule"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblclassschedule (Class,Section,Day,FromTime,ToTime,Subject,Teacher) 
			VALUES (:Class,:Section,:Day,:FromTime,:ToTime,:Subject,:Teacher)
		");
		$result = $statement->execute(
			array(
				':Class'	=>	$_POST["Class"],
                ':Section'	=>	$_POST["Section"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"],
                ':Day'	=>	$_POST["Day"],
                ':Subject'	=>	$_POST["Subject"],
                ':Teacher'	=>	$_POST["Teacher"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSchedule"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblclassschedule 
			SET Class = :Class,Section = :Section,Day = :Day,FromTime = :FromTime,ToTime = :ToTime,Subject = :Subject,Teacher = :Teacher
			WHERE ScheduleId = :id
			"
		);
		$result = $statement->execute(
			array(
				
				':Class'	=>	$_POST["Class"],
                ':Section'	=>	$_POST["Section"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"],
                ':Day'	=>	$_POST["Day"],
                ':Subject'	=>	$_POST["Subject"],
                ':Teacher'	=>	$_POST["Teacher"],
			
				
				':id'			=>	$_POST["ScheduleId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>