<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "bee1sms");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM tblschoolinfo ORDER BY SchoolId";
  $result = mysqli_query($connect, $query);
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["SchoolId"].'</td>
	 <td>'.$row["SchoolName"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['Logo'] ).'" height="60" width="75" class="img-thumbnail" />
     </td>
	 <td>'.$row["Reg"].'</td>
	 <td>'.$row["Address"].'</td>
	 <td>'.$row["latitude"].'</td>
	 <td>'.$row["longitude"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["SchoolId"].'"></a>&nbsp&nbsp;
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["SchoolId"].'"></a></td>
    </tr>
   ';
  }
  $output ;
  echo $output;
 }


 if($_POST['action'] == "Fetch Single Data")
 {
	 $query = "SELECT * FROM tblschoolinfo where SchoolId ='".$_POST["image_id"]."'";
  $result = mysqli_query($connect, $query);
   $output = '';
   while($row = mysqli_fetch_array($result))
  {
	  $output['SchooLName'] = $row['SchoolName'];
	
  }
  $output ;
 echo json_encode($output); 
 }
 if($_POST["action"] == "insert")
 {
  $SName = $_POST['SchoolName'];
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $Reg = $_POST['Reg'];
  $Addr = $_POST['Address'];
  $Lat = $_POST['Latitude'];
  $Lon = $_POST['Longitude'];
  $query = "INSERT INTO tblschoolinfo(SchoolName,Logo,Reg,Address,latitude,longitude) VALUES ('$SName','$file','$Reg','$Addr','$Lat','$Lon')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $SName = $_POST['SchoolName'];
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $Reg = $_POST['Reg'];
  $Addr = $_POST['Address'];
  $Lat = $_POST['Latitude'];
  $Lon = $_POST['Longitude'];
  $query = "UPDATE tblschoolinfo SET SchoolName='$SName',Logo = '$file',Reg='$Reg',Address='$Addr',latitude='$Lat',longitude='$Lon' WHERE SchoolId = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM tblschoolinfo WHERE SchoolId = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>
 