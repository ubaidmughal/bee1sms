<?php
include('db.php');
include('Function.php');
if(isset($_POST["operationQM"]))
{

    if($_POST["operationQM"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblquemaster ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE Chapter LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR BookName LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY QuestionId DESC ';
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
            $sub_array[] = $row["Chapter"];
            $sub_array[] = $row["BookName"];
            $sub_array[] = $row["QuestionType"];
            $sub_array[] = $row["QuestionString"];
            $sub_array[] = $row["McqsOption"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["QuestionId"].'" class="btn btn-warning btn-xs update"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["QuestionId"].'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = '';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_QM(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationQM"] == "fetch_single_record")
	{
        if(isset($_POST["QuestionId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblquemaster 
		WHERE QuestionId = '".$_POST["QuestionId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["chapter"] = $row["Chapter"];
                $output["bookname"] = $row["BookName"];
                $output["QuestionType"] = $row["QuestionType"];
                $output["QuestionString"] = $row["QuestionString"];
                $output["McqsOption"] = $row["McqsOption"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationQM"] == "delete")
	{
        if(isset($_POST["QuestionId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblquemaster WHERE QuestionId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["QuestionId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationQM"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblquemaster (Chapter, BookName,QuestionType,QuestionString,McqsOption) 
			VALUES (:Chapter, :BookName,:QuestionType,:QuestionString,:McqsOption)
		");
		$result = $statement->execute(
			array(
				':Chapter'	=>	$_POST["Chapter"],
				':BookName'	=>	$_POST["BookName"],
				':QuestionType'	=>	$_POST["QuestionType"],
				':QuestionString'	=>	$_POST["QuestionString"],
                ':McqsOption'	=>	$_POST["McqsOption"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationQM"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblquemaster 
			SET Chapter = :Chapter, BookName = :BookName , QuestionType = :QuestionType, QuestionString = :QuestionString, McqsOption = :McqsOption
			WHERE QuestionId = :id
			"
		);
		$result = $statement->execute(
			array(
				':Chapter'	=>	$_POST["Chapter"],
				':BookName'	=>	$_POST["BookName"],
				':QuestionType'	=>	$_POST["QuestionType"],
				':QuestionString'	=>	$_POST["QuestionString"],
                ':McqsOption'	=>	$_POST["McqsOption"],
				
				':id'			=>	$_POST["QuestionId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>