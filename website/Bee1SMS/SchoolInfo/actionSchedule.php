<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionschedule"]))  
{  
    if($_POST["actionschedule"] == "Load")  
    {  
        echo $object->get_data_in_table_schedule("SELECT * FROM tblclssecschedule ORDER BY ClassSectionId DESC");  
    }  
    if($_POST["actionschedule"] == "Insert")  
    {  
        $FromTime = mysqli_real_escape_string($object->connect, $_POST["FromTime"]);  
        $ToTime = mysqli_real_escape_string($object->connect, $_POST["ToTime"]); 
        $Occurs = mysqli_real_escape_string($object->connect, $_POST["Occurs"]);  
        $TeacherSubject = mysqli_real_escape_string($object->connect, $_POST["TeacherSubject"]); 
        
        $query = "  
           INSERT INTO tblclssecschedule  
           (FromTime,ToTime,Occurs,TeacherSubject)   
           VALUES ('".$FromTime."','".$ToTime."','".$Occurs."','".$TeacherSubject."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionschedule"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblclssecschedule WHERE ClassSectionId = '".$_POST["schedule_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["FromTime"] = $row['FromTime'];  
            $output["ToTime"] = $row['ToTime'];  
            $output["Occurs"] = $row['Occurs'];  
            $output["TeacherSubject"] = $row['TeacherSubject']; 
           
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionschedule"] == "Edit")  
    {   
        $FromTime = mysqli_real_escape_string($object->connect, $_POST["FromTime"]);  
        $ToTime = mysqli_real_escape_string($object->connect, $_POST["ToTime"]);  
         $Occurs = mysqli_real_escape_string($object->connect, $_POST["Occurs"]);  
        $TeacherSubject = mysqli_real_escape_string($object->connect, $_POST["TeacherSubject"]);  
         
        
        $query = "UPDATE tblclssecschedule SET FromTime = '".$FromTime."', ToTime = '".$ToTime."', Occurs = '".$Occurs."', TeacherSubject = '".$TeacherSubject."' WHERE ClassSectionId = '".$_POST["schedule_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionschedule"] == "delete")
     {
      $query = "DELETE FROM tblclssecschedule WHERE ClassSectionId = '".$_POST["schedule_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  