<?php
include 'DB.php';
$db = new DB();
$tblName = 'tblstudent';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('StudentId'=>$_POST['StudentId']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'StudentId DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user):
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$user['StudentCode'].'</td>';
                echo '<td>'.$user['StudentName'].'</td>';
                echo '<td>'.$user['FamilyGroup'].'</td>';
                echo '<td>'.$user['NameOfGroup'].'</td>';
                echo '<td>'.$user['FatherName'].'</td>';
                echo '<td>'.$user['Class'].'</td>';
                echo '<td>'.$user['Section'].'</td>';
                echo '<td>'.$user['Age'].'</td>';
                echo '<td>'.$user['DOB'].'</td>';
                echo '<td>'.$user['Gender'].'</td>';
                echo '<td>'.$user['Address'].'</td>';
                echo '<td>'.$user['ContactPerson'].'</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editStd(\''.$user['StudentId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?actionstd(\'delete\',\''.$user['StudentId'].'\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
        $stdData = array(
            'StudentCode' => $_POST['StudentCode'],
            'StudentName' => $_POST['StudentName'],
            'FamilyGroup' => $_POST['FamilyGroup'],
            'NameOfGroup' => $_POST['NameOfGroup'],
            'FatherName' => $_POST['FatherName'],
            'Class' => $_POST['Class'],
            'Section' => $_POST['Section'],
            'Age' => $_POST['Age'],
            'DOB' => $_POST['DOB'],
            'Gender' => $_POST['Gender'],
            'Address' => $_POST['Address'],
            'ContactPerson' => $_POST['ContactPerson']
            
        );
        $insert = $db->insert($tblName,$stdData);
        echo $insert?'ok':'err';
    }elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['StudentId'])){
            $stdData = array(
        'StudentCode' => $_POST['StudentCode'],
            'StudentName' => $_POST['StudentName'],
            'FamilyGroup' => $_POST['FamilyGroup'],
            'NameOfGroup' => $_POST['NameOfGroup'],
            'FatherName' => $_POST['FatherName'],
            'Class' => $_POST['Class'],
            'Section' => $_POST['Section'],
            'Age' => $_POST['Age'],
            'DOB' => $_POST['DOB'],
            'Gender' => $_POST['Gender'],
            'Address' => $_POST['Address'],
            'ContactPerson' => $_POST['ContactPerson']
            );
            $condition = array('StudentId' => $_POST['StudentId']);
            $update = $db->update($tblName,$stdData,$condition);
            echo $update?'ok':'err';
        }
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['StudentId'])){
            $condition = array('StudentId' => $_POST['StudentId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}
?>