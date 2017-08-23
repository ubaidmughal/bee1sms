<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblmenus';
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
                echo '<td>'.$user['MenuCode'].'</td>';
                echo '<td>'.$user['MenuName'].'</td>';
                echo '<td>'.$user['MenuType'].'</td>';
                echo '<td>'.$user['GroupCode'].'</td>';
                echo '<td>'.$user['Position'].'</td>';
                echo '<td>'.$user['Title'].'</td>';
                echo '<td>'.$user['Detail'].'</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['id'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionMenu(\'delete\',\''.$user['id'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
        $userData = array(
            'MenuCode' => $_POST['MenuCode'],
            'MenuName' => $_POST['MenuName'],
            'MenuType' => $_POST['MenuType'],
            'GroupCode' => $_POST['GroupCode'],
            'Position' => $_POST['Position'],
            'Title' => $_POST['Title'],
            'Detail' => $_POST['Detail']
        );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['id'])){
            $userData = array(
                'MenuCode' => $_POST['MenuCode'],
            'MenuName' => $_POST['MenuName'],
            'MenuType' => $_POST['MenuType'],
            'GroupCode' => $_POST['GroupCode'],
            'Position' => $_POST['Position'],
            'Title' => $_POST['Title'],
            'Detail' => $_POST['Detail']
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