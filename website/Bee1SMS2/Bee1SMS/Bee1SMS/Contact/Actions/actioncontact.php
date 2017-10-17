<?php
include('../db.php');
include('../functionContact.php');
if(isset($_POST["operationContact"]))
{

    if($_POST["operationContact"] == "fetch")
	{
        $query = '';
        $output = array();
        $query .= "SELECT * FROM tblcontacts ";
        if(isset($_POST["search"]["value"]))
        {
            $query .= 'WHERE ContactType LIKE "%'.$_POST["search"]["value"].'%" ';
            $query .= 'OR Name LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY ContactId DESC ';
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
            $sub_array[] = $row["ContactType"];
            $sub_array[] = $row["Name"];
            $sub_array[] = $row["Address"];
            $sub_array[] = $row["Phone"];
            $sub_array[] = $row["Email"];
            $sub_array[] = $row["DOB"];
            $sub_array[] = $row["TimeOfContact"];
            $sub_array[] = $row["WayOfContact"];
            $sub_array[] = $row["Profession"];
            $sub_array[] = '<button type="button" name="update" id="'.$row["ContactId"].'" class="btn btn-warning btn-xs updateContact"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["ContactId"].'" class="btn btn-danger btn-xs deleteContact"><i class="fa fa-trash-o"></i></button>';
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

    if($_POST["operationContact"] == "fetch_single_record")
	{
        if(isset($_POST["ContactId"]))
        {
            $output = array();
            $statement = $connection->prepare(
                "SELECT * FROM tblcontacts 
		WHERE ContactId = '".$_POST["ContactId"]."' 
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $output["ContactType"] = $row["ContactType"];
                $output["Name"] = $row["Name"];
                $output["Address"] = $row["Address"];
                $output["Phone"] = $row["Phone"];
                $output["Email"] = $row["Email"];
                $output["DOB"] = $row["DOB"];
                $output["FacebookId"] = $row["FacebookId"];
                $output["SkypeId"] = $row["SkypeId"];
                $output["WhatsappNo"] = $row["WhatsappNo"];
                $output["TwitterId"] = $row["TwitterId"];
                $output["Country"] = $row["Country"];
                $output["State"] = $row["State"];
                $output["City"] = $row["City"];
                $output["ZipCode"] = $row["ZipCode"];
                $output["TimeOfContact"] = $row["TimeOfContact"];
                $output["WayOfContact"] = $row["WayOfContact"];
                $output["Profession"] = $row["Profession"];
                

            }
            echo json_encode($output);
        }
    }

    if($_POST["operationContact"] == "delete")
	{
        if(isset($_POST["ContactId"]))
        {
            
            $statement = $connection->prepare(
                "DELETE FROM tblcontacts WHERE ContactId = :id"
            );
            $result = $statement->execute(
                array(
                    ':id'	=>	$_POST["ContactId"]
                )
            );
            
            if(!empty($result))
            {
                echo 'Data Deleted';
            }
        }
    }

	if($_POST["operationContact"] == "Add")
	{
        //$image = '';
        //if($_FILES["user_image"]["name"] != '')
        //{
        //    $image = upload_image();
        //}
		$statement = $connection->prepare("
			INSERT INTO tblcontacts (ContactType, Name,Phone,Email,Address,country,State,City,ZipCode,SkypeId,WhatsappNo,facebookId,TwitterId,DOB,TimeOfContact,WayOfContact,Profession) 
			VALUES (:ContactType, :Name,:Phone,:Email,:Address,:country,:State,:City,:ZipCode,:SkypeId,:WhatsappNo,:facebookId,:TwitterId,:DOB,:TimeOfContact,:WayOfContact,:Profession)
		");
		$result = $statement->execute(
			array(
				':ContactType'	=>	$_POST["ContactType"],
				':Name'	=>	$_POST["Name"],
				':Phone'	=>	$_POST["Phone"],
                ':Email'	=>	$_POST["Email"],
                ':Address'	=>	$_POST["Address"],
                ':country'	=>	$_POST["country"],
                ':State'	=>	$_POST["State"],
                ':City'	=>	$_POST["City"],
                ':ZipCode'	=>	$_POST["ZipCode"],
                ':SkypeId'	=>	$_POST["SkypeId"],
                ':WhatsappNo'	=>	$_POST["WhatsappNo"],
                ':facebookId'	=>	$_POST["facebookId"],
                ':TwitterId'	=>	$_POST["TwitterId"],
                ':DOB'	=>	$_POST["DOB"],
                ':TimeOfContact'	=>	$_POST["TimeOfContact"],
                ':WayOfContact'	=>	$_POST["WayOfContact"],
                ':Profession'	=>	$_POST["Profession"]
			    )
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationContact"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblcontacts 
			SET ContactType = :ContactType, Name = :Name , Phone = :Phone,Email = :Email, Address = :Address,country = :country, State = :State, City = :City,ZipCode = :ZipCode, SkypeId = :SkypeId , WhatsappNo = :WhatsappNo,facebookId = :facebookId, TwitterId = :TwitterId,DOB =:DOB,TimeOfContact = :TimeOfContact,WayOfContact = :WayOfContact,Profession = :Profession
			WHERE ContactId = :id
			"
		);
		$result = $statement->execute(
			array(
				':ContactType'	=>	$_POST["ContactType"],
				':Name'	=>	$_POST["Name"],
				':Phone'	=>	$_POST["Phone"],
                ':Email'	=>	$_POST["Email"],
                ':Address'	=>	$_POST["Address"],
                ':country'	=>	$_POST["country"],
                ':State'	=>	$_POST["State"],
                ':City'	=>	$_POST["City"],
                ':ZipCode'	=>	$_POST["ZipCode"],
                ':SkypeId'	=>	$_POST["SkypeId"],
                ':WhatsappNo'	=>	$_POST["WhatsappNo"],
                ':facebookId'	=>	$_POST["facebookId"],
                ':TwitterId'	=>	$_POST["TwitterId"],
                ':DOB'	=>	$_POST["DOB"],
                ':TimeOfContact'	=>	$_POST["TimeOfContact"],
                ':WayOfContact'	=>	$_POST["WayOfContact"],
                ':Profession'	=>	$_POST["Profession"],
                ':id'			=>	$_POST["ContactId"]
			    )
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>