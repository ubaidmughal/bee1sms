<?php
include('db.php');
include('functionOrg.php');

$query = '';
$output = array();
$query .= "SELECT * FROM tblorg ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE OrgCode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR OrgName LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY OrgId DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    //$image = '';
    //if($row["image"] != '')
    //{
    //    $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
    //}
    //else
    //{
    //    $image = '';
    //}
	$sub_array = array();
	//$sub_array[] = $image;
	$sub_array[] = $row["OrgCode"];
    $sub_array[] = $row["OrgType"];
	$sub_array[] = $row["OrgName"];
    $sub_array[] = $row["Description"];
	$sub_array[] = $row["Address"];
    $sub_array[] = $row["City"];
    $sub_array[] = $row["State"];
    $sub_array[] = $row["ZipCode"];
    $sub_array[] = $row["Phone"];
    $sub_array[] = $row["AdminId"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["OrgId"].'" class="btn btn-warning btn-xs updateOrg"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["OrgId"].'" class="btn btn-danger btn-xs deleteOrg"><i class="fa fa-trash-o"></i></button>';
	//$sub_array[] = ;
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);

?>