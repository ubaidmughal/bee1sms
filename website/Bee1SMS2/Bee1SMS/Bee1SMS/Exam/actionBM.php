<?php
include('db.php');
include('Function.php');
if(isset($_POST["operationBM"]))
{

    if($_POST["operationBM"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblbookmaster ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE BookNames LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Author LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY BookId DESC ';
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
            $sub_array[] = $row["BookNames"];
            $sub_array[] = $row["Author"];
            $sub_array[] = $row["Publisher"];
            $sub_array[] = $row["ContactPerson"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["BookId"].'" class="btn btn-warning btn-xs updateBM"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["BookId"].'" class="btn btn-danger btn-xs deleteBM"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_BM(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationBM"] == "fetch_single_record")
	{
        if(isset($_POST["BookId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblbookmaster 
		WHERE BookId = '".$_POST["BookId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["booknames"] = $row["BookNames"];
                $output["author"] = $row["Author"];
                $output["publisher"] = $row["Publisher"];
                $output["contactperson"] = $row["ContactPerson"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationBM"] == "delete")
	{
        if(isset($_POST["BookId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblbookmaster WHERE BookId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["BookId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationBM"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblbookmaster (BookNames, Author,Publisher,ContactPerson) 
			VALUES (:BookNames, :Author,:Publisher,:ContactPerson)
		");
		$result = $statement->execute(
			array(
				':BookNames'	=>	$_POST["BookNames"],
				':Author'	=>	$_POST["Author"],
				':Publisher'	=>	$_POST["Publisher"],
				':ContactPerson'	=>	$_POST["ContactPerson"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationBM"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblbookmaster 
			SET BookNames = :BookNames, Author = :Author , Publisher = :Publisher, ContactPerson = :ContactPerson
			WHERE BookId = :id
			"
		);
		$result = $statement->execute(
			array(
				':BookNames'	=>	$_POST["BookNames"],
				':Author'	=>	$_POST["Author"],
                ':Publisher'	=>	$_POST["Publisher"],
                ':ContactPerson'	=>	$_POST["ContactPerson"],
				
				':id'			=>	$_POST["BookId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>