 

 <?php include('contactheader.php' ); ?>
 
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
              <section id="Sec_Contact" style="display:none;">
          	<h3>School Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add Contact Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfo" onclick="javascript:$('#addFormCon').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormCon">
<form id="ConForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>ContactType</label>
     <input type="text" name="ContactType" id="ContactType" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
     
       <div class="form-group">
     <label>Name</label>
     <input type="text" name="Name" id="Name" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     <div class="form-group">
     <label>Address</label>
     <input type="text" name="Address" id="Address" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
       <div class="form-group">
     <label>Phone</label>
     <input type="text" name="Phone" id="Phone" class="form-control" />
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
     <label>DOB</label>
     <input type="date" name="DOB" id="DOB" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     <div class="form-group">
     <label>TimeOfContact</label>
     <input type="time" name="TimeOfContact" id="TimeOfContact" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     <div class="form-group">
     <label>WayOfContact</label>
     <input type="text" name="WayOfContact" id="WayOfContact" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     <div class="form-group">
     <label>Profession</label>
     <input type="text" name="Profession" id="Profession" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormCon').slideUp();">Cancel</a>
    <input type="hidden" name="action" id="action" />  
    <input type="hidden" name="contact_id" id="contact_id" />  
   <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">Contact Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
	 <th>ContactType</th>
     <th>Name</th>
     <th>Address</th>
	 <th>Phone</th>
	 <th>Email</th>
	 <th>DOB</th>
     <th>TimeOfContact</th>
     <th>WayOfContact</th>
     <th>Profession</th>
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="user_table">
                   <?php 
				   $query = "SELECT * FROM tblcontacts ORDER BY ContactId";
                   $result = mysqli_query($con, $query);
                   $i=1;
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     <td>'.$i.'</td>
	 <td>'.$row["ContactType"].'</td>
	 <td>'.$row["Name"].'</td>
       
	 <td>'.$row["Address"].'</td>
	 <td>'.$row["Phone"].'</td>
	 <td>'.$row["Email"].'</td>
     <td>'.$row["DOB"].'</td>
     <td>'.$row["TimeOfContact"].'</td>
     <td>'.$row["WayOfContact"].'</td>
     <td>'.$row["Profession"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["ContactId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["ContactId"].'"></a></td>
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

<script src="contact.js"></script>

 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	
<script>

    $(document).ready(function () {

        $('#Sec_Contact').hide();

        $('#ConInfo').click(function () {


            $('#Sec_Contact').show();
            
        });

    });
</script>