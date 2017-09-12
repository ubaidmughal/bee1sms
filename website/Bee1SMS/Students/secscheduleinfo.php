    
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
            <div class="panel-heading">Add New Schedule <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Schedule</h2>
                <form class="form" id="userForm">
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>From Time</label>
                        <input type="Time" class="form-control" name="FromTime" id="FromTime" required />
                    </div>
                    <div class="form-group">
                        <label>To Time</label>
                        <input type="Time" class="form-control" name="ToTime" id="ToTime" required />
                    </div>
                    <div class="form-group">
                        <label>Occurs</label>
                        <input type="text" class="form-control" name="Occurs" id="Occurs" required />
                    </div>
                    <div class="form-group">
                        <label>Teacher Subject</label>
                        <input type="text" class="form-control" name="TeacherSubject" id="TeacherSubject" required />
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add Schedule</a>
                    </div>
                    </div>
                    
                    
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Schedule</h2>
                <form class="form" id="userForm">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                        <label>From Time</label>
                        <input type="Time" class="form-control" name="FromTime" id="FromTimeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>To Time</label>
                        <input type="Time" class="form-control" name="ToTime" id="ToTimeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Occurs</label>
                        <input type="text" class="form-control" name="Occurs" id="OccursEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Teacher Subject</label>
                        <input type="text" class="form-control" name="TeacherSubject" id="TeacherSubjectEdit" required />
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Schedule</a>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Schedule</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Occurs</th>
                        <th>Teacher Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblclssecschedule',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['FromTime']; ?></td>
                        <td><?php echo $user['ToTime']; ?></td>
                        <td><?php echo $user['Occurs']; ?></td>
                        <td><?php echo $user['TeacherSubject']; ?></td>
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
<script src="secschedule.js"></script>
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
	
	 webshims.setOptions('waitReady', false);
	 webshims.setOptions('forms-ext', { type: 'date' });
	 webshims.setOptions('forms-ext', { type: 'time' });
	 webshims.polyfill('forms forms-ext');
	
	  

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
		  	