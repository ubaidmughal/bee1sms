<?php

include($_SERVER['DOCUMENT_ROOT'].'/db.php');
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
            
            $query .= 'WHERE StudentName LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR FatherName LIKE "%'.$_POST["search"]["value"].'%" ';
           

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
            $sub_array[] = $row["GRNO"];
            $sub_array[] = $row["StudentName"];
            $sub_array[] = $row["FatherName"];
            $sub_array[] = $row["FamilyGroup"];
            $sub_array[] = $row["Religion"];
            $sub_array[] = $row["Address"];
            $sub_array[] = $row["Address2"];
            $sub_array[] = $row["DateOfBirth"];
            $sub_array[] = $row["PlaceOfBirth"]; 
            $sub_array[] = '<button type="button" name="print" id="'.$row["StudentId"].'" class="btn btn-primary btn-xs printStudent"><i class="fa fa-print"></i></button>&nbsp<button type="button" name="update" id="'.$row["StudentId"].'" class="btn btn-warning btn-xs updateStudent"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["StudentId"].'" class="btn btn-danger btn-xs deleteStudent"><i class="fa fa-trash-o"></i></button>';
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
    if($_POST["operationStudent"] == "max_code")
	{
             $output = array();
            $query = "SELECT * FROM tblstudent order by GRNO desc LIMIT 1";
            $sql = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($sql);
            if(empty($row))
            {
                $output["GRNO"] = 1;
            }
            else
            {
                $output["GRNO"] = $row['GRNO'] + 1;
            }
            echo json_encode($output);
    }
    
    if($_POST["operationStudent"] == "getRollNumber")
	{
        $RollNumber = $_POST['ClassAdmit'];
        $output = array();
            $query = "SELECT * FROM tblstudent where ClassAdmit = '".$RollNumber."' order by RollNumber desc LIMIT 1";
            $sql = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($sql);
            if(empty($row))
            {
                $output["RollNumber"] = 1;
            }
            else
            {
                $output["RollNumber"] = $row['RollNumber'] + 1;
            }
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
                $output["GRNO"] = $row["GRNO"];
                $output["StudentName"] = $row["StudentName"];
                $output["FatherName"] = $row["FatherName"];
                $output["FatherProfession"] = $row["FatherProfession"];
                $output["FatherNIC"] = $row["FatherNIC"];
                $output["FamilyGroup"] = $row["FamilyGroup"];
                $output["Religion"] = $row["Religion"];
                $output["Address"] = $row["Address"];
                $output["Address2"] = $row["Address2"];
                $output["DateOfBirth"] = $row["DateOfBirth"];
                $output["PlaceOfBirth"] = $row["PlaceOfBirth"];
                $output["LastInstitution"] = $row["LastInstitution"];
                $output["DateOfAdmission"] = $row["DateOfAdmission"];
                $output["ClassAdmit"] = $row["ClassAdmit"];
                $output["RollNumber"] = $row["RollNumber"];
                $output["Section"] = $row["Section"];
                $output["Gender"] = $row["Gender"];
                $output["AddmissionFee"] = $row["AdmissionFee"];
                $output["MonthlyFee"] = $row["MonthlyFee"];
                $output["AnnualFee"] = $row["AnnualFee"];
                if($row["StudentImage"] != '')
                {
                    $output['StudentImage'] = '<img src="data:image;base64,'.$row["StudentImage"].'" class="img-thumbnail" width="100" height="120" /><input type="hidden" name="hidden_Post_image" value="'.$row["StudentImage"].'" />';
                }
                else
                {
                    $output['StudentImage'] = '<input type="hidden" name="hidden_Post_image" id="hidden_Post_image" value="" />';
                }
                 if($row["Attachments"] != '')
                {
                    $output['Attachments'] = '<object type="application/pdf" data="data:application/pdf;base64,'.base64_encode($row["Attachments"]).'"  width="400" height="200"></object><input type="hidden" name="hidden_Post_Attachments" value="'.$row["Attachments"].'" />';
                }
                else
                {
                    $output['Attachments'] = '<input type="hidden" name="hidden_Post_Attachments" id="hidden_Post_Attachments" value="" />';
                }
            }
            echo json_encode($output);
        }
    }
     if($_POST["operationStudent"] == "delete")
	{
        if(isset($_POST["StudentId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblstudent WHERE StudentId = :id"
            );
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

	if($_POST["operationStudent"] == "Add")
	{
        $image = addslashes($_FILES['StudentImage']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
       
        $attachments = addslashes($_FILES['Attachments']['tmp_name']);
        $attachments = file_get_contents($attachments);
        $attachments = base64_encode($attachments);

		$statement = $connection->prepare("
			INSERT INTO tblstudent (GRNO,StudentName,StudentImage,FatherName,FatherProfession,FatherNIC,FamilyGroup,Religion,Address,Address2,DateOfBirth,PlaceOfBirth,LastInstitution,DateOfAdmission,ClassAdmit,Section,Attachments,Gender,RollNumber,AdmissionFee,MonthlyFee,AnnualFee) 
			VALUES (:GRNO,:StudentName,:StudentImage,:FatherName,:FatherProfession,:FatherNIC,:FamilyGroup,:Religion,:Address,:Address2,:DateOfBirth,:PlaceOfBirth,:LastInstitution,:DateOfAdmission,:ClassAdmit,:Section,:Attachments,:Gender,:RollNumber,:AdmissionFee,:MonthlyFee,:AnnualFee)
		");
		$result = $statement->execute(
			array(
				':GRNO'	=>	$_POST["GRNO"],
				':StudentName'	=>	$_POST["StudentName"],
                ':StudentImage'	=>	$image,
				':FatherName'	=>	$_POST["FatherName"],
                ':FatherProfession'	=>	$_POST["FatherProfession"],
                ':FatherNIC'	=>	$_POST["FatherNIC"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
                ':Religion'	=>	$_POST["Religion"],
               ':Address'	=>	$_POST["Address"],
               ':Address2'	=>	$_POST["Address2"],
               ':DateOfBirth'	=>	$_POST["DateOfBirth"],
               ':PlaceOfBirth'	=>	$_POST["PlaceOfBirth"],
               ':LastInstitution'	=>	$_POST["LastInstitution"],
               ':DateOfAdmission'	=>	$_POST["DateOfAdmission"],
               ':ClassAdmit'	=>	$_POST["ClassAdmit"],
               ':Section'	=>	$_POST["Section"],
               ':Attachments'	=>	$attachments,
               ':Gender'	=>	$_POST["Gender"],
               ':RollNumber'	=>	$_POST["RollNumber"],
               ':AdmissionFee'	=>	$_POST["AdmissionFee"],
               ':MonthlyFee'	=>	$_POST["MonthlyFee"],
               ':AnnualFee'	=>	$_POST["AnnualFee"]

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationStudent"] == "Edit")
	{
        if($_FILES['StudentImage']['name'] != '')
        {
        $image = addslashes($_FILES['StudentImage']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        }
        else
        {
            $image = $_POST['hidden_Post_image'];
        }
        
		$statement = $connection->prepare(
			"UPDATE tblstudent SET GRNO=:GRNO,StudentName=:StudentName,StudentImage=:StudentImage,FatherName=:FatherName,FatherProfession=:FatherProfession,FatherNIC=:FatherNIC,FamilyGroup=:FamilyGroup,Religion=:Religion,Address=:Address,Address2=:Address2
          ,DateOfBirth=:DateOfBirth,PlaceOfBirth=:PlaceOfBirth,LastInstitution=:LastInstitution,DateOfAdmission=:DateOfAdmission,ClassAdmit=:ClassAdmit
          ,Section=:Section,Gender=:Gender,RollNumber=:RollNumber,AdmissionFee=:AdmissionFee,MonthlyFee=:MonthlyFee,AnnualFee=:AnnualFee
			WHERE StudentId = :id"
		);
		$result = $statement->execute(
			array(
				':GRNO'	=>	$_POST["GRNO"],
				':StudentName'	=>	$_POST["StudentName"],
                ':StudentImage'	=>	$image,
				':FatherName'	=>	$_POST["FatherName"],
                 ':FatherProfession'	=>	$_POST["FatherProfession"],
                ':FatherNIC'	=>	$_POST["FatherNIC"],
				':FamilyGroup'	=>	$_POST["FamilyGroup"],
                ':Religion'	=>	$_POST["Religion"],
               ':Address'	=>	$_POST["Address"],
               ':Address2'	=>	$_POST["Address2"],
               ':DateOfBirth'	=>	$_POST["DateOfBirth"],
               ':PlaceOfBirth'	=>	$_POST["PlaceOfBirth"],
               ':LastInstitution'	=>	$_POST["LastInstitution"],
               ':DateOfAdmission'	=>	$_POST["DateOfAdmission"],
               ':ClassAdmit'	=>	$_POST["ClassAdmit"],
               ':Section'	=>	$_POST["Section"],
               ':Gender'	=>	$_POST["Gender"],
               ':RollNumber'	=>	$_POST["RollNumber"],
                ':AdmissionFee'	=>	$_POST["AdmissionFee"],
               ':MonthlyFee'	=>	$_POST["MonthlyFee"],
               ':AnnualFee'	=>	$_POST["AnnualFee"],
				
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