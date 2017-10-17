<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationAdmin"]))
{

    if($_POST["operationAdmin"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tbluser ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE UserName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Email LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY AdminId DESC ';
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
            $sub_array[] = $row["UserName"];
            $sub_array[] = $row["Email"];
            $sub_array[] = $row["DateReg"]; 
            $sub_array[] = '<button type="button" name="update" id="'.$row["AdminId"].'" class="btn btn-warning btn-xs updateAdmin"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["AdminId"].'" class="btn btn-danger btn-xs deleteAdmin"><i class="fa fa-trash-o"></i></button>';
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

    if($_POST["operationAdmin"] == "fetch_single_record")
	{
        if(isset($_POST["AdminId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tbluser 
		WHERE AdminId = '".$_POST["AdminId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["UserName"] = $row["UserName"];
                $output["Email"] = $row["Email"];
                $output["DateReg"] = $row["DateReg"];
                $output["Password"] = $row["Password"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationAdmin"] == "delete")
	{
        if(isset($_POST["AdminId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tbluser WHERE AdminId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["AdminId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationAdmin"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tbluser (UserName, Email,DateReg,Password) 
			VALUES (:UserName, :Email,:DateReg,:Password)
		");
		$result = $statement->execute(
			array(
				':UserName'	=>	$_POST["UserName"],
				':Email'	=>	$_POST["Email"],
				':DateReg'	=>	$_POST["DateReg"],
				':Password'	=>	$_POST["Password"],
               

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationAdmin"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbluser
		  SET UserName = :UserName, Email = :Email , DateReg = :DateReg, Password = :Password
			WHERE AdminId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':UserName'	=>	$_POST["UserName"],
				':Email'	=>	$_POST["Email"],
				':DateReg'	=>	$_POST["DateReg"],
				':Password'	=>	$_POST["Password"],
                
				
				':id'			=>	$_POST["AdminId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>