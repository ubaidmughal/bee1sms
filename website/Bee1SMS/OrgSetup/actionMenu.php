<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblmenus';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    switch($type){
        case "view":
            $records = $db->getRows($tblName);
            if($records){
                $data['records'] = $db->getRows($tblName);
                $data['status'] = 'OK';
            }else{
                $data['records'] = array();
                $data['status'] = 'ERR';
            }
            echo json_encode($data);
            break;
        case "add":
            if(!empty($_POST['data'])){
                $userData = array(
                    'MnuCode' => $_POST['data']['MnuCode'],
                    'MnuName' => $_POST['data']['MnuName'],
                    'MnuType' => $_POST['data']['MnuType'],
					'GroupCode' => $_POST['data']['GroupCode'],
                    'Position' => $_POST['data']['Position'],
                    'Title' => $_POST['data']['Title'],
				    'Detail' => $_POST['data']['Detail']
                );
                $insert = $db->insert($tblName,$userData);
                if($insert){
                    $data['data'] = $insert;
                    $data['status'] = 'OK';
                    $data['msg'] = 'Menu data has been added successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        case "edit":
            if(!empty($_POST['data'])){
                $userData = array(
                   'MnuCode' => $_POST['data']['MnuCode'],
                    'MnuName' => $_POST['data']['MnuName'],
                    'MnuType' => $_POST['data']['MnuType'],
					'GroupCode' => $_POST['data']['GroupCode'],
                    'Position' => $_POST['data']['Position'],
                    'Title' => $_POST['data']['Title'],
				    'Detail' => $_POST['data']['Detail']
                );
                $condition = array('id' => $_POST['data']['id']);
                $update = $db->update($tblName,$userData,$condition);
                if($update){
                    $data['status'] = 'OK';
                    $data['msg'] = 'Menu data has been updated successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        case "delete":
            if(!empty($_POST['id'])){
                $condition = array('id' => $_POST['id']);
                $delete = $db->delete($tblName,$condition);
                if($delete){
                    $data['status'] = 'OK';
                    $data['msg'] = 'Menu data has been deleted successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        default:
            echo '{"status":"INVALID"}';
    }
}