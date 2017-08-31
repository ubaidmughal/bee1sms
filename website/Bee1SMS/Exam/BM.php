 
 <?php include($server['DOCUMENT_ROOT']. 'Examheader.php' ); ?>
 
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
          	<h3>Book Master !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Books<a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                
                <form class="form" id="userForm" onsubmit='return formValidator()'>
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>BookName</label>
                        <input type="text" class="form-control" name="BookName" id="BookName"  >
                            
                    </div>
                         <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="Author" id="Author"  />
                    </div>
                        
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" name="Publisher" id="Publisher"/>
                    </div>
                    
                    <div class="form-group">
                        <label>ContactPerson</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson"  >

                    </div>
                        
                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidator()">Add Books</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Books Master</h2>
                <form class="form" id="userForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>Book Name</label>
                        <input type="text" class="form-control" name="BookName" id="BookNameEdit"  >
                            
                    </div>
                        
                        <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="Author" id="AuthorEdit" />
                    </div>
                        
                  </div>
                    <div class="col-md-6">  
                   
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" name="Publisher" id="PublisherEdit" class="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label>ContactPerson</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPersonEdit" />
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="BookId" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidator()">Update Contact Info</a>
                    </div>
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">Books Master</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>BooKName</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>ContactPerson</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblbookmaster',array('order_by'=>'BookId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['BookName']; ?></td>
                        <td><?php echo $user['Author']; ?></td>
                        <td><?php echo $user['Publisher']; ?></td>
                        <td><?php echo $user['ContactPerson']; ?></td>
                       
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['BookId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionBM('delete','<?php echo $user['BookId']; ?>'):false;"></a>
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
<script src="app/BM.js"></script>
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
		  	
