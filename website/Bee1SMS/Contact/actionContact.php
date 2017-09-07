<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblcontacts';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('ContactId'=>$_POST['ContactId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'ContactId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['ContactType'].'</td>';
                echo '<td>'.$user['Name'].'</td>';
                echo '<td>'.$user['Address'].'</td>';
                echo '<td>'.$user['Phone'].'</td>';
                echo '<td>'.$user['Email'].'</td>';
                echo '<td>'.$user['DOB'].'</td>';
                echo '<td>'.$user['TimeOfContact'].'</td>';
                echo '<td>'.$user['WayOfContact'].'</td>';
                echo '<td>'.$user['Profession'].'</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCon(\''.$user['ContactId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionContact(\'delete\',\''.$user['ContactId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No Records(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
       
            $ConData = array(
                'ContactType' => $_POST['ContactType'],
                
                
                'Name' => $_POST['Name'],
                'Address' => $_POST['Address'],
                'Phone' => $_POST['Phone'],
                'Email' => $_POST['Email'],
                'DOB' => $_POST['DOB'],
                'TimeOfContact' => $_POST['TimeOfContact'],
                'WayOfContact' => $_POST['WayOfContact'],
                'Profession' => $_POST['Profession']
            
            );
        $insert = $db->insert($tblName,$ConData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['ContactId'])){
            $ConData = array(
              'ContactType' => $_POST['ContactType'],
                
                
                'Name' => $_POST['Name'],
                'Address' => $_POST['Address'],
                'Phone' => $_POST['Phone'],
                'Email' => $_POST['Email'],
                'DOB' => $_POST['DOB'],
                'TimeOfContact' => $_POST['TimeOfContact'],
                'WayOfContact' => $_POST['WayOfContact'],
                'Profession' => $_POST['Profession']
            );
            $condition = array('ContactId' => $_POST['ContactId']);
            $update = $db->update($tblName,$ConData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['ContactId'])){
            $condition = array('ContactId' => $_POST['ContactId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>