 
 <?php include('Teaheader.php' ); ?>
 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> 
 
 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	
          
              <div class="alert" style="display:none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
              <section id="Sec_TInfo" style="display:none;">
          	<h3>Teacher Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add Teacher  Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfo" onclick="javascript:$('#addFormTeacher').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormTeacher">
<form id="TeacherForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>Teacher Contact</label>
     <input type="text" name="TContact" id="TContact" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
     </div>
     <div class="col-md-6">
     
     <div class="form-group">
     <label>Teacher Qualification</label>
     <input type="text" name="TQualification" id="TQualification" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormTeacher').slideUp();">Cancel</a>
    <input type="hidden" name="action" id="action" />  
    <input type="hidden" name="teacher_id" id="teacher_id" />  
   <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">Teacher Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
	 <th>Teacher Contact</th>
     <th>Teacher Qualification</th>
   
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="user_table">
                   <?php 
				   $query = "SELECT * FROM tblteachers ORDER BY TId";
                   $result = mysqli_query($con, $query);
                   $i=1;
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     <td>'.$i.'</td>
	 <td>'.$row["teachercontact"].'</td>
	 <td>'.$row["teacherqualification"].'</td>
    
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["TId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["TId"].'"></a></td>
    </tr>
   ';
  }
  $output ;
  echo $output;
				   ?>
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

		  	           
		  	            $('#Sec_TInfo').show();
		  	           
		  	        });
		  	    });
		  	</script>
