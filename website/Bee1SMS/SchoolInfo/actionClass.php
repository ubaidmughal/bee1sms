<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionclass"]))  
{  
    if($_POST["actionclass"] == "Load")  
    {  
        echo $object->get_data_in_table_class("SELECT * FROM tblclasses ORDER BY ClassId DESC");  
    }  
    if($_POST["actionclass"] == "Insert")  
    {  
        $ClassName = mysqli_real_escape_string($object->connect, $_POST["ClassName"]);  
      
        $query = "  
           INSERT INTO tblclasses  
           (ClassName)   
           VALUES ('".$ClassName."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionclass"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblclasses WHERE ClassId = '".$_POST["Class_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["ClassName"] = $row['ClassName'];  
            
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionclass"] == "Edit")  
    {    
        $ClassName = mysqli_real_escape_string($object->connect, $_POST["ClassName"]);  
       
        
        $query = "UPDATE tblclasses SET ClassName = '".$ClassName."' WHERE ClassId = '".$_POST["Class_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionclass"] == "delete")
     {
      $query = "DELETE FROM tblclasses WHERE ClassId = '".$_POST["Class_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  