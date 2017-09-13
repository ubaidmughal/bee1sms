<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["action"]))  
{  
    if($_POST["action"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tblschoolinfo ORDER BY SchoolId DESC");  
    }  
    if($_POST["action"] == "Insert")  
    {  
        $SchoolName = mysqli_real_escape_string($object->connect, $_POST["SchoolName"]);  
        $Reg = mysqli_real_escape_string($object->connect, $_POST["Reg"]); 
        $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);  
        $Latitude = mysqli_real_escape_string($object->connect, $_POST["Latitude"]); 
        $Longitude = mysqli_real_escape_string($object->connect, $_POST["Longitude"]); 
        $image = addslashes(file_get_contents($_FILES["user_image"]["tmp_name"]));
        $query = "  
           INSERT INTO tblschoolinfo  
           (SchoolName, Logo,Reg,Address,latitude,longitude)   
           VALUES ('".$SchoolName."','".$image."','".$Reg."','".$Address."','".$Latitude."','".$Longitude."')";  
        $object->execute_query($query);  
        echo 'Data Inserted';       
    }  
    if($_POST["action"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblschoolinfo WHERE SchoolId = '".$_POST["user_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["SchoolName"] = $row['SchoolName'];  
            $output["Reg"] = $row['Reg'];  
            $output["Address"] = $row['Address'];  
            $output["latitude"] = $row['latitude']; 
            $output["longitude"] = $row['longitude'];  
            
            $output["image"] = '<img src="data:image/jpeg;base64,'.base64_encode($row['Logo'] ).'" height="60" width="75" class="img-thumbnail" />';  
            $output["user_image"] = $row['image'];  
        }  
        echo json_encode($output);  
    }  
    if($_POST["action"] == "Edit")  
    {  
        $image = '';  
        if($_FILES["user_image"]["name"] != '')  
        {  
            $image = addslashes(file_get_contents($_FILES["user_image"]["tmp_name"]));
        }  
        else  
        {  
            $image = $_POST["hidden_user_image"];  
        }  
        $SchoolName = mysqli_real_escape_string($object->connect, $_POST["SchoolName"]);  
        $Reg = mysqli_real_escape_string($object->connect, $_POST["Reg"]);  
         $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);  
        $Latitude = mysqli_real_escape_string($object->connect, $_POST["Latitude"]);  
         $Longitude = mysqli_real_escape_string($object->connect, $_POST["Longitude"]);  
        
        $query = "UPDATE tblschoolinfo SET SchoolName = '".$SchoolName."', Logo = '".$image."', Reg = '".$Reg."', Address = '".$Address."', latitude = '".$Latitude."', longitude = '".$Longitude."' WHERE SchoolId = '".$_POST["user_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated';  
    }  
     if($_POST["action"] == "delete")
     {
      $query = "DELETE FROM tblschoolinfo WHERE SchoolId = '".$_POST["user_id"]."'";
      $object->execute_query($query); 
      echo 'Data Delete';  
}


}  
?>  