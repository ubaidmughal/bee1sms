<?php
include 'crud.php';  
$object = new crud();  
if(isset($_POST["actionstudent"]))  
{  
    if($_POST["actionstudent"] == "Load")  
    {  
        echo $object->get_data_in_table_students("SELECT * FROM tblstudent ORDER BY StudentId DESC");  
    }  
    if($_POST["actionstudent"] == "Insert")  
    {  
        $StudentCode = mysqli_real_escape_string($object->connect, $_POST["StudentCode"]);  
        $StudentName = mysqli_real_escape_string($object->connect, $_POST["StudentName"]); 
        $FamilyGroup = mysqli_real_escape_string($object->connect, $_POST["FamilyGroup"]);  
        $NameOfGroup = mysqli_real_escape_string($object->connect, $_POST["NameOfGroup"]); 
        $FatherName = mysqli_real_escape_string($object->connect, $_POST["FatherName"]); 
        $Class = mysqli_real_escape_string($object->connect, $_POST["Class"]);  
        $Section = mysqli_real_escape_string($object->connect, $_POST["Section"]);
        $Age = mysqli_real_escape_string($object->connect, $_POST["Age"]); 
        $DOB = mysqli_real_escape_string($object->connect, $_POST["DOB"]);  
        $Gender = mysqli_real_escape_string($object->connect, $_POST["Gender"]); 
        $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);
        $ContactPerson = mysqli_real_escape_string($object->connect, $_POST["ContactPerson"]);
        $query = "  
           INSERT INTO tblstudent  
           (StudentCode,StudentName,FamilyGroup,NameOfGroup,FatherName,Class,Section,Age,DOB,Gender,Address,ContactPerson)   
           VALUES ('".$StudentCode."','".$StudentName."','".$FamilyGroup."','".$NameOfGroup."','".$FatherName."','".$Class."','".$Section."','".$Age."','".$DOB."','".$Gender."','".$Address."','".$ContactPerson."')";  
        $object->execute_query($query);  
        echo 'Student has been Inserted Successfully...!!!';       
    }  
    if($_POST["actionstudent"] == "Fetch Single Data")  
    {  
        $output = '';  
        $query = "SELECT * FROM tblstudent WHERE StudentId = '".$_POST["Student_id"]."'";  
        $result = $object->execute_query($query);  
        while($row = mysqli_fetch_array($result))  
        {  
            $output["StudentCode"] = $row['StudentCode'];  
            $output["StudentName"] = $row['StudentName'];  
            $output["FamilyGroup"] = $row['FamilyGroup'];  
            $output["NameOfGroup"] = $row['NameOfGroup']; 
            $output["FatherName"] = $row['FatherName'];  
            $output["Class"] = $row['Class'];  
            $output["Section"] = $row['Section'];  
            $output["Age"] = $row['Age'];  
            $output["DOB"] = $row['DOB']; 
            $output["Gender"] = $row['Gender'];
            $output["Address"] = $row['Address']; 
            $output["ContactPerson"] = $row['ContactPerson'];
        }  
        echo json_encode($output);  
    }  
    if($_POST["actionstudent"] == "Edit")  
    {   
        $StudentCode = mysqli_real_escape_string($object->connect, $_POST["StudentCode"]);  
        $StudentName = mysqli_real_escape_string($object->connect, $_POST["StudentName"]); 
        $FamilyGroup = mysqli_real_escape_string($object->connect, $_POST["FamilyGroup"]);  
        $NameOfGroup = mysqli_real_escape_string($object->connect, $_POST["NameOfGroup"]); 
        $FatherName = mysqli_real_escape_string($object->connect, $_POST["FatherName"]); 
        $Class = mysqli_real_escape_string($object->connect, $_POST["Class"]);  
        $Section = mysqli_real_escape_string($object->connect, $_POST["Section"]);
        $Age = mysqli_real_escape_string($object->connect, $_POST["Age"]); 
        $DOB = mysqli_real_escape_string($object->connect, $_POST["DOB"]);  
        $Gender = mysqli_real_escape_string($object->connect, $_POST["Gender"]); 
        $Address = mysqli_real_escape_string($object->connect, $_POST["Address"]);
        $ContactPerson = mysqli_real_escape_string($object->connect, $_POST["ContactPerson"]);  
        
        $query = "UPDATE tblstudent SET StudentCode = '".$StudentCode."', StudentName = '".$StudentName."', FamilyGroup = '".$FamilyGroup."', NameOfGroup = '".$NameOfGroup."', FatherName = '".$FatherName."',
Class = '".$Class."', Section = '".$Section."', Age = '".$Age."', DOB = '".$DOB."', Gender = '".$Gender."', Address = '".$Address."', ContactPerson = '".$ContactPerson."'
WHERE StudentId = '".$_POST["Student_id"]."'";  
        $object->execute_query($query);  
        echo 'Student has been Updated Successfully...!!!';  
    }  
    if($_POST["actionstudent"] == "delete")
    {
        $query = "DELETE FROM tblstudent WHERE StudentId = '".$_POST["Student_id"]."'";
        $object->execute_query($query); 
        echo 'Data Deleted Successfully...!!!';  
    }


}  

?>