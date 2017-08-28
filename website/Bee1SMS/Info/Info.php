 
 <?php include($server['DOCUMENT_ROOT']. 'infoheader.php' ); ?>
 
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
          	<h3>School Information !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add School Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
                <form class="form" id="userForm" onsubmit='return formValidator()'>
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>SchoolName</label>
                        <input type="text" class="form-control" name="SchoolName" id="SchoolName" required />
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" id="logo" />
                    </div>
                    <div class="form-group">
                        <label>Reg#</label>
                        <input type="text" class="form-control" name="Reg" id="Reg" required />
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address" required />
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="Latitude" id="Latitude" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="Longitude" id="Longitude" required />
                    </div>

                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="infoaction('add')">Add School Info</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit School Info</h2>
                <form class="form" id="userForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>SchoolName</label>
                        <input type="text" class="form-control" name="SchoolName" id="SchoolNameEdit" required/>
                    </div>
                        <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="Logo" id="LogoEdit" required/>
                    </div>
                        <div class="form-group">
                        <label>Reg</label>
                        <input type="text" class="form-control" name="Reg" id="RegEdit" required/>
                    </div>
                  </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="AddressEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="Latitude" id="LatitudeEdit" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="Longitude" id="LongitudeEdit" required/>
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="SchoolId" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="infoaction('edit')">Update School Info</a>
                    </div>
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">School Info</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SchoolName</th>
                        <th>Logo</th>
                        <th>Reg #</th>
                        <th>Address</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblschoolinfo',array('order_by'=>'SchoolId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['SchoolName']; ?></td>
                        <td><img src="<?php echo $user['Logo']; ?>" /></td>
                        <td><?php echo $user['Reg']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['Latitude']; ?></td>
                        <td><?php echo $user['Longitude']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['SchoolId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?infoaction('delete','<?php echo $user['SchoolId']; ?>'):false;"></a>
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
   
     

           
       
       
   </div>
    </div>
          		
          	
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	

<script src="app/info.js"></script>
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





     });

     //$('#example').prepend('<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">dropdown<span class="caret"></span></button><ul class="dropdown-menu"><li></li></ul></div>');
</script>