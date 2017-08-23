
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' ); 
 include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
?>
 

 <link href="css/group.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!--main content start-->
     <body>
      <section id="main-content">
      <!--insert New Menu-->
          
        <section class="wrapper">
          <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Menu <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
                <form class="form" id="userForm">
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>MenuCode</label>
                        <input type="text" class="form-control" name="MenuCode" id="MenuCode"/>
                    </div>
                    <div class="form-group">
                        <label>MenuName</label>
                        <input type="text" class="form-control" name="MenuName" id="MenuName"/>
                    </div>
                    <div class="form-group">
                        <label>MenuType</label>
                        <input type="text" class="form-control" name="MenuType" id="MenuType"/>
                    </div>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCode"/>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="Position"/>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="Title" id="Title"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="Detail" id="Detail"></textarea> 
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="action('add')">Add Menu</a>
                    </div>
                    
                    </div>
                   
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Menu</h2>
                <form class="form" id="userForm">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>MenuCode</label>
                        <input type="text" class="form-control" name="MenuCode" id="MenuCodeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>MenuName</label>
                        <input type="text" class="form-control" name="MenuName" id="MenuNameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>MenuType</label>
                        <input type="text" class="form-control" name="MenuType" id="MenuTypeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCodeEdit"/>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="PositionEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="Title" id="TitleEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="Detail" id="DetailEdit"></textarea> 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="action('edit')">Update Menu</a>
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
                        <th>MenuCode</th>
                        <th>MenuName</th>
                        <th>MenuType</th>
                        <th>GroupCode</th>
                        <th>Position</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblmenus',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['MenuCode']; ?></td>
                        <td><?php echo $user['MenuName']; ?></td>
                        <td><?php echo $user['MenuType']; ?></td>
                        <td><?php echo $user['GroupCode']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td><?php echo $user['Title']; ?></td>
                        <td><?php echo $user['Detail']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?action('delete','<?php echo $user['id']; ?>'):false;"></a>
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


<script src="app/Menu.js"></script>



<script>

    $(document).ready(function () {
        var table = $('#example').DataTable({

            responsive: true,
            colReorder: true,

            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ]
        });
        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });





    });


</script>