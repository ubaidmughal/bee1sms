 
 <?php include('Examheader.php' );
 ?>
 
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
              <section id="Sec_QM" style="display:none;">
          	<h3>Question Master !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add Question <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfoQM" onclick="javascript:$('#addFormQM').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormQM">
<form id="QMForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>Chapter</label>
     <input type="text" name="Chapter" id="Chapter" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
        
     <div class="form-group">
     <label>Book Name</label>
     <input type="text" name="BookName" id="BookName" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     <div class="form-group">
     <label>Question Type</label>
     <input type="text" name="QuestionType" id="QuestionType" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     </div>
     <div class="col-md-6">
     
     <div class="form-group">
     <label>Question String</label>
     <textarea name="QuestionString" id="QuestionString" class="form-control"></textarea>
     <span class="form__group__info" data-validate="required">This field is required</span>
	 
     </div>
     <div class="form-group">
     <label>McqsOption</label>
     <input type="text" name="McqsOption" id="McqsOption" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormQM').slideUp();">Cancel</a>
    <input type="hidden" name="actionQ" id="actionQ" />  
    <input type="hidden" name="question_id" id="question_id" />  
   <input type="submit" name="button_actionQ" id="button_actionQ" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">School Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
	 <th>Chapter</th>
     <th>BookName</th>
     <th>QuestionType</th>
	 <th>QuestionString</th>
	 <th>McqsOption</th>
	 
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="user_table">
                   <?php 
				   $query = "SELECT * FROM tblquemaster ORDER BY QuestionId";
                   $result = mysqli_query($con, $query);
                   $i=1;
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     <td>'.$i.'</td>
	 <td>'.$row["Chapter"].'</td>
	 <td>'.$row["BookNames"].'</td>
      
	 <td>'.$row["QuestionType"].'</td>
	 <td>'.$row["QuestionString"].'</td>
	 <td>'.$row["McqsOption"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["QuestionId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["QuestionId"].'"></a></td>
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
        
           <!--section Book Master-->

            <div class="alert" style="display:none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
              <section id="Sec_BM" style="display:none;">
          	<h3>Book Master !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add BookMaster <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfoBM" onclick="javascript:$('#addFormBM').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormBM">
<form id="BMForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>BookName</label>
     <input type="text" name="BookNames" id="BookNames" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
    
     <div class="form-group">
     <label>Author</label>
     <input type="text" name="Author" id="Author" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     </div>
     <div class="col-md-6">
     
    
     <div class="form-group">
     <label>Publisher</label>
     <input type="text" name="Publisher" id="Publisher" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     <div class="form-group">
     <label>ContactPerson</label>
     <input type="text" name="ContactPerson" id="ContactPerson" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormBM').slideUp();">Cancel</a>
    <input type="hidden" name="actionB" id="actionB" />  
    <input type="hidden" name="book_id" id="book_id" />  
   <input type="submit" name="button_actionB" id="button_actionB" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">Book Master</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
	 <th>BookName</th>
     <th>Author</th>
     <th>Publisher</th>
	 <th>ContactPerson</th>
	 
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="BM_table">
                   <?php 
				   $query = "SELECT * FROM tblbookmaster ORDER BY BookId";
                   $result = mysqli_query($con, $query);
                   $i=1;
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     <td>'.$i.'</td>
	 <td>'.$row["BookNames"].'</td>
	 <td>'.$row["Author"].'</td>
     
	 <td>'.$row["Publisher"].'</td>
	 <td>'.$row["ContactPerson"].'</td>
	 
     <td><a name="update" class="glyphicon glyphicon-edit updateb" id="'.$row["BookId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deleteb" id="'.$row["BookId"].'"></a></td>
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

 

<script src="app/QM.js"></script>
<script src="app/BM.js"></script>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	<script>

		  	    $(document).ready(function () {

		  	        $('#Sec_QM').hide();
		  	        $('#Sec_BM').hide();

		  	        $('#QMaster').click(function () {

		  	         
		  	            $('#Sec_QM').show();
		  	            $('#Sec_BM').hide();
		  	            
		  	        });
		  	        $('#BMaster').click(function () {
		  	           
		  	            $('#Sec_BM').show();
		  	            $('#Sec_QM').hide();
		  	            

		  	        });
		  	        
		  	    });

		  	</script>
