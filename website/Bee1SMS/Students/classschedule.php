 
  <link href="css/group.css" rel="stylesheet"/>
    <link rel="stylesheet" href="Clock/dist/bootstrap-clockpicker.css" /> 
    <link rel="stylesheet" href="Clock/dist/bootstrap-clockpicker.min.css" />
    <link rel="stylesheet" href="Clock/dist/jquery-clockpicker.css" /> 
    <link rel="stylesheet" href="Clock/dist/jquery-clockpicker.min.css" />  
    <link rel="stylesheet" href="Clock/src/clockpicker.css" /> 
    <link rel="stylesheet" href="Clock/src/standalone.css" /> 
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
          <!--class schedule section start-->
          <section id="ClassScheduleSection" style="display:none">
          <div  class="col-md-12">
          <div  class="row">
        <div  class="panel panel-default users-content">
            <div  class="panel-heading">Add New  Schedule <a href="javascript:void(0);"  class="glyphicon glyphicon-plus" id="ScheduleLink" onclick="javascript:$('#ScheduleForm').slideToggle();">Add</a></div>
            <div  class="panel-body none formData" id="ScheduleForm">
                <h2 id="actionLabel">Add  Schedule</h2>
                <form  class="form" id="ScheduleForm">
                    <div  class="col-xs-12">
                        <div  class="form-group input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true" style="width:80% !important;">
                        <label> From Time</label>
                        <input type="text" value="" data-default="09:00" class="form-control" name="FromTime" id="FromTime" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                        <div  class="form-group input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true" style="width:80% !important;">
                        <label> To Time</label>
                        <input type="text" value="" data-default="09:00" class="form-control" name="ToTime" id="ToTime" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                        <div  class="form-group" style="width:80% !important">
                        <label> Occurs</label>
                        <input type="text"  class="form-control" name="Occurs" id="Occurs" />
                        </div>
                        <div  class="form-group" style="width:80% !important">
                        <label> Teacher Subject</label>
                        <input type="text"  class="form-control" name="TeacherSubject" id="TeacherSubject" />
                        </div>
                    </div>                  
                    <a href="javascript:void(0);"  class="btn btn-warning" onclick="$('#ScheduleForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);"  class="btn btn-success" onclick="action('add')">Add Schedule</a>
                </form>
            </div>
            <div  class="panel-body none formData" id="ScheduleeditForm">
                <h2 id="actionLabel">Edit Schedule</h2>
                <form  class="form" id="ScheduleeditForm">
                    <div  class="col-xs-12">
                        <div  class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true" style="width:80% !important">
                        <label> From Time</label>
                        <input type="text" value="" data-default="09:00" class="form-control" name="FromTime" id="FromTimeEdit" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                        <div  class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true" style="width:80% !important">
                        <label> To Time</label>
                        <input type="text" value="" data-default="09:00" class="form-control" name="ToTime" id="ToTimeEdit" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                        <div  class="form-group" style="width:80% !important">
                        <label> Occurs</label>
                        <input type="text"  class="form-control" name="Occurs" id="OccursEdit" />
                        </div>
                        <div  class="form-group" style="width:80% !important">
                        <label> Teacher Subject</label>
                        <input type="text"  class="form-control" name="TeacherSubject" id="TeacherSubjectEdit" />
                        </div>
                    </div>
                 
                    <input type="hidden"  class="form-control" name="ClassSectionId" id="ClassSectionIdEdit"/>
                    <a href="javascript:void(0);"  class="btn btn-warning" onclick="$('#ScheduleeditForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);"  class="btn btn-success" onclick="action('edit')">Update Schedule</a>
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Section Schedule</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered example">
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
                <tbody id="ScheduleData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblclssecschedule',array('order_by'=>'ClassSectionId DESC'));
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
                            <a href="javascript:void(0);"  class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['ClassSectionId']; ?>')"></a>
                            <a href="javascript:void(0);"  class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?action('delete','<?php echo $user['ClassSectionId']; ?>'):false;"></a>
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
          <!--class schedule section end--> 
      </section>
      <script src="classschedule.js"></script>
      <script src="../javascript/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="/javascript/loadingoverlay/loadingoverlay.min.js"></script>
<script src="/javascript/loadingoverlay/loadingoverlay_progress.min.js"></script>
      <script src="Clock/dist/bootstrap-clockpicker.js"></script>
<script src="Clock/dist/bootstrap-clockpicker.min.js"></script>
<script src="Clock/dist/jquery-clockpicker.js"></script>
<script src="Clock/dist/bootstrap-clockpicker.min.js"></script>
<script src="Clock/src/clockpicker.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
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

</script>
      <!--close 1row 2nd column-->
          



          


        
</body>
  
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 

		  	
