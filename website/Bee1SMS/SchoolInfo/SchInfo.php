 
 <?php include($server['DOCUMENT_ROOT']. 'infoheader.php' );
 
  
 
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
                
                <form class="form" id="SchoolInfoForm" onsubmit='return formValidatorSInfo()' enctype="multipart/form-data" method="post">
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>SchoolName</label>
                        <input type="text" class="form-control" name="SchoolName" id="SchoolName" required />
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="user_image" id="user_image" />  
                          <input type="hidden" name="hidden_user_image" id="hidden_user_image" />  
                          <span id="uploaded_image"></span>  
                    </div>
                    <div class="form-group">
                        <label>Reg#</label>
                        <input type="text" class="form-control" name="Reg" id="Reg" required />
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address" required />
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="Latitude" id="Latitude" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="Longitude" id="Longitude" required />
                    </div>

                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSInfo').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" name="addinfo" onclick="return formValidatorSInfo()">Add School Info</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editFormSInfo">
                <h2 id="actionLabel">Edit School Info</h2>
                <form class="form" id="SchoolInfoForm" enctype="multipart/form-data">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>SchoolName</label>
                        <input type="text" class="form-control" name="SchoolName" id="SchoolNameEdit" required/>
                    </div>
                        <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="Logo" id="LogoEdit" required/>
                    </div>
                        <div class="form-group">
                        <label>Reg</label>
                        <input type="text" class="form-control" name="Reg" id="RegEdit" required/>
                    </div>
                  </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="AddressEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="Latitude" id="LatitudeEdit" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="Longitude" id="LongitudeEdit" required/>
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="SchoolId" id="idEditSInfo"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormSInfo').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorSInfo()">Update School Info</a>
                    </div>
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">School Info</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SchoolName</th>
                        <th>Logo</th>
                        <th>Reg #</th>
                        <th>Address</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ScInfoData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblschoolinfo',array('order_by'=>'SchoolId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['SchoolName']; ?></td>
                        <td><img src="<?php echo $user['Logo']; ?>" /></td>
                        <td><?php echo $user['Reg']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['latitude']; ?></td>
                        <td><?php echo $user['longitude']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSchoolInfo('<?php echo $user['SchoolId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?infoaction('delete','<?php echo $user['SchoolId']; ?>'):false;"></a>
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
	
 <script src="app/info.js"></script>
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	


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