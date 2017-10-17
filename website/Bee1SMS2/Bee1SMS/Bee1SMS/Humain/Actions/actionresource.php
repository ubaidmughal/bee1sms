<?php
include('../db.php');
include('../function.php');
if(isset($_POST["operation"]))
{

    if($_POST["operation"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblhresources ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE FirstName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR LastName LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY EmpId DESC ';
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
            $sub_array[] = $row["EmpCode"];
            $sub_array[] = $row["FirstName"];
            $sub_array[] = $row["LastName"];
            $sub_array[] = $row["JobTitle"];
            $sub_array[] = $row["Designation"];
            $sub_array[] = $row["HireDate"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["EmpId"].'" class="btn btn-warning btn-xs update"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["EmpId"].'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button>';
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
        if(isset($_POST["EmpId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblhresources 
		WHERE EmpId = '".$_POST["EmpId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["EmpCode"] = $row["EmpCode"];
                $output["FirstName"] = $row["FirstName"];
                $output["LastName"] = $row["LastName"];
                $output["JobTitle"] = $row["JobTitle"];
                $output["Designation"] = $row["Designation"];
                $output["HireDate"] = $row["HireDate"];
                
            }
            echo json_encode($output);
        }
    }

    if($_POST["operation"] == "delete")
	{
        if(isset($_POST["EmpId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblhresources WHERE EmpId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["EmpId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

    if($_POST["operation"] == "max_code")
	{
            $output = array();
            $statement = $connection->prepare("select EmpCode from tblhresources order by EmpCode desc limit 1");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output['EmpCode'] = $row['EmpCode'] + 1;
            }
            echo json_encode($output);
    }

	if($_POST["operation"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblhresources (EmpCode,FirstName,LastName,JobTitle,Designation,HireDate) 
			VALUES (:EmpCode,:FirstName,:LastName,:JobTitle,:Designation,:HireDate)
		");
		$result = $statement->execute(
			array(
				':EmpCode'	=>	$_POST["EmpCode"],
				':FirstName'	=>	$_POST["FirstName"],
                ':LastName'	=>	$_POST["LastName"],
                ':JobTitle'	=>	$_POST["JobTitle"],
                ':Designation'	=>	$_POST["Designation"],
                ':HireDate'	=>	$_POST["HireDate"]

				
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
			"UPDATE tblhresources 
			SET EmpCode = :EmpCode,FirstName=:FirstName,LastName=:LastName,JobTitle=:JobTitle,Designation=:Designation,HireDate=:HireDate
			WHERE EmpId = :id
			"
		);
		$result = $statement->execute(
			array(
				':EmpCode'	=>	$_POST["EmpCode"],
				':FirstName'	=>	$_POST["FirstName"],
                ':LastName'	=>	$_POST["LastName"],
                ':JobTitle'	=>	$_POST["JobTitle"],
                ':Designation'	=>	$_POST["Designation"],
                ':HireDate'	=>	$_POST["HireDate"],
				
				':id'			=>	$_POST["EmpId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>