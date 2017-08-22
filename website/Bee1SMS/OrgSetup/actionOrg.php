<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblorg';
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
                    'OrgCode' => $_POST['data']['OrgCode'],
                    'OrgName' => $_POST['data']['OrgName'],
                    'OrgType' => $_POST['data']['OrgType'],
					'Description' => $_POST['data']['Description'],
                    'Address' => $_POST['data']['Address'],
                    'City' => $_POST['data']['City'],
				    'State' => $_POST['data']['State'],
                    'ZipCode' => $_POST['data']['ZipCode'],
                    'Phone' => $_POST['data']['Phone'],
                    'AdminId' => $_POST['data']['AdminId'],
                    'AdminPwd' => $_POST['data']['AdminPwd']
                );
                $insert = $db->insert($tblName,$userData);
                if($insert){
                    $data['data'] = $insert;
                    $data['status'] = 'OK';
                    $data['msg'] = 'Organization data has been added successfully.';
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
                   'OrgCode' => $_POST['data']['OrgCode'],
                    'OrgName' => $_POST['data']['OrgName'],
                    'OrgType' => $_POST['data']['OrgType'],
					'Description' => $_POST['data']['Description'],
                    'Address' => $_POST['data']['Address'],
                    'City' => $_POST['data']['City'],
				    'State' => $_POST['data']['State'],
                    'ZipCode' => $_POST['data']['ZipCode'],
                    'Phone' => $_POST['data']['Phone'],
                    'AdminId' => $_POST['data']['AdminId'],
                    'AdminPwd' => $_POST['data']['AdminPwd']
                );
                $condition = array('id' => $_POST['data']['id']);
                $update = $db->update($tblName,$userData,$condition);
                if($update){
                    $data['status'] = 'OK';
                    $data['msg'] = 'Organization data has been updated successfully.';
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
                    $data['msg'] = 'Organization data has been deleted successfully.';
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