<?php
include('../db.php');
include('../Function.php');
if(isset($_POST["operationStudent"]))
{

    if($_POST["operationStudent"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblstudent ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE StudentCode LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR StudentName LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY StudentId DESC ';
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
            $sub_array[] = $row["StudentCode"];
            $sub_array[] = $row["StudentName"];
            $sub_array[] = $row["FamilyGroup"];
            $sub_array[] = $row["Class"];
            $sub_array[] = $row["Section"];
            $sub_array[] = $row["FatherName"];
            $sub_array[] = $row["Age"];
            $sub_array[] = $row["DOB"];
            $sub_array[] = $row["Gender"];
            $sub_array[] = $row["Address"];
            $sub_array[] = $row["ContactPerson"];
            
            $sub_array[] = '<button type="button" name="update" id="'.$row["StudentId"].'" class="btn btn-warning btn-xs updateStudent"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["StudentId"].'" class="btn btn-danger btn-xs deleteStudent"><i class="fa fa-trash-o"></i></button>';
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

    if($_POST["operationStudent"] == "fetch_single_record")
	{
        if(isset($_POST["StudentId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblstudent 
		WHERE StudentId = '".$_POST["StudentId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["StudentCode"] = $row["StudentCode"];
                $output["StudentName"] = $row["StudentName"];
                $output["FamilyGroup"] = $row["FamilyGroup"];
                $output["Class"] = $row["Class"];
                $output["FatherName"] = $row["FatherName"];
                $output["Age"] = $row["Age"];
                $output["DOB"] = $row["DOB"];
                $output["Address"] = $row["Address"];
                $output["ContactPerson"] = $row["ContactPerson"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationStudent"] == "delete")
	{
        if(isset($_POST["StudentId"]))
        {	
            $statement = $connection->prepare("DELETE FROM tblstudent WHERE StudentId = :id");
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["StudentId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

    if($_POST["operationStudent"] == "max_code")
	{
            $output = array();
            $statement = $connection->prepare(
                "SELECT StudentCode FROM tblstudent order by StudentCode desc LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["StudentCode"] = $row["StudentCode"] + 1;
            }
            echo json_encode($output);
    }

	if($_POST["operationStudent"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblstudent (StudentCode, StudentName,FamilyGroup,Class,Section,FatherName,Age,DOB,Gender,Address,ContactPerson) 
			VALUES (:StudentCode, :StudentName,:FamilyGroup,:Class,:Section,:FatherName,:Age,:DOB,:Gender,:Address,:ContactPerson)
		");
		$result = $statement->execute(
			array(
				':StudentCode'	=>	$_POST["StudentCode"],
				':StudentName'	=>	$_POST["StudentName"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
				':Class'	=>	$_POST["Class"],
                ':Section'	=>	$_POST["Section"],
                ':FatherName'	=>	$_POST["FatherName"],
				':Age'	=>	$_POST["Age"],
				':DOB'	=>	$_POST["DOB"],
				':Gender'	=>	$_POST["Gender"],
                ':Address'	=>	$_POST["Address"],
				':ContactPerson'	=>	$_POST["ContactPerson"]

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationStudent"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblstudent 
		  SET StudentCode = :StudentCode, StudentName = :StudentName , FamilyGroup = :FamilyGroup, Class = :Class, Section = :Section, FatherName = :FatherName,Age = :Age,DOB = :DOB,Gender = :Gender,Address = :Address,ContactPerson =:ContactPerson
			WHERE StudentId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':StudentCode'	=>	$_POST["StudentCode"],
				':StudentName'	=>	$_POST["StudentName"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
				':Class'	=>	$_POST["Class"],
                ':Section'	=>	$_POST["Section"],
                ':FatherName'	=>	$_POST["FatherName"],
				':Age'	=>	$_POST["Age"],
				':DOB'	=>	$_POST["DOB"],
				':Gender'	=>	$_POST["Gender"],
                ':Address'	=>	$_POST["Address"],
				':ContactPerson'	=>	$_POST["ContactPerson"],
				
				':id'			=>	$_POST["StudentId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>