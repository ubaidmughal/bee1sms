<?php  
include 'crudBM.php';  
$object = new crudBM();  
if(isset($_POST["actionB"]))  
{  
    if($_POST["actionB"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tblbookmaster ORDER BY BookId DESC");  
    }  
    if($_POST["actionB"] == "Insert")  
    {  
        $BookNames = mysqli_real_escape_string($object->connect, $_POST["BookNames"]);  
        $Author = mysqli_real_escape_string($object->connect, $_POST["Author"]); 
        $Publisher = mysqli_real_escape_string($object->connect, $_POST["Publisher"]);  
        $ContactPerson= mysqli_real_escape_string($object->connect, $_POST["ContactPerson"]); 
      
        $query = "  
           INSERT INTO tblbookmaster  
           (BookNames,Author,Publisher,ContactPerson)   
           VALUES ('".$BookNames."','".$Author."','".$Publisher."','".$ContactPerson."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionB"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblbookmaster WHERE BookId = '".$_POST["book_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["BookNames"] = $row['BookNames'];  
            $output["Author"] = $row['Author'];  
            $output["Publisher"] = $row['Publisher'];  
            $output["ContactPerson"] = $row['ContactPerson']; 
           
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionB"] == "Edit")  
    {   
        $BookNames = mysqli_real_escape_string($object->connect, $_POST["BookNames"]);  
        $Author = mysqli_real_escape_string($object->connect, $_POST["Author"]);  
         $Publisher = mysqli_real_escape_string($object->connect, $_POST["Publisher"]);  
        $ContactPerson= mysqli_real_escape_string($object->connect, $_POST["ContactPerson"]);  
           
        
        $query = "UPDATE tblbookmaster SET BookNames = '".$BookNames."', Author = '".$Author."', Publisher = '".$Publisher."', ContactPerson= '".$ContactPerson."' WHERE BookId = '".$_POST["book_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionB"] == "delete")
     {
      $query = "DELETE FROM tblbookmaster WHERE BookId = '".$_POST["book_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  