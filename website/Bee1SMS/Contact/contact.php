 
 <?php include($server['DOCUMENT_ROOT']. 'contactheader.php' ); ?>
 
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
          	<h3>Contact Information !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Contact Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
                <form class="form" id="userForm" onsubmit='return formValidator()'>
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>ContactType</label>
                        <select class="form-control" name="ContactType" id="ContactType"  >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="Name" id="Name"  />
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address"  />
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="Phone"  />
                    </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" id="Email"  />
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" class="form-control" name="DOB" id="DOB"/>
                    </div>
                    <div class="form-group">
                        <label>TimeOfContact</label>
                        <input type="text" class="form-control" name="TimeOfContact" id="TimeOfContact" />
                    </div>
                    <div class="form-group">
                        <label>WayofContact</label>
                        <select class="form-control" name="WayOfContact" id="WayOfContact"  >

                            <option>Morning</option>
                            <option>Noon</option>
                            <option>Evening</option>
                            <option>Night</option>
                        </select>
                    </div>
                        <div class="form-group">
                        <label>Profession</label>
                        <input type="text" class="form-control" name="Profession" id="Profession"  />
                    </div>
                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add Contact Info</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Contact Info</h2>
                <form class="form" id="userForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>ContactType</label>
                        <select class="form-control" name="ContactType" id="ContactTypeEdit"  >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                        
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="Name" id="NameEdit" />
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="AddressEdit" />
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="Phone" id="PhoneEdit" />
                    </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" id="EmailEdit"/>
                    </div>
                  </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" class="form-control" name="DOB" id="DOBEdit"/>
                    </div>
                    <div class="form-group">
                        <label>TimeofContact</label>
                        <input type="text" name="TimeOfContact" id="TimeOfContactEdit" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>WayofContact</label>
                        <select class="form-control" name="WayOfContact" id="WayOfContactEdit"  >

                            <option>Morning</option>
                            <option>Noon</option>
                            <option>Evening</option>
                            <option>Night</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" class="form-control" name="Profession" id="ProfessionEdit" />
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="ContactId" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Contact Info</a>
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
                        <th>ContactType</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>TimeOfContact</th>
                        <th>WayofContact</th>
                        <th>Profession</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblcontacts',array('order_by'=>'ContactId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['ContactType']; ?></td>
                        <td><?php echo $user['Name']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['Phone']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td><?php echo $user['DOB']; ?></td>
                        <td><?php echo $user['TimeOfContact']; ?></td>
                        <td><?php echo $user['WayOfContact']; ?></td>
                        <td><?php echo $user['Profession']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['ContactId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionContact('delete','<?php echo $user['ContactId']; ?>'):false;"></a>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="app/contact.js"></script>
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
		  	
