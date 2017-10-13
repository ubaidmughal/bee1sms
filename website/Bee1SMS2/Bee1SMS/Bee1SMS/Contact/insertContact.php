<?php
include('db.php');
include('functionContact.php');
if(isset($_POST["operationContact"]))
{
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