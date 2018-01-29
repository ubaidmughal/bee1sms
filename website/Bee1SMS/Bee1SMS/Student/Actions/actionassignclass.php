<?php

include($_SERVER['DOCUMENT_ROOT'].'/db.php');


  
 
    if($_POST["operationFamily"] == "getnames")
    {
        if(isset($_POST["FromClass"]))
        {
            $query = '';
            $output = array();
            $query .= "SELECT * FROM tblstudent where ClassAdmit = '".$_POST["FromClass"]."'";
            //if($_POST["length"] != -1)
                $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $data = array();
            //$filtered_rows = $statement->rowCount();
            foreach($result as $row)
            {
                $sub_array = array();            
                $sub_array[] = $row["GRNO"].'<input type="hidden" name="GRNO" class="GRNO" value="'.$row["GRNO"].'" />';
                $sub_array[] = $row["StudentName"].'<input type="hidden" name="StudentName" class="StudentName" value="'.$row["StudentName"].'" />';
                $sub_array[] = $row["ClassAdmit"].'<input type="hidden" name="ClassAdmit" class="Class" value="'.$row["ClassAdmit"].'" />';
                $sub_array[] = $row["RollNumber"].'<input type="hidden" name="RollNumber" class="RollNumber" value="'.$row["RollNumber"].'" />';
               
                $data[] = $sub_array;
            }
            $output = array(
                "draw"				=>	intval($_POST["draw"]),
                //"recordsTotal"		=> 	$filtered_rows,
                //"recordsFiltered"	=>	get_total_all_familystudents(),
                "data"				=>	$data
            );
            echo json_encode($output);
        }
    }



if(isset($_POST["GRNO"]))
{
 
$row_data = array();
foreach($_POST['GRNO'] as $row=>$GRNO) { 
$GRNO=mysqli_real_escape_string($con,$GRNO);
$StudentName=mysqli_real_escape_string($con,($_POST['StudentName'][$row]));
$Class=mysqli_real_escape_string($con,($_POST['Class'][$row]));
$RollNumber=mysqli_real_escape_string($con,($_POST['RollNumber'][$row]));

$row_data[] = "('$GRNO', '$StudentName', '$Class','$RollNumber')";
}
if (!empty($row_data)) {
$sql = 'INSERT INTO tblassignclass(GRNO,StudentName,Class,RollNumber) VALUES '.implode(',', $row_data);
$result = mysqli_query($con, $sql ) or die(mysqli_error($con));

if ($result)
echo 'Successful inserts: ' . mysqli_affected_rows($con);
else
echo 'query failed' ;
} 

}


    if($_POST["operationFamily"] == "fetch")
    {
        
            $query = '';
            $ToClass = $_Post['ToClass'];
            $output = array();
            $query .= "SELECT * FROM tblassignclass where Class = '".$_POST["ToClass"]."'";
            //if($_POST["length"] != -1)
                $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $data = array();
            //$filtered_rows = $statement->rowCount();
            foreach($result as $row)
            {
                $sub_array = array();            
                $sub_array[] = $row["GRNO"];
                $sub_array[] = $row["StudentName"];
                $sub_array[] = $row["Class"];
                $sub_array[] = $row["RollNumber"];
               
                $data[] = $sub_array;
            }
            $output = array(
                "draw"				=>	intval($_POST["draw"]),
                //"recordsTotal"		=> 	$filtered_rows,
                //"recordsFiltered"	=>	get_total_all_familystudents(),
                "data"				=>	$data
            );
            echo json_encode($output);
        }


 ?>
