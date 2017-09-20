<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["action"]))  
{  
    if($_POST["action"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tblcontacts ORDER BY ContactId DESC");  
    }  
    if($_POST["action"] == "Insert")  
    {  
        $ContactType = mysqli_real_escape_string($object->connect, $_POST["ContactType"]);  
        $Name = mysqli_real_escape_string($object->connect, $_POST["Name"]); 
        $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);  
        $Phone = mysqli_real_escape_string($object->connect, $_POST["Phone"]); 
        $Email = mysqli_real_escape_string($object->connect, $_POST["Email"]); 
        $DOB = mysqli_real_escape_string($object->connect, $_POST["DOB"]); 
        $TimeOfContact = mysqli_real_escape_string($object->connect, $_POST["TimeOfContact"]); 
        $WayOfContact = mysqli_real_escape_string($object->connect, $_POST["WayOfContact"]); 
        $Profession = mysqli_real_escape_string($object->connect, $_POST["Profession"]); 
        
        $query = "  
           INSERT INTO tblcontacts  
           (ContactType,Name,Address,Phone,Email,DOB,TimeOfContact,WayOfContact,Profession)   
           VALUES ('".$ContactType."','".$Name."','".$Address."','".$Phone."','".$Email."','".$DOB."','".$TimeOfContact."','".$WayOfContact."','".$Profession."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["action"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblcontacts WHERE ContactId = '".$_POST["contact_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["ContactType"] = $row['ContactType'];  
            $output["Name"] = $row['Name'];  
            $output["Address"] = $row['Address'];  
            $output["Phone"] = $row['Phone']; 
            $output["Email"] = $row['Email'];  
            $output["DOB"] = $row['DOB'];
            $output["TimeOfContact"] = $row['TimeOfContact'];
            $output["WayOfContact"] = $row['WayOfContact'];
            $output["Profession"] = $row['Profession'];
             
             
        }  
        echo json_encode($output);  
    }  
    if($_POST["action"] == "Edit")  
    {  
        
        $ContactType = mysqli_real_escape_string($object->connect, $_POST["ContactType"]);  
        $Name = mysqli_real_escape_string($object->connect, $_POST["Name"]); 
        $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);  
        $Phone = mysqli_real_escape_string($object->connect, $_POST["Phone"]); 
        $Email = mysqli_real_escape_string($object->connect, $_POST["Email"]); 
        $DOB = mysqli_real_escape_string($object->connect, $_POST["DOB"]); 
        $TimeOfContact = mysqli_real_escape_string($object->connect, $_POST["TimeOfContact"]); 
        $WayOfContact = mysqli_real_escape_string($object->connect, $_POST["WayOfContact"]); 
        $Profession = mysqli_real_escape_string($object->connect, $_POST["Profession"]); 
        $query = "UPDATE tblcontacts SET ContactType = '".$ContactType."', Name = '".$Name."', Address = '".$Address."', Phone = '".$Phone."', Email = '".$Email."', DOB = '".$DOB."', TimeOfContact = '".$TimeOfContact."', WayOfContact = '".$WayOfContact."', Profession = '".$Profession."' WHERE ContactId = '".$_POST["contact_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["action"] == "delete")
     {
      $query = "DELETE FROM tblcontacts WHERE ContactId = '".$_POST["contact_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  