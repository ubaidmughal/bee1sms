<?php  
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionQ"]))  
{  
    if($_POST["actionQ"] == "Load")  
    {  
        echo $object->get_data_in_table("SELECT * FROM tblquemaster ORDER BY QuestionId DESC");  
    }  
    if($_POST["actionQ"] == "Insert")  
    {  
        $Chapter = mysqli_real_escape_string($object->connect, $_POST["Chapter"]);  
        $BookName = mysqli_real_escape_string($object->connect, $_POST["BookName"]); 
        $QuestionType = mysqli_real_escape_string($object->connect, $_POST["QuestionType"]);  
        $QuestionString = mysqli_real_escape_string($object->connect, $_POST["QuestionString"]); 
        $McqsOption = mysqli_real_escape_string($object->connect, $_POST["McqsOption"]); 
        
        $query = "  
           INSERT INTO tblquemaster  
           (Chapter,BookName,QuestionType,QuestionString,McqsOption)   
           VALUES ('".$Chapter."','".$BookName."','".$QuestionType."','".$QuestionString."','".$McqsOption."')";  
        $object->execute_query($query);  
        echo 'Data Inserted Successfully...!!!';       
    }  
    if($_POST["actionQ"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblquemaster WHERE QuestionId = '".$_POST["question_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["Chapter"] = $row['Chapter'];  
            $output["BookName"] = $row['BookName'];  
            $output["QuestionType"] = $row['QuestionType'];  
            $output["QuestionString"] = $row['QuestionString']; 
            $output["McqsOption"] = $row['McqsOption'];  
             
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionQ"] == "Edit")  
    {  
       
        $Chapter = mysqli_real_escape_string($object->connect, $_POST["Chapter"]);  
        $BookName = mysqli_real_escape_string($object->connect, $_POST["BookName"]);  
         $QuestionType = mysqli_real_escape_string($object->connect, $_POST["QuestionType"]);  
        $QuestionString = mysqli_real_escape_string($object->connect, $_POST["QuestionString"]);  
         $McqsOption = mysqli_real_escape_string($object->connect, $_POST["McqsOption"]);  
        
        $query = "UPDATE tblquemaster SET Chapter = '".$Chapter."', BookName = '".$BookName."', QuestionType = '".$QuestionType."', QuestionString = '".$QuestionString."', McqsOption = '".$McqsOption."' WHERE QuestionId = '".$_POST["question_id"]."'";  
        $object->execute_query($query);  
        echo 'Data Updated Successfully...!!!';  
    }  
     if($_POST["actionQ"] == "delete")
     {
      $query = "DELETE FROM tblquemaster WHERE QuestionId = '".$_POST["question_id"]."'";
      $object->execute_query($query); 
      echo 'Data Deleted Successfully...!!!';  
}


}  
?>  