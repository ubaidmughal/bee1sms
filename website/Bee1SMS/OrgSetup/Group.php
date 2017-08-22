 
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' ); 
 include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
?>
 

 <link href="css/group.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">


    <!--main content start-->
    <body ng-app="crudApp">
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
<div class="col-md-12">
          <div ng-controller="userController" ng-init="getRecords()">
    <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Group <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a></div>
            <div class="alert alert-danger none"><p></p></div>
            <div class="alert alert-success none"><p></p></div>
            <div class="panel-body none formData">
                <form class="form" name="userForm">
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" ng-model="tempUserData.GroupCode"/>
                    </div>
                    <div class="form-group">
                        <label>GroupName</label>
                        <input type="text" class="form-control" name="GroupName" ng-model="tempUserData.GroupName"/>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" ng-model="tempUserData.Position"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('.formData').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="tempUserData.id" ng-click="addUser()">Add Group</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="!tempUserData.id" ng-click="updateUser()">Update Group</a>
                </form>
            </div>
            
        </div>
    </div>
    <div class="row">
    <table id="example" class="display table table-stripped table-borderd table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">#</th>
                    <th>GroupCode</th>
                    <th>GroupName</th>
                    <th>Position</th>
                   
                    <th></th>
                
                
            </tr>
        </thead>
        
        <tbody>
            
           <tr ng-repeat="user in users | orderBy:'id'">
                    <td>{{$index + 1}}</td>
                    <td>{{user.GroupCode}}</td>
                    <td>{{user.GroupName}}</td>
                    <td>{{user.Position}}</td>

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
              
                 
      </section>
      <!--close 1row 2nd column-->

</body>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 
<script src="../javascript/angular.min.js"></script>


<script src="app/app.js"></script>
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
 <script type="text/javascript">
     Group.init();
    </script>