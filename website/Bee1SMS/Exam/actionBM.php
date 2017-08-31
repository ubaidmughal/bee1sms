<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblbookmaster';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('BookId'=>$_POST['BookId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'BookId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['BookName'].'</td>';
              
                echo '<td>'.$user['Author'].'</td>';
                echo '<td>'.$user['Publisher'].'</td>';
                echo '<td>'.$user['ContactPerson'].'</td>';
                
              
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['BookId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionBM(\'delete\',\''.$user['BookId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No Records(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
       
            $userData = array(
                'BookName' => $_POST['BookName'],

                
                'Author' => $_POST['Author'],
                'Publisher' => $_POST['Publisher'],
                'ContactPerson' => $_POST['ContactPerson'],
            
            );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['BookId'])){
            $userData = array(
              'BookName' => $_POST['BookName'],
                
                
                
                'Author' => $_POST['Author'],
                'Publisher' => $_POST['Publisher'],
                'ContactPerson' => $_POST['ContactPerson']
            );
            $condition = array('BookId' => $_POST['BookId']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['BookId'])){
            $condition = array('BookId' => $_POST['BookId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>