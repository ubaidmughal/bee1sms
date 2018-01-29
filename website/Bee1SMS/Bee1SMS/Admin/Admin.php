<?php 
include('Adminheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
  

?>


 <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

            <br/>
              <br/>
                <br/>

                  <!--User Type section start here-->
            <section id="Sec_UType">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_UType" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">User Type</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="UType_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>UserType</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="UTypeModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="UType_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User Type</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">User Type</label>
					<input type="text" name="UserType" id="UserType" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />     
					<br />

					
				<div class="modal-footer">
					<input type="hidden" name="UTypeId" id="UTypeId" />
					<input type="hidden" name="operationUType" id="operationUType" />
					<input type="submit" name="actionUType" id="actionUType" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section User Type end here-->

            <!--Admin Master section start here-->
            <section id="Sec_Admin" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Admin" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Admin Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Admin_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>UserName</th>
							<th>Email</th>
                            <th>DateReg</th>
							
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="AdminModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Admin_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User Type</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">User Name</label>
					<input type="text" name="UserName" id="UserName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label class="control-label">UserType</label>
					<select name="UserTypes" id="UserTypes" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control">
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    
                    $query = "select * from tblutype";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['UserType'];?>"><?php echo $row['UserType'];?></option>
                    <?php
                    }
                    ?>

                    </select>
                    <br/>
					<label class="control-label">Email</label>
					<input type="email" name="Email" id="Email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control"/>
					<br />
                    <label class="control-label">Date Register</label>
					<input type="date" name="DateReg" id="DateReg" class="form-control" required />
					<br />
                    <label class="control-label">Password</label> 
					<input type="Password" name="Password" id="Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup" class="form-control"/>
					<br />
					
				
					
				<div class="modal-footer">
					<input type="hidden" name="AdminId" id="AdminId" />
					<input type="hidden" name="operationAdmin" id="operationAdmin" />
					<input type="submit" name="actionAdmin" id="actionAdmin" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section Admin end here-->

                <!--section import and export start here-->

                 <section id="ImpExp" style="display:none;">
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
                   <select class="form-control" name="SelectTable" id="SelectTable">
                   <option>-----Select-----</option>
                   <option>School</option>
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
                          <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-success" /> 
<input type="button" name="Export" id="Export" value="Export" class="btn btn-info" />  
                     </div>  
                      
                </form>  
            
          
              </section>


                <!--import export ends here-->

                </section>
        </section>

        <!--main content end-->
           



<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="/parsleyjs/dist/parsley.min.js"></script>
<script src="Scripts/Admin.js"></script>
<script src="Scripts/Import.js"></script>
<script src="Scripts/UType.js"></script>
<script>
$(document).ready(function(){

$('#Admin_form').parsley();
$('#ImpExp').hide();
$('#Sec_Admin').hide();

$('#Admin').click(function(){

$('#ImpExp').hide();
$('#Sec_Admin').show();
$('#Sec_UType').hide();

});


$('#UType').click(function(){

$('#ImpExp').hide();
$('#Sec_Admin').hide();
$('#Sec_UType').show();

});

$('#IMEX').click(function(){

$('#ImpExp').show();
$('#Sec_Admin').hide();
$('#Sec_UType').hide();
});


});
</script>