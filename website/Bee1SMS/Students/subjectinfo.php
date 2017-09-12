 
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
            <div class="panel-heading">Add New Subject <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkSub" onclick="javascript:$('#addFormSub').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSub">
                <h2 id="actionLabel">Add Subject</h2>
                <form class="form" id="SubForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" class="form-control" name="SubjectName" id="SubjectName" />
                    </div>
                   
                    </div>    
                    <div class="col-md-12">           
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSub').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="actionsub('add')">Add Subject</a>
                        </div>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormSub">
                <h2 id="actionLabel">Edit Section</h2>
                <form class="form" id="SubForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" class="form-control" name="SubjectName" id="SubjectNameEdit" required />
                    </div>
                    </div>
                    <div class="col-md-12">
                    <input type="hidden" class="form-control" name="SubjectId" id="idEditSub"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormSub').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="actionsub('edit')">Update Subject</a>
                     </div>
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Subjects</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="subData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblsubject',array('order_by'=>'SubjectId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['SubjectName']; ?></td> 
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSub('<?php echo $user['SubjectId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionsub('delete','<?php echo $user['SubjectId']; ?>'):false;"></a>
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
          
          <script src="subject.js"></script>
          <script src="../javascript/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>

 <script>

     $(document).ready(function () {

         var table = $('.example').DataTable({

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
</script>
        
</body>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 

		  	
