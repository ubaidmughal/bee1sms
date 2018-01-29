<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
include('../Function.php');
if(isset($_POST["operationFeePay"]))
{

    if($_POST["operationFeePay"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblfeepayable ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE DocNumber LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR GRNO LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY DocEntry DESC ';
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
             $sub_array[] = $row["DocEntry"];
            $sub_array[] = $row["DocNumber"];
            $sub_array[] = $row["GRNO"];
            $sub_array[] = $row["DueType"];
            $sub_array[] = $row["PayableAmount"];
            $sub_array[] = $row["PaidAmount"];
             $sub_array[] = $row["DueDate"];
              $sub_array[] = $row["DocDate"];

            $sub_array[] = '<button type="button" name="update" id="'.$row["DocEntry"].'" class="btn btn-warning btn-xs update"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["DocEntry"].'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button>';
            //$sub_array[] = '';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	get_total_all_records_FeePay(),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    
     if($_POST["operationFeePay"] == "getnames")
    {
        if(isset($_POST["Section"]))
        {
        
            $output = array();
            $query = "SELECT * FROM tblstudent where Section = '".$_POST["Section"]."'";
            $sql = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($sql))
            {
            array_push($output,$row['StudentName']);
            
            }
            echo json_encode($output);
          
        }
    }

      if($_POST["operationFeePay"] == "getsection")
    {
        if(isset($_POST["Class"]))
        {
        
            $output = array();
            $query = "SELECT * FROM tblstudent where ClassAdmit = '".$_POST["Class"]."'";
            $sql = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($sql))
            {
            array_push($output,$row['Section']);
            
            }
            echo json_encode($output);
          
        }
    }


   if($_POST["operationFeePay"] == "max_code")
	{
             $output = array();
            $query = "SELECT * FROM tblfeepayable order by DocNumber desc LIMIT 1";
            $sql = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($sql);
            if(empty($row))
            {
                $output["DocNumber"] = 1;
            }
            else
            {
                $output["DocNumber"] = $row['DocNumber'] + 1;
            }
            echo json_encode($output);
    }
    if($_POST["operationFeePay"] == "fetch_single_record")
	{
        if(isset($_POST["DocEntry"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblfeepayable 
		WHERE DocEntry = '".$_POST["DocEntry"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["DocEntry"] = $row["DocEntry"];
                $output["DocNumber"] = $row["DocNumber"];
                $output["Class"] = $row["Class"];
                 $output["Section"] = $row["Section"];
                  $output["StudentName"] = $row["StudentName"];
                $output["DueType"] = $row["DueType"];
                $output["PayableAmount"] = $row["PayableAmount"];
                $output["PaidAmount"] = $row["PaidAmount"];
                $output["DueDate"] = $row["DueDate"];
                $output["DocDate"] = $row["DocDate"];
                $output["CreatedBy"] = $row["CreatedBy"];
                $output["CreatedDate"] = $row["CreatedDate"];
                $output["UpdatedBy"] = $row["UpdatedBy"];
                $output["UpdatedDate"] = $row["UpdatedDate"];
            }
            echo json_encode($output);
        }
    }

    if($_POST["operationFeePay"] == "delete")
	{
        if(isset($_POST["DocEntry"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblfeepayable WHERE DocEntry = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["DocEntry"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationFeePay"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
        $docdate =  date("Y/m/d");
        $CreateDate = date("Y/m/d");
        $Createdy = $_SESSION['UName'];
		$statement = $connection->prepare("
			INSERT INTO tblfeepayable (DocNumber,Class,Section,StudentName,DueType,PayableAmount,PaidAmount,DueDate,DocDate,CreatedBy,CreatedDate) 
			VALUES (:DocNumber,:Class,:Section,:StudentName,:DueType,:PayableAmount,:PaidAmount,:DueDate,:DocDate,:CreatedBy,:CreatedDate)
		");
		$result = $statement->execute(
			array(
				':DocNumber'	=>	$_POST["DocNumber"],
				':Class'	=>	$_POST["Class"],
                ':Section'	=>	$_POST["Section"],
                ':StudentName'	=>	$_POST["StudentName"],
				':DueType'	=>	$_POST["DueType"],
				':PayableAmount'	=>	$_POST["PayableAmount"],
                ':PaidAmount'	=>	$_POST["PaidAmount"],
                ':DueDate'	=>	$_POST["DueDate"],
                ':DocDate'	=>	$docdate,
                ':CreatedBy'	=>	$Createdy,
                ':CreatedDate'	=>	$CreateDate,


			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationFeePay"] == "Edit")
	{
    $docdate =  date("Y/m/d");
		$UpdatedDate= date("Y/m/d");
        $UpdateBy =$_SESSION['UName'];
		$statement = $connection->prepare(
			"UPDATE tblfeepayable 
			SET DocNumber = :DocNumber, GRNO = :GRNO , DueType = :DueType, PayableAmount = :PayableAmount, PaidAmount = :PaidAmount,DueDate = :DueDate,DocDate = :DocDate,UpdatedBy = :UpdatedBy,UpdatedDate = :UpdatedDate
			WHERE DocEntry = :id
			"
		);
		$result = $statement->execute(
			array(
			    ':DocNumber'	=>	$_POST["DocNumber"],
				':GRNO'	=>	$_POST["GRNO"],
				':DueType'	=>	$_POST["DueType"],
				':PayableAmount'	=>	$_POST["PayableAmount"],
                ':PaidAmount'	=>	$_POST["PaidAmount"],
                ':DueDate'	=>	$_POST["DueDate"],
                ':DocDate'	=>	$docdate,
                ':UpdatedBy'	=>	$UpdateBy,
                ':UpdatedDate'	=> $UpdatedDate,
				
				':id'			=>	$_POST["DocEntry"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>