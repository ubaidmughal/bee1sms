<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblschoolinfo';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('SchoolId'=>$_POST['SchoolId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'SchoolId DESC'));
        if(!empty($users)){

            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['SchoolName'].'</td>';
                echo '<td>'.$user['Logo'].'</td>';
                echo '<td>'.$user['Reg'].'</td>';
                echo '<td>'.$user['Address'].'</td>';
                echo '<td>'.$user['latitude'].'</td>';
                echo '<td>'.$user['longitude'].'</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['SchoolId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?infoaction(\'delete\',\''.$user['SchoolId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No Records(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
       

            $userData = array(
                'SchoolName' => $_POST['SchoolName'],
                 'logo' => $_POST['logo'],
                
                'Reg' => $_POST['Reg'],
                'Address' => $_POST['Address'],
                'Latitude' => $_POST['Latitude'],
                'Longitude' => $_POST['Longitude']
            
            );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['SchoolId'])){
            $userData = array(
                'SchoolName' => $_POST['SchoolName'],
                'logo' => $_POST['logo'],
                
                'Reg' => $_POST['Reg'],
                'Address' => $_POST['Address'],
                'Latitude' => $_POST['Latitude'],
                'Longitude' => $_POST['Longitude']
            );
            $condition = array('SchoolId' => $_POST['SchoolId']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['SchoolId'])){
            $condition = array('SchoolId' => $_POST['SchoolId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }

    exit;
}
?>