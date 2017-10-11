<?php
include('db.php');
include('functionOrg.php');
if(isset($_POST["operationOrg"]))
{
	if($_POST["operationOrg"] == "Add")
	{
        
		$statement = $connection->prepare("
			INSERT INTO tblorg (OrgCode, OrgName,OrgType,Description,Address,City,State,ZipCode,Phone,AdminId,AdminPwd) 
			VALUES (:OrgCode, :OrgName,:OrgType,:Description,:Address,:City,:State,:ZipCode,:Phone,:AdminId,:AdminPwd)
		");
		$result = $statement->execute(
			array(
				':OrgCode'	=>	$_POST["OrgCode"],
				':OrgName'	=>	$_POST["OrgName"],
				':OrgType'	=>	$_POST["OrgType"],
				':Description'	=>	$_POST["Description"],
                ':Address'	=>	$_POST["Address"],
				':City'	=>	$_POST["City"],
				':State'	=>	$_POST["State"],
				':ZipCode'	=>	$_POST["ZipCode"],
                ':Phone'	=>	$_POST["Phone"],
				':AdminId'	=>	$_POST["AdminId"],
                ':AdminPwd'	=>	$_POST["AdminPwd"]

			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operationOrg"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE tblOrg 
		  SET OrgCode = :OrgCode, OrgName = :OrgName , OrgType = :OrgType, Description = :Description, Address = :Address,City = :City,State = :State,ZipCode = :ZipCode,Phone = :Phone,AdminId =:AdminId,AdminPwd =:AdminPwd
			WHERE OrgId = :id
			"
		);
		$result = $statement->execute(
			array(
		        ':OrgCode'	=>	$_POST["OrgCode"],
				':OrgName'	=>	$_POST["OrgName"],
				':OrgType'	=>	$_POST["OrgType"],
				':Description'	=>	$_POST["Description"],
                ':Address'	=>	$_POST["Address"],
				':City'	=>	$_POST["City"],
				':State'	=>	$_POST["State"],
				':ZipCode'	=>	$_POST["ZipCode"],
                ':Phone'	=>	$_POST["Phone"],
				':AdminId'	=>	$_POST["AdminId"],
                ':AdminPwd'	=>	$_POST["AdminPwd"],
				
				':id'			=>	$_POST["OrgId"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>