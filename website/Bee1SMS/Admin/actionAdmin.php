<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["action"]))  
{  
    if($_POST["action"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tbluser ORDER BY AdminId DESC");  
    }  
    if($_POST["action"] == "Insert")  
    {  
        $UserName = mysqli_real_escape_string($object->connect, $_POST["UserName"]);  
        $Email = mysqli_real_escape_string($object->connect, $_POST["Email"]); 
        $DateReg = mysqli_real_escape_string($object->connect, $_POST["DateReg"]);  
        $Password = mysqli_real_escape_string($object->connect, $_POST["Password"]); 
       
        $query = "  
           INSERT INTO tbluser  
           (UserName,Email,DateReg,Password)   
           VALUES ('".$UserName."','".$Email."','".$DateReg."','".$Password."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["action"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tbluser WHERE AdminId = '".$_POST["user_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["UserName"] = $row['UserName'];  
            $output["Email"] = $row['Email'];  
            $output["DateReg"] = $row['DateReg'];  
            $output["Password"] = $row['Password']; 
            ;  
        }  
        echo json_encode($output);  
    }  
    if($_POST["action"] == "Edit")  
    {  
        
        $UserName = mysqli_real_escape_string($object->connect, $_POST["UserName"]);  
        $Email = mysqli_real_escape_string($object->connect, $_POST["Email"]);  
         $DateReg = mysqli_real_escape_string($object->connect, $_POST["DateReg"]);  
        $Password = mysqli_real_escape_string($object->connect, $_POST["Password"]);  
         
        
        $query = "UPDATE tbluser SET UserName = '".$UserName."', Email = '".$Email."', DateReg = '".$DateReg."', Password = '".$Password."' WHERE AdminId = '".$_POST["user_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["action"] == "delete")
     {
      $query = "DELETE FROM tbluser WHERE AdminId = '".$_POST["user_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  