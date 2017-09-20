<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionsection"]))  
{  
    if($_POST["actionsection"] == "Load")  
    {  
        echo $object->get_data_in_table_sections("SELECT * FROM tblsections ORDER BY SectionId DESC");  
    }  
    if($_POST["actionsection"] == "Insert")  
    {  
        $SectionName = mysqli_real_escape_string($object->connect, $_POST["SectionName"]);  
      
        $query = "  
           INSERT INTO tblsections  
           (SectionName)   
           VALUES ('".$SectionName."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionsection"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblsections WHERE SectionId = '".$_POST["Section_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["SectionName"] = $row['SectionName'];  
            
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionsection"] == "Edit")  
    {    
        $SectionName = mysqli_real_escape_string($object->connect, $_POST["SectionName"]);  
       
        
        $query = "UPDATE tblsections SET SectionName = '".$SectionName."' WHERE SectionId = '".$_POST["Section_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionsection"] == "delete")
     {
      $query = "DELETE FROM tblsections WHERE SectionId = '".$_POST["Section_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  