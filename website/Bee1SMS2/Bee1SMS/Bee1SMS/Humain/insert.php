<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

 if($_POST["operation"] == "max_code")
	{
            $output = array();
            $statement = $connection->prepare(
                "SELECT EmpCode FROM tblhresources order by EmpCode desc"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["EmpCode"] = $row["EmpCode"] + 1;
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