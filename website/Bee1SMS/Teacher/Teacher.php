 
 <?php include($server['DOCUMENT_ROOT']. 'Teaheader.php' ); ?>
 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../Css/datatable/jquery.dataTables.min.css" />
    <link href="../Css/datatable/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="../Css/table-responsive.css" rel="stylesheet" />
    <link href="../Css/responsive.bootstrap.min.css" rel="stylesheet" />
<link href="css/group.css" rel="stylesheet" />
 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3>Teacher Information !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Teacher Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
                <form class="form" id="userForm" onsubmit='return formValidator()'>
                  
                         
                    
                    <div class="form-group">
                        <label>Teacher Contact</label>
                        <input type="text" class="form-control" name="TeacherContact" id="TeacherContact"  />
                    </div>
                        <div class="form-group">
                        <label>TeacherQualification</label>
                        <input type="text" class="form-control" name="TeacherQualification" id="TeacherQualification"  />
                    </div>
                        
                   
              
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add Teacher Info</a>
                       
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Teacher Info</h2>
                <form class="form" id="userForm">
                    
                        
                        
                        <div class="form-group">
                        <label>Teacher Contact</label>
                        <input type="text" class="form-control" name="TeacherContact" id="TeacherContactEdit" />
                    </div>
                        <div class="form-group">
                        <label>Teacher Qualification</label>
                        <input type="text" class="form-control" name="TeacherQualification" id="TeacherQualificationEdit" />
                    </div>
                        
                
            
                         <input type="hidden" class="form-control" name="TId" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Teacher Info</a>
                    
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">Teacher Info</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher Contact</th>
                        <th>Teacher Qualification</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblteachers',array('order_by'=>'TId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['teachercontact']; ?></td>
                        <td><?php echo $user['teacherqualification']; ?></td>
                        
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['TId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionTeacher('delete','<?php echo $user['TId']; ?>'):false;"></a>
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
   
     

           
       
       
   
          		
          	
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="app/Teacher.js"></script>
 <script>

     $(document).ready(function () {

         var table = $('#example').DataTable({

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
         });
         $('a.toggle-vis').on('click', function (e) {
             e.preventDefault();

             // Get the column API object
             var column = table.column($(this).attr('data-column'));

             // Toggle the visibility
             column.visible(!column.visible());
         });

         webshims.setOptions('waitReady', false);
         webshims.setOptions('forms-ext', { type: 'date' });
         webshims.setOptions('forms-ext', { type: 'time' });
         webshims.polyfill('forms forms-ext');


     });

     //$('#example').prepend('<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">dropdown<span class="caret"></span></button><ul class="dropdown-menu"><li></li></ul></div>');
</script>

 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	
