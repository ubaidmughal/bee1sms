 
 <link href="css/group.css" rel="stylesheet"/>
 <?php include('studentheader.php');
       include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 
 ?>

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
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
            <div class="panel-heading">Add New Students <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Students</h2>
                <form class="form" id="userForm">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                        <label>Student Code</label>
                        <input type="text" class="form-control" name="StudentCode" id="StudentCode" required />
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="StudentName" id="StudentName" required />
                    </div>
                    <div class="form-group">
                        <label>Family Group</label>
                        <input type="text" class="form-control" name="FamilyGroup" id="FamilyGroup" required />
                    </div>
                    <div class="form-group">
                        <label>Name Of Group</label>
                        <input type="text" class="form-control" name="NameOfGroup" id="NameOfGroup" required />
                    </div>
                    <div class="form-group">
                        <input type="radio" name="Gender" value="male"/>Male <br /><input type="radio" name="Gender" value="female"/>Female
                    </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherName" required />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="Age" id="Age" required />
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="DOB" />
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="Address" rows="3" required ></textarea>
                    </div>
                    </div>
                    
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="action('add')">Add Students</a>
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit User</h2>
                <form class="form" id="userForm">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                        <label>Student Code</label>
                        <input type="text" class="form-control" name="StudentCode" id="StudentCodeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="StudentName" id="StudentNameEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Family Group</label>
                        <input type="text" class="form-control" name="FamilyGroup" id="FamilyGroupEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Name Of Group</label>
                        <input type="text" class="form-control" name="NameOfGroup" id="NameOfGroupEdit" required />
                    </div>
                    <div class="form-group">
                        <input type="radio" name="Gender" value="male"/>Male <br /><input type="radio" name="Gender" value="female"/>Female
                    </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherNameEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="Age" id="AgeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="DOBEdit" />
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPersonEdit" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="AddressEdit" rows="3" required ></textarea>
                    </div>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="action('edit')">Update Students</a>
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Students</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Code</th>
                        <th>Student Name</th>
                        <th>Family Group</th>
                        <th>Name Of Group</th>
                        <th>Father Name</th>
                        <th>Age</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblstudent',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['StudentCode']; ?></td>
                        <td><?php echo $user['StudentName']; ?></td>
                        <td><?php echo $user['FamilyGroup']; ?></td>
                        <td><?php echo $user['NameOfGroup']; ?></td>
                        <td><?php echo $user['FatherName']; ?></td>
                        <td><?php echo $user['Age']; ?></td>
                        <td><?php echo $user['DOB']; ?></td>
                        <td><?php echo $user['Gender']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['ContactPerson']; ?></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', { type: 'date' });
    webshims.setOptions('forms-ext', { type: 'time' });
    webshims.polyfill('forms forms-ext');
</script>
<script src="student.js"></script>
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

      <!--main content end-->
	  <!-- js placed at the end of the document so the pages load faster -->
      <script src="../javascript/jquery.js" type="text/javascript"></script>
      <script src="../javascript/bootstrap.js" type="text/javascript"></script>
      <script src="../javascript/bootstrap.min.js" type="text/javascript"></script>
      <script src="../javascript/jquery.scrollTo.min.js" type="text/javascript"></script>
      <script src="../javascript/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
      <script src="../javascript/common-scripts.js" type="text/javascript"></script>
      <script src="../javascript/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	 <?php include('../footer.php');?>
		  	
