
 

 <link href="css/group.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' ); 
 include($_SERVER['DOCUMENT_ROOT']."/appconfig.php");
 if(!isset($_SESSION['SupUser']))
 {
	 header('Location: /Admin/login.php');
 }
  
 
 ?>




 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************** -->
        <body>
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
<div class="col-md-12">
            
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Organization <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
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
                        <textarea class="form-control" name="Address" id="Address"></textarea>
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
                        <label>AdminPwd</label>
                        <input type="password" class="form-control" name="AdminPwd" id="AdmiPwd" />
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="actionOrg('add')">Add Menu</a>
                    </div>
                    
                    </div>
                   
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionOrgLabel">Edit Menu</h2>
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
                      <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="actionOrg('edit')">Update Menu</a>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="CityEdit"/>
                    </div>
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
                    
                    
                    </div>
                   
                </form>
            </div>
            
        </div>
    </div>

          <div class="row">
   <table id="example" class="table table-striped display table-responsive table-bordered">
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
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionOrg('delete','<?php echo $user['id']; ?>'):false;"></a>
                        </td>
                    </tr>
                    <?php endforeach;
                    else: ?>
                    <tr><td colspan="5">No user(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
       <div>

           
       
       
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
$(document).ready(function() {
   var table = $('#example').DataTable( {
		responsive: true,
		colReorder: true,
        
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        ]
    } );
	 $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	 
} );


  
</script>
