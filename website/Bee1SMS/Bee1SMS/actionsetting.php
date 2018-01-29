<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('function.php');
if(isset($_POST["operationSchool"]))
{

    if($_POST["operationSchool"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblschoolinfo ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE SchoolName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Reg LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY SchoolId DESC ';
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
            $image = '';
            if($row["Logo"] != '')
            {
        //        $image = addslashes($_FILES["SchoolLogo"]["tmp_name"]);
        //$image = addslashes($_FILES["SchoolLogo"]["name"]);
        //$image = file_get_content($image);
        //$image = base64_encode($image);
                $image = '<img src="data:image;base64,'.$row["Logo"].'" class="img-thumbnail" width="50" height="15" />';
            }
            else
            {
                $image = '';
            }
            $sub_array = array();
          
            $sub_array[] = $row["SchoolName"];
            $sub_array[] = $row["Reg"];
            $sub_array[] = $row["Phone"];
            $sub_array[] = $row["FromTime"];
            $sub_array[] = $row["ToTime"];
            $sub_array[] = $row["Address"];
            $sub_array[] = $image;
            $sub_array[] = '<button type="button" name="update" id="'.$row["SchoolId"].'" class="btn btn-warning btn-xs updateschool"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["SchoolId"].'" class="btn btn-danger btn-xs deleteschool"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = ;
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

    if($_POST["operationSchool"] == "fetch_single_record")
	{
        if(isset($_POST["SchoolId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblschoolinfo 
		WHERE SchoolId = '".$_POST["SchoolId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["SchoolName"] = $row["SchoolName"];
                $output["Reg"] = $row["Reg"];
                $output["Phone"] = $row["Phone"];
                $output["FromTime"] = $row["FromTime"];
                $output["ToTime"] = $row["ToTime"];
                $output["Address"] = $row["Address"];
                if($row["Logo"] != '')
                {
                    $output['SchoolLogo'] = '<img src="data:image;base64,'.$row["Logo"].'" class="img-thumbnail" width="50" /><input type="hidden" name="hidden_Post_image" value="'.$row["Logo"].'" />';
                }
                else
                {
                    $output['SchoolLogo'] = '<input type="hidden" name="hidden_Post_image" id="hidden_Post_image" value="" />';
                }
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationSchool"] == "delete")
	{
        if(isset($_POST["SchoolId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblschoolinfo WHERE SchoolId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["SchoolId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationSchool"] == "Add")
	{
        $image = addslashes($_FILES['SchoolLogo']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        //if($_FILES["SchoolLogo"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblschoolinfo (SchoolName, Reg,Logo,Address,Phone,FromTime,ToTime) 
			VALUES (:SchoolName,:Reg,:Logo,:Address,:Phone,:FromTime,:ToTime)
		");
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Logo'	=>	$image,
				':Address'	=>	$_POST["Address"],
                ':Phone'	=>	$_POST["Phone"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"],

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationSchool"] == "Edit")
	{
        if($_FILES['SchoolLogo']['name'] != '')
        {
        $image = addslashes($_FILES['SchoolLogo']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        }
        else
        {
            $image = $_POST['hidden_Post_image'];
        }
		$statement = $connection->prepare(
			"UPDATE tblschoolinfo 
			SET SchoolName = :SchoolName, Reg = :Reg , Logo = :Logo, Address = :Address,Phone=:Phone,FromTime=:FromTime,ToTime=:ToTime
			WHERE SchoolId = :id
			"
		);
		$result = $statement->execute(
			array(
				':SchoolName'	=>	$_POST["SchoolName"],
				':Reg'	=>	$_POST["Reg"],
				':Logo'	=>	$image,
				':Address'	=>	$_POST["Address"],
                ':Phone'	=>	$_POST["Phone"],
                ':FromTime'	=>	$_POST["FromTime"],
                ':ToTime'	=>	$_POST["ToTime"],
				
				':id'			=>	$_POST["SchoolId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>