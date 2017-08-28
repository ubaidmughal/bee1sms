 
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' ); 
 include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 ?>
 

 <link href="css/group.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/datatable/jquery.dataTables.min.css" />
    <link href="css/datatable/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="css/table-responsive.css" rel="stylesheet" />
    <link href="css/responsive.bootstrap.min.css" rel="stylesheet" />
<style>
    .dataTables_wrapper .dt-buttons {
  float:none !important;  
  text-align:right !important;
}
</style>
    <!--main content start-->
    <body>
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
          <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Groups <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Groups</h2>
                <form class="form" id="userForm" onsubmit='return formValidator()'>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCode" required />
                    </div>
                    <div class="form-group">
                        <label>GroupName</label>
                        <input type="text" class="form-control" name="GroupName" id="GroupName" required />
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="Position" required />
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add Group</a>
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit User</h2>
                <form class="form" id="userForm">
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCodeEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>GroupName</label>
                        <input type="text" class="form-control" name="GroupName" id="GroupNameEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="PositionEdit" required/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Group</a>
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Group</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>GroupCode</th>
                        <th>GroupName</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblmenugroup',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['GroupCode']; ?></td>
                        <td><?php echo $user['GroupName']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?action('delete','<?php echo $user['id']; ?>'):false;"></a>
                        </td>
                    </tr>
                    <?php endforeach;
                    else: ?>
                    <tr><td colspan="5">No Record(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
   
       <div>

           
       
       
   </div>
    </div>
          </div>
              
                 
      </section>
      <!--close 1row 2nd column-->

</body>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 
<script src="../javascript/angular.min.js"></script>


<script src="app/app.js"></script>
 <script>

     $(document).ready(function () {

   var table = $('#example').DataTable( {
	   
		responsive: true,
		colReorder: true,
        
        dom: 'Bfrtip',
        buttons: {
            dom: {
                button: {
                    tag: 'a'
                }
            },
            buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
        }
            ]
        }
    } );
	 $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	

	
	  

} );

     //$('#example').prepend('<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">dropdown<span class="caret"></span></button><ul class="dropdown-menu"><li></li></ul></div>');
</script>
