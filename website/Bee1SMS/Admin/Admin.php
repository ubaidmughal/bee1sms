 

 <?php include('Adminheader.php' ); ?>
 
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
              <section id="Sec_Admin" style="display:none;">
          	<h3>Admin Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add Admin Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfo" onclick="javascript:$('#addFormAdmin').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormAdmin">
<form id="AdminForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>UserName</label>
     <input type="text" name="UserName" id="UserName" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>

     <div class="form-group">
     <label>Email</label>
     <input type="email" name="Email" id="Email" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     </div>
     <div class="col-md-6">
     
     
     <div class="form-group">
     <label>Date Registration</label>
     <input type="date" name="DateReg" id="DateReg" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     <div class="form-group">
     <label>Password</label>
     <input type="Password" name="Password" id="Password" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormAdmin').slideUp();">Cancel</a>
    <input type="hidden" name="action" id="action" />  
    <input type="hidden" name="user_id" id="user_id" />  
   <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">Admin Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
	 <th>UserName</th>
     <th>Email</th>
     <th>DateReg</th>
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="user_table">
                   <?php 
				   $query = "SELECT * FROM tbluser ORDER BY AdminId";
                   $result = mysqli_query($con, $query);
                   $i=1;
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     <td>'.$i.'</td>
	 <td>'.$row["UserName"].'</td>
	 <td>'.$row["Eamil"].'</td>
	 <td>'.$row["DateReg"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["AdminId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["AdminId"].'"></a></td>
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
           <section id="Sec_ImportExport" style="display:none;">
           <br>
           <div class="col-md-12">
                  	<h3>Import & Export Data !</h3>
           </div>
           <br/>
           <br/>
                   
          

  
                <form id="upload_csv" method="post" enctype="multipart/form-data">  
                     
                          <br />  
                         
                          <div class="col-md-12">
                          <div id="result" name="result" class="text-success"></div> 

                          </div> 
                     <div class="col-md-4">
                   <select class="form-control" name="SelectTable">
                   <option>-----Select-----</option>
                   <option>Class</option>
                   <option>Section</option>
                   <option>Subjcet</option>
                   <option>Teacher</option>
                   <option>Activity</option>
                   <option>Class Schedule</option>
                   <option>Student</option>
                   <option>Contact</option>
                   <option>Book Master</option>
                   <option>Question Master</option>
                   </select>
                   </div>
                     <div class="col-md-4">  
                          <input type="file" name="class_file" id="class_file" class="form-control" />  
                     </div>  
                     <div class="col-md-4">  
                          <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
                     </div>  
                      
                </form>  
            
          
              </section>
          
   	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->



 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	<script src="Admin.js"></script>
              <script src="Import.js"></script>
<script>

    $(document).ready(function () {

        $('#Sec_Admin').hide();
         $('#Sec_ImportExport').hide();
        

        $('#Admin').click(function () {

         $('#Sec_ImportExport').hide();
            $('#Sec_Admin').show();
            
        });
        $('#IMEX').click(function () {

        $('#Sec_Admin').hide();
         $('#Sec_ImportExport').show();

        });
      
    });
</script>