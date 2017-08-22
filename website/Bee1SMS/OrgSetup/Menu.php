
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
          <div>
    <div class="row" ng-controller="userController" ng-init="getRecords()">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Menu <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a></div>
            <div class="alert alert-danger none"><p></p></div>
            <div class="alert alert-success none"><p></p></div>
            <div class="panel-body none formData">
                <form class="form" name="userForm">
                
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>MenuCode</label>
                        <input type="text" class="form-control" name="MnuCode" ng-model="tempUserData.MnuCode"/>
                    </div>
                    <div class="form-group">
                        <label>MenuName</label>
                        <input type="text" class="form-control" name="MnuName" ng-model="tempUserData.MnuName"/>
                    </div>
                    <div class="form-group">
                        <label>MenuType</label>
                        <input type="text" class="form-control" name="MnuType" ng-model="tempUserData.MnuType"/>
                    </div>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" ng-model="tempUserData.GroupCode"/>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" ng-model="tempUserData.Position"/>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="Title" ng-model="tempUserData.Title"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" name="Detail" ng-model="tempUserData.Detail"/>
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
        <div class="col-md-12">
    <table id="example" class="display table table-stripped table-borderd table-responsive" cellspacing="0" width="100%" datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns">
        <thead>
            <tr>
                <th width="5%">#</th>
                    <th width="10%">MenuCode</th>
                    <th width="10%">MenuName</th>
                    <th width="10%">MenuType</th>
                   <th width="10%">GroupCode</th>
                   <th width="10%">Position</th>
                   <th width="30%">Title</th>
                   <th width="30%">Detail</th>
                    <th width="2%"></th>
                    <th width="2%"></th>
                
                
            </tr>
        </thead>
        
        <tbody>
            
           <tr ng-repeat="user in users | orderBy:'id'">
                    <td>{{$index + 1}}</td>
                    <td>{{user.MnuCode}}</td>
                    <td>{{user.MnuName}}</td>
                    <td>{{user.MnuType}}</td>
                    <td>{{user.GroupCode}}</td>
                    <td>{{user.Position}}</td>
                    <td>{{user.Title}}</td>
                    <td>{{user.Detail}}</td>

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


<script src="app/Menu.js"></script>

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

