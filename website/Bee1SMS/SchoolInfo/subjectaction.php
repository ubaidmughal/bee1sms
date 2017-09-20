<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionsubject"]))  
{  
    if($_POST["actionsubject"] == "Load")  
    {  
        echo $object->get_data_in_table_subject("SELECT * FROM tblsubject ORDER BY SubjectId DESC");  
    }  
    if($_POST["actionsubject"] == "Insert")  
    {  
        $SubjectName = mysqli_real_escape_string($object->connect, $_POST["SubjectName"]);  
      
        $query = "  
           INSERT INTO tblsubject  
           (SubjectName)   
           VALUES ('".$SubjectName."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionsubject"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblsubject WHERE SubjectId = '".$_POST["Subject_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["SubjectName"] = $row['SubjectName'];  
            
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionsubject"] == "Edit")  
    {  
       
        $SubjectName = mysqli_real_escape_string($object->connect, $_POST["SubjectName"]);  
     
        $query = "UPDATE tblsubject SET SubjectName = '".$SubjectName."' WHERE SubjectId = '".$_POST["Subject_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionsubject"] == "delete")
     {
      $query = "DELETE FROM tblsubject WHERE SubjectId = '".$_POST["Subject_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  