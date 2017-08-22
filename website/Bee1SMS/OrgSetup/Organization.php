
 

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
      *********************************************************************************************************************************************************** -->
        <body ng-app="crudApp">
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
<div class="col-md-12">
          <div>
    <div class="row" ng-controller="userController" ng-init="getRecords()">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Organization <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a></div>
            <div class="alert alert-danger none"><p></p></div>
            <div class="alert alert-success none"><p></p></div>
            <div class="panel-body none formData">
                <form class="form" name="userForm">
                
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Organization Code</label>
                        <input type="text" class="form-control" name="OrgCode" ng-model="tempUserData.OrgCode"/>
                    </div>
                    <div class="form-group">
                        <label>Organization Name</label>
                        <input type="text" class="form-control" name="OrgName" ng-model="tempUserData.OrgName"/>
                    </div>
                    <div class="form-group">
                        <label>Organization Type</label>
                        <input type="text" class="form-control" name="OrgType" ng-model="tempUserData.OrgType"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="Description" ng-model="tempUserData.Description"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" ng-model="tempUserData.Address"/>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" ng-model="tempUserData.City"/>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="State" ng-model="tempUserData.State"/>
                    </div>
                    <div class="form-group">
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name="ZipCode" ng-model="tempUserData.ZipCode"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" ng-model="tempUserData.Phone"/>
                    </div>
                    <div class="form-group">
                        <label>AdminId</label>
                        <input type="text" class="form-control" name="AdminId" ng-model="tempUserData.AdminId"/>
                    </div>
                    <div class="form-group">
                        <label>AdminPwd</label>
                        <input type="password" class="form-control" name="AdminPwd" ng-model="tempUserData.AdminPwd"/>
                    </div>
                    <div class="form-group">
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('.formData').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="tempUserData.id" ng-click="addUser()">Add Menu</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="!tempUserData.id" ng-click="updateUser()">Update Menu</a>
                    </div>
                    </div>
                    
                </form>
            </div>
            
        </div>
             <!-- DeleteModal -->
		     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="DeleteModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h3 class="modal-ZipCode">Delete</h3>
		                      </div>
		                      <div class="modal-body">
		                    
                              <h3>Are you Sure want to delete ?</h3>
		                      
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button type="submit" class="btn btn-warning btn-md" style="padding:7px 45px !important;">Delete</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		     <!-- modal -->
             
            <div class="col-md-12">
            <hr>
            <br>
           
            <table id="example" class="display table table-stripped table-borderd table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th >OrgCode</th>
                <th>OrgName</th>
                <th>OrgType</th>
                <th>Description</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>ZipCode</th>
                <th>Phone</th>
                <th>AdminId</th>
                
                
            </tr>
        </thead>
        
        <tbody>
           <tr ng-repeat="user in users | orderBy:'id'">
                    <td>{{$index + 1}}</td>
                    <td>{{user.OrgCode}}</td>
                    <td>{{user.OrgName}}</td>
                    <td>{{user.OrgType}}</td>
                    <td>{{user.Description}}</td>
                    <td>{{user.Address}}</td>
                    <td>{{user.City}}</td>
                    <td>{{user.State}}</td>
                    <td>{{user.ZipCode}}</td>
                    <td>{{user.Phone}}</td>
                   <td>{{user.AdminId}}</td>
                   
                    <td>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="editUser(user)"></a>

                    </td>
                    <td>
                    <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteUser(user)"></a>
                    
                    </td>
                </tr>
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
