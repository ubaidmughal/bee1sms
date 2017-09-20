<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["action"]))  
{  
    if($_POST["action"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tblteachers ORDER BY TId DESC");  
    }  
    if($_POST["action"] == "Insert")  
    {  
        $teachercontact = mysqli_real_escape_string($object->connect, $_POST["TContact"]);  
        $teacherqualfiaction = mysqli_real_escape_string($object->connect, $_POST["TQualification"]); 
    
        $query = "  
           INSERT INTO tblteachers  
           (teachercontact,teacherqualification)   
           VALUES ('".$teachercontact."','".$teacherqualfiaction."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["action"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblteachers WHERE TId = '".$_POST["teacher_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["teachercontact"] = $row['teachercontact'];  
            $output["teacherqualification"] = $row['teacherqualification'];  
           
        }  
        echo json_encode($output);  
    }  
    if($_POST["action"] == "Edit")  
    {  
          
        $teachercontact = mysqli_real_escape_string($object->connect, $_POST["TContact"]);  
        $teacherqualfiaction = mysqli_real_escape_string($object->connect, $_POST["TQualification"]);  
        
        
        $query = "UPDATE tblteachers SET teachercontact = '".$teachercontact."', teacherqualification = '".$teacherqualfiaction."' WHERE TId = '".$_POST["teacher_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["action"] == "delete")
     {
      $query = "DELETE FROM tblteachers WHERE TId = '".$_POST["teacher_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  