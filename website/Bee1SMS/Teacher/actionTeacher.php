<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblteachers';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('TId'=>$_POST['TId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'TId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['teachercontact'].'</td>';
                echo '<td>'.$user['teacherqualification'].'</td>';
                
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editTInfo(\''.$user['TId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionTeacher(\'delete\',\''.$user['TId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No Records(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
       
            $TInfoData = array(
                'TeacherContact' => $_POST['TeacherContact'],
                
                
                'TeacherQualification' => $_POST['TeacherQualification']
               
            
            );
        $insert = $db->insert($tblName,$TInfoData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['TId'])){
            $TInfoData = array(
              'TeacherContact' => $_POST['TeacherContact'],
                
                
                'TeacherQualification' => $_POST['TeacherQualification'],
                
            );
            $condition = array('TId' => $_POST['TId']);
            $update = $db->update($tblName,$TInfoData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['TId'])){
            $condition = array('TId' => $_POST['TId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>