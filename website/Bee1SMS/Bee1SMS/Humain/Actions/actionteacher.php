<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../function.php');
if(isset($_POST["operation"]))
{

    if($_POST["operation"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM teachertimetable ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE TeacherName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Class LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY TTimeId DESC ';
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
            $sub_array[] = $row["TeacherName"];
            $sub_array[] = $row["Class"];
            $sub_array[] = $row["SubjectName"];
            $sub_array[] = $row["Days"];
            $sub_array[] = $row["FromTime"];
            $sub_array[] = $row["ToTime"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["TTimeId"].'" class="btn btn-warning btn-xs update"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["TTimeId"].'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button>';
            $sub_array[] = '';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operation"] == "fetch_single_record")
	{
        if(isset($_POST["TTimeId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM teachertimetable 
		WHERE TTimeId = '".$_POST["TTimeId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["TeacherName"] = $row["TeacherName"];
                $output["Class"] = $row["Class"];
                $output["SubjectName"] = $row["SubjectName"];
                $output["Days"] = $row["Days"];
                $output["FromTime"] = $row["FromTime"];
                $output["ToTime"] = $row["ToTime"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operation"] == "delete")
	{
        if(isset($_POST["TTimeId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM teachertimetable WHERE TTimeId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["TTimeId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

    

	if($_POST["operation"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO teachertimetable (TeacherName,Class,SubjectName,Days,FromTime,ToTime) 
			VALUES (:TeacherName,:Class,:SubjectName,:Days,:FromTime,:ToTime)
		");
		$result = $statement->execute(
			array(
				':TeacherName'	=>	$_POST["TeacherName"],
				':Class'	=>	$_POST["Class"],
                ':SubjectName'	=>	$_POST["SubjectName"],
                ':Days'	=>	$_POST["Days"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"]

				
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE teachertimetable 
			SET TeacherName = :TeacherName,Class=:Class,SubjectName=:SubjectName,Days=:Days,FromTime=:FromTime,ToTime=:ToTime
			WHERE TTimeId = :id
			"
		);
		$result = $statement->execute(
			array(
				':TeacherName'	=>	$_POST["TeacherName"],
				':Class'	=>	$_POST["Class"],
                ':SubjectName'	=>	$_POST["SubjectName"],
                ':Days'	=>	$_POST["Days"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"],
				
				':id'			=>	$_POST["TTimeId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>