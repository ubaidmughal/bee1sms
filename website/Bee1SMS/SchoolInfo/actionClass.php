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
        $Section = mysqli_real_escape_string($object->connect, $_POST["Section"]);  

 $SubjectNames = '';
 foreach($_POST["SubjectNames"] as $row)
 {
  $SubjectNames .= $row . ', ';
 }
 $SubjectNames = substr($SubjectNames, 0, -2);
        
        $query = "  
           INSERT INTO tblclasses  
           (ClassName,Section,SubjectName)   
           VALUES ('".$ClassName."','".$Section."','".$SubjectNames."')";  
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
            
            $output["Section"] = $row['Section'];  
            $output["SubjectName"] = $row['SubjectName'];  
           
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionclass"] == "Edit")  
    {    
        $ClassName = mysqli_real_escape_string($object->connect, $_POST["ClassName"]);  
       $Section = mysqli_real_escape_string($object->connect, $_POST["Section"]);  
      $SubjectNames = '';
 foreach($_POST["SubjectNames"] as $row)
 {
  $SubjectNames .= $row . ', ';
 }
 $SubjectNames = substr($SubjectNames, 0, -2);
        
        
        $query = "UPDATE tblclasses SET ClassName = '".$ClassName."',Section = '".$Section."',SubjectName = '".$SubjectNames."' WHERE ClassId = '".$_POST["Class_id"]."'";  
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