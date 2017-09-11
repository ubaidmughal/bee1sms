 
 <?php include('Teaheader.php' ); ?>
 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3>Teacher Information !</h3>
          
              <section id="Sec_TInfo">

                    <div class="panel panel-default users-content">
            <div class="panel-heading">Add Teacher Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkTInfo" onclick="javascript:$('#addFormTInfo').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormTInfo">
                
                <form class="form" id="TInfoForm" onsubmit='return formValidatorTInfo()'>
                  
                         
                    
                    <div class="form-group">
                        <label>Teacher Contact</label>
                        <input type="text" class="form-control" name="TeacherContact" id="TeacherContact"  />
                    </div>
                    <div class="form-group">
                        <label>TeacherQualification</label>
                        <input type="text" class="form-control" name="TeacherQualification" id="TeacherQualification"  />
                    </div>
                        
                   
              
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormTInfo').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorTInfo()">Add Teacher Info</a>
                       
                </form>
            </div>
            <div class="panel-body none formData" id="editFormTInfo">
                <h2 id="actionLabel">Edit Teacher Info</h2>
                <form class="form" id="TInfoForm">
                    
                        
                        
                        <div class="form-group">
                        <label>Teacher Contact</label>
                        <input type="text" class="form-control" name="TeacherContact" id="TeacherContactEdit" />
                    </div>
                        <div class="form-group">
                        <label>Teacher Qualification</label>
                        <input type="text" class="form-control" name="TeacherQualification" id="TeacherQualificationEdit" />
                    </div>
                        
                
            
                         <input type="hidden" class="form-control" name="TId" id="idEditTInfo"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormTInfo').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorTInfo()">Update Teacher Info</a>
                    
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">Teacher Info</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher Contact</th>
                        <th>Teacher Qualification</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="TInfoData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblteachers',array('order_by'=>'TId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['teachercontact']; ?></td>
                        <td><?php echo $user['teacherqualification']; ?></td>
                        
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editTInfo('<?php echo $user['TId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionTeacher('delete','<?php echo $user['TId']; ?>'):false;"></a>
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
              </section>	
          		
      
   
     

           
       
       
   
          		
          	
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	
<script src="app/Teacher.js"></script>
 

 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	<script>

		  	    $(document).ready(function () {


		  	        $('#TInfo').click(function () {

		  	            $.LoadingOverlay('show');
		  	            $('#Sec_TIfo').show();
		  	            $.LoadingOverlay('hide');
		  	        });
		  	    });
		  	</script>
