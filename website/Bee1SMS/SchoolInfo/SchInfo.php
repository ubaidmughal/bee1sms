 
 <?php include('infoheader.php' );
 
  
 
 ?>
 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->

      <section id="main-content">
          <section class="wrapper site-min-height">
              <section id="Sec_SchoolInfo" style="display:none;">
          	<h3>School Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add School Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfo" onclick="javascript:$('#addFormSInfo').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSInfo">
<form id="schoolform" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>School Name</label>
     <input type="text" name="SchoolName" id="SchoolName" class="form-control" required />
     </div>
     <div class="form-group">
     <label>Select Image</label>
     <input type="file" name="image" id="image" class="form-control" />
     <span id="Upload_image"></span>
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     </div>
     <br>
     <div class="form-group">
     <label>Registration #</label>
     <input type="text" name="Reg" id="Reg" class="form-control" required />
     </div>
     </div>
     <div class="col-md-6">
     
     <div class="form-group">
     <label>Address</label>
     <textarea name="Address" id="Address" class="form-control" required></textarea>
     </div>
     <div class="form-group">
     <label>Latitude</label>
     <input type="text" name="Latitude" id="Latitude" class="form-control" required />
     </div>
     
     <div class="form-group">
     <label>Longitude</label>
     <input type="text" name="Longitude" id="Longitude" class="form-control" required />
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSInfo').slideUp();">Cancel</a>
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
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
	 <th>SchoolName</th>
     <th>Image</th>
	 <th>Registration #</th>
	 <th>Address</th>
	 <th>Latitude</th>
	 <th>Longitude</th>
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="image_data">
                   <?php 
				   $query = "SELECT * FROM tblschoolinfo ORDER BY SchoolId";
                   $result = mysqli_query($con, $query);
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["SchoolId"].'</td>
	 <td>'.$row["SchoolName"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['Logo'] ).'" height="60" width="75" class="img-thumbnail" />
     </td>
	 <td>'.$row["Reg"].'</td>
	 <td>'.$row["Address"].'</td>
	 <td>'.$row["latitude"].'</td>
	 <td>'.$row["longitude"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["SchoolId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["SchoolId"].'"></a></td>
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
	

 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	
 <script src="info.js"></script>

 <script>

     $(document).ready(function () {

         $('#Sec_SchoolInfo').hide();

         $('#SchInfo').click(function () {

             $.LoadingOverlay('show');
             $('#Sec_SchoolInfo').show();
             $.LoadingOverlay('hide');
         });

     });
</script>