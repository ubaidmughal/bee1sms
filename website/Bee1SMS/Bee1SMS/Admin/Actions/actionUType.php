<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationUType"]))
{

    if($_POST["operationUType"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblutype ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE UserType LIKE "%'.$_POST["search"]["value"].'%" ';
            
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY UTypeId DESC ';
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
            $sub_array[] = $row["UserType"];
           
            $sub_array[] = '<button type="button" name="update" id="'.$row["UTypeId"].'" class="btn btn-warning btn-xs updateUType"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["UTypeId"].'" class="btn btn-danger btn-xs deleteUType"><i class="fa fa-trash-o"></i></button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_UType(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    if($_POST["operationUType"] == "fetch_single_record")
	{
        if(isset($_POST["UTypeId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblutype 
		WHERE UTypeId = '".$_POST["UTypeId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["UserType"] = $row["UserType"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationUType"] == "delete")
	{
        if(isset($_POST["UTypeId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblutype WHERE UTypeId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["UTypeId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationUType"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblutype (UserType) 
			VALUES (:UserType)
		");
		$result = $statement->execute(
			array(
				':UserType'	=>	$_POST["UserType"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationUType"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblutype
		  SET UserType = :UserType
			WHERE UTypeId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':UserType'	=>	$_POST["UserType"],
				':id'			=>	$_POST["UTypeId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>