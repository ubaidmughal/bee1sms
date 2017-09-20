<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionactivity"]))  
{  
    if($_POST["actionactivity"] == "Load")  
    {  
        echo $object->get_data_in_table_activities("SELECT * FROM tblactivities ORDER BY ActivityId DESC");  
    }  
    if($_POST["actionactivity"] == "Insert")  
    {  
        $ActivityName = mysqli_real_escape_string($object->connect, $_POST["ActivityName"]);  
        $ActivityDescription = mysqli_real_escape_string($object->connect, $_POST["ActivityDescription"]); 
        $query = "  
           INSERT INTO tblactivities  
           (ActivityName, ActivityDescription)   
           VALUES ('".$ActivityName."','".$ActivityDescription."')";  
        $object->execute_query($query);  
        echo 'Activity has been Inserted Successfully...!!!';       
    }  
    if($_POST["actionactivity"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblactivities WHERE ActivityId = '".$_POST["Activity_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["ActivityName"] = $row['ActivityName'];  
            $output["ActivityDescription"] = $row['ActivityDescription'];   
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionactivity"] == "Edit")  
    {     
        $ActivityName = mysqli_real_escape_string($object->connect, $_POST["ActivityName"]);  
        $ActivityDescription = mysqli_real_escape_string($object->connect, $_POST["ActivityDescription"]);
        $query = "UPDATE tblactivities SET ActivityName = '".$ActivityName."', ActivityDescription = '".$ActivityDescription."' WHERE ActivityId = '".$_POST["Activity_id"]."'";  
        $object->execute_query($query);  
        echo 'Activity has been Updated Successfully...!!!';  
    }  
     if($_POST["actionactivity"] == "delete")
     {
      $query = "DELETE FROM tblactivities WHERE ActivityId = '".$_POST["Activity_id"]."'";
      $object->execute_query($query); 
      echo 'Activity has been Deleted Successfully...!!!';  
}


}  
?>  