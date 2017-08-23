<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblorg';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('id'=>$_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'id DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['OrgCode'].'</td>';
                echo '<td>'.$user['OrgName'].'</td>';
                echo '<td>'.$user['OrgType'].'</td>';
                echo '<td>'.$user['Description'].'</td>';
                echo '<td>'.$user['Address'].'</td>';
                echo '<td>'.$user['City'].'</td>';
                echo '<td>'.$user['State'].'</td>';
                echo '<td>'.$user['ZipCode'].'</td>';
                echo '<td>'.$user['Phone'].'</td>';
                echo '<td>'.$user['AdminId'].'</td>';
                echo '<td>'.$user['AdminPwd'].'</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['id'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionOrg(\'delete\',\''.$user['id'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
        $userData = array(
            'OrgCode' => $_POST['OrgCode'],
            'OrgName' => $_POST['OrgName'],
            'OrgType' => $_POST['OrgType'],
            'Description' => $_POST['Description'],
            'Address' => $_POST['Address'],
            'City' => $_POST['City'],
            'State' => $_POST['State'],
            'ZipCode' => $_POST['ZipCode'],
            'Phone' => $_POST['Phone'],
            'AdminId' => $_POST['AdminId'],
            'AdminPwd' => $_POST['AdminPwd']
        );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['id'])){
            $userData = array(
             'OrgCode' => $_POST['OrgCode'],
            'OrgName' => $_POST['OrgName'],
            'OrgType' => $_POST['OrgType'],
            'Description' => $_POST['Description'],
            'Address' => $_POST['Address'],
            'City' => $_POST['City'],
            'State' => $_POST['State'],
            'ZipCode' => $_POST['ZipCode'],
            'Phone' => $_POST['Phone'],
            'AdminId' => $_POST['AdminId'],
            'AdminPwd' => $_POST['AdminPwd']
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['id'])){
            $condition = array('id' => $_POST['id']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>