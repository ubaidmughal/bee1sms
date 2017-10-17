<?php
include('db.php');
include('function.php');

$query = '';
$output = array();
$query .= "SELECT * FROM tblteachers ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE teachercontact LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR teacherqualification LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY TId DESC ';
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
	$sub_array[] = $row["teachercontact"];
	$sub_array[] = $row["teacherqualification"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["TId"].'" class="btn btn-warning btn-xs update"><i class="fa fa-pencil"></i></button>&nbsp<button type="button" name="delete" id="'.$row["TId"].'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></button>';
	$sub_array[] = '';
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