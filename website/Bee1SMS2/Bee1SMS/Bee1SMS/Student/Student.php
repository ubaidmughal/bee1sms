<?php 
include('Studentheader.php');
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
            <!--Student section start here-->
            <section id="StudentMaster">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Student"  class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Student Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Student_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
                        <th>StudentCode</th>
							<th>StudentName</th>
							<th>FamilyGroup</th>
							<th>Class</th>
                            <th>FatherName</th>
                            <th>Age</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>ContactPerson</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="StudentModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="Student_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Student Information</h4>
				</div>
				<div class="modal-body">
                <div class="col-md-6">
                <label>Student Code</label>
                <?php 
                    
                    ?>
					<input type="text" name="StudentCode" id="StudentCode" class="form-control" value="<?php echo $code?>"/>
					<br />
					<label>Student Name</label>
					<input type="text" name="StudentName" id="StudentName" class="form-control" />
					<br />
					<label>Faimly Group</label>
					<select name="FamilyGroup" id="FamilyGroup" class="form-control">
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblfamilygroup";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    
                    ?>
                    <option value="<?php echo $row['FamilyName'];?>"><?php echo $row['FamilyName'];?></option>
                    <?php
                    }
                    ?>
                    </select>
					<br />
                    <label>Class</label>
					<select name="Class" id="Class" class="form-control">
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblclasses";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    $class = $row['ClassName'];
                    ?>
                    <option value="<?php echo $class;?>"><?php echo $class;?></option>
                    <?php
                    }
                    ?>

                    </select>
					<br />
                     <label>Section</label>
					<select name="Section" id="Section" class="form-control">
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblsections";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    $section = $row['SectionName'];
                    ?>
                    <option value="<?php echo $section;?>"><?php echo $section;?></option>
                    <?php
                    }
                    ?>

                    </select>
					<br />
					<label>FatherName</label>
					<input type="text" name="FatherName" id="FatherName" class="form-control" />
					<br />
                    </div>
                    <div class="col-md-6">
					<label>Age</label>
					<input type="number" name="Age" id="Age" class="form-control" />
					<br />
                    <label>DOB</label>
					<input type="date" name="DOB" id="DOB" class="form-control" />
					<br />
                    	<br />
                        	
					<input type="radio" name="Gender" id="Gender" value="Male" /> Male&nbsp <input type="radio" name="Gender" id="Gender" value="FeMale" /> FeMale
					<br />
                    <br />
                    <label>Address</label>
					<textarea name="Address" id="Address" class="form-control"></textarea>
					<br />
                    <label>ContactPerson</label>
					<input type="number" name="ContactPerson" id="ContactPerson" class="form-control" />
					<br />
                    </div>
				<div class="modal-footer">
					<div class="col-md-6 text-left"><input type="hidden" name="StudentId" id="StudentId" />
					<input type="hidden" name="operationStudent" id="operationStudent" />
					<input type="submit" name="actionStudent" id="actionStudent" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Student section end here-->

                 <!--Family Master section start here-->
            <section id="FamilyMaster" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Family" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Family Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Family_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							
							<th>FamilyName</th>
                            
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="FamilyModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Family_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Family</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">FamilyCode</label>
					<input type="text" name="FamilyCode" id="FamilyCode" class="form-control" />
                    
					<br />
					<label class="control-label">FamilyName</label>
					<input type="text" name="FamilyName" id="FamilyName" class="form-control"/>
					<br />
                    <label class="control-label">StudentName</label> 
					<input type="text" name="StudentName" id="StudentName" class="form-control"/>
					<br />
					
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="FamilyId" id="FamilyId" />
					<input type="hidden" name="operationFamily" id="operationFamily" />
					<input type="submit" name="actionFamily" id="actionFamily" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Family Master end here-->

            </section>
        </section>

        <!--main content end-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="Student.js"></script>
<script src="Family.js"></script>

<script>

$(document).ready(function(){

$('#FamilyMaster').hide();

$('#Family').click(function(){

$('#FamilyMaster').show();
$('#StudentMaster').hide();

});

$('#Student').click(function(){

$('#FamilyMaster').hide();
$('#StudentMaster').show();

});

});

</script>