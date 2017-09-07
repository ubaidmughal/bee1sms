<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblquemaster';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('QuestionId'=>$_POST['QuestionId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'QuestionId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['Chapter'].'</td>';
                echo '<td>'.$user['BookId'].'</td>';
              
                echo '<td>'.$user['QuestionType'].'</td>';
                echo '<td>'.$user['QuestionString'].'</td>';
                echo '<td>'.$user['McqsOption'].'</td>';
                
              
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editQM(\''.$user['QuestionId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionQue(\'delete\',\''.$user['QuestionId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No Records(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
       
            $QMData = array(
                'Chapter' => $_POST['Chapter'],
                'BookId' => $_POST['BookId'],

                
                'QuestionType' => $_POST['QuestionType'],
                'QuestionString' => $_POST['QuestionString'],
                'McqsOption' => $_POST['McqsOption'],
            
            );
        $insert = $db->insert($tblName,$QMData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['QuestionId'])){
            $QMData = array(
                'Chapter' => $_POST['Chapter'],
              'BookId' => $_POST['BookId'],
                
                
                
                'QuestionType' => $_POST['QuestionType'],
                'QuestionString' => $_POST['QuestionString'],
                'McqsOption' => $_POST['McqsOption']
            );
            $condition = array('QuestionId' => $_POST['QuestionId']);
            $update = $db->update($tblName,$QMData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['QuestionId'])){
            $condition = array('QuestionId' => $_POST['QuestionId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>