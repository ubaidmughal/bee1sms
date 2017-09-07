<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblactivities';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('ActivityId'=>$_POST['ActivityId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'ActivityId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['ActivityName'].'</td>';
                echo '<td>'.$user['ActivityDescription'].'</td>';
                echo '<td><a href="javascript:voActivityId(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['ActivityId'].'\')"></a><a href="javascript:voActivityId(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?action(\'delete\',\''.$user['ActivityId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
        $userData = array(
            'ActivityName' => $_POST['ActivityName'],
        'ActivityDescription'  => $_POST['ActivityDescription']
        );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['ActivityId'])){
            $userData = array(
        'ActivityName' => $_POST['ActivityName'],
        'ActivityDescription'  => $_POST['ActivityDescription']
            );
            $condition = array('ActivityId' => $_POST['ActivityId']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['ActivityId'])){
            $condition = array('ActivityId' => $_POST['ActivityId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>