
 

 <link href="css/group.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<style>
    .dataTables_wrapper .dt-buttons {
  float:none !important;  
  text-align:right !important;
  padding:5px 0;
}
</style>
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' ); 
 include($_SERVER['DOCUMENT_ROOT']."/appconfig.php");
 if(!isset($_SESSION['SupUser']))
 {
	 header('Location: /Admin/login.php');
 }
  
 
 ?>




  <body>
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
          <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Organization <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h4 id="actionLabel">Add Org</h4>
                <form class="form" id="userForm">
                    <div class="col-md-6">

                           <div class="form-group">
                        <label>OrganizationCode</label>
                        <input type="text" class="form-control" name="OrgCode" id="OrgCode"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationName</label>
                        <input type="text" class="form-control" name="OrgName" id="OrgName"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationType</label>
                        <input type="text" class="form-control" name="OrgType" id="OrgType"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description" id="Description"></textarea>
                    </div>
                        
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address"/>
                    </div>
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="City"/>
                    </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="State" id="State"/>
                    </div>
                        <div class="form-group">
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name="ZipCode" id="ZipCode"/>
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="Phone"/>
                    </div>
                        <div class="form-group">
                        <label>AdminId</label>
                        <input type="text" class="form-control" name="AdminId" id="AdminId"/>
                    </div>
                        <div class="form-group">
                        <label>AdminPassword</label>
                        <input type="password" class="form-control" name="AdminPwd" id="AdminPwd"/>
                    </div>
                        <div class="form-group">
                           <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add User</a>
                    </div>
                    </div>
              
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h4 id="actionLabel">Edit User</h4>
                <form class="form" id="userForm">
                    <div class="col-md-6">

                          <div class="form-group">
                        <label>OrganizationCode</label>
                        <input type="text" class="form-control" name="OrgCode" id="OrgCodeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationName</label>
                        <input type="text" class="form-control" name="OrgName" id="OrgNameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationType</label>
                        <input type="text" class="form-control" name="OrgType" id="OrgTypeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description" id="DescriptionEdit"></textarea>
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="AddressEdit"></textarea>
                    </div>
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="CityEdit"/>
                    </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="State" id="StateEdit"/>
                    </div>
                       <div class="form-group">
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name="ZipCode" id="ZipCodeEdit"/>
                    </div>
                       <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="PhoneEdit"/>
                    </div>
                       <div class="form-group">
                        <label>AdminId</label>
                        <input type="text" class="form-control" name="AdminId" id="AdminIdEdit"/>
                    </div>
                       <div class="form-group">
                        <label>AdminPwd</label>
                        <input type="password" class="form-control" name="AdminPwd" id="AdminPwdEdit"/>
                    </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Organization</a>
                        </div>
                    </div>
                  
                </form>
            </div>
            
        </div>
    </div>
    <div class="row">
    <div class="panel panel-primary">
   <div class="panel-heading">Organization</div>
       <div class="panel-body">

           <table id="example" class="table table-striped display table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>OrgCode</th>
                        <th>OrgName</th>
                        <th>OrgType</th>
                         <th>Description</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                         <th>ZipCode</th>
                        <th>Phone</th>
                        <th>AdminId</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblorg',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['OrgCode']; ?></td>
                        <td><?php echo $user['OrgName']; ?></td>
                        <td><?php echo $user['OrgType']; ?></td>
                        <td><?php echo $user['Description']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['City']; ?></td>
                        <td><?php echo $user['State']; ?></td>
                        <td><?php echo $user['ZipCode']; ?></td>
                        <td><?php echo $user['Phone']; ?></td>
                        <td><?php echo $user['AdminId']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?Orgaction('delete','<?php echo $user['id']; ?>'):false;"></a>
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
                 
     
    
                 
      </section>
      <!--close 1row 2nd column-->
          </body>
	 
	 
	  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 
<script src="../javascript/angular.min.js"></script>


<script src="app/Org.js"></script>

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