<?php 
include('Schoolheader.php');
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
            <!--School section start here-->
            <section id="School">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_School"  class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">School Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="School_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>SchoolName</th>
							<th>Registration</th>
							<th>Address</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="SchoolModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="School_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add School Information</h4>
				</div>
				<div class="modal-body">
					<label>School Name</label>
					<input type="text" name="SchoolName" id="SchoolName" class="form-control" />
                    <span id="schnameerror" style="color:red;display:none;">Only latters and white spaces are allowed.</span>
					<br />
					<label>Registration Number</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="Reg" id="Reg" class="form-control" >
                    <span id="regerror" style="color:red;display:none;">This Fields is required</span>
					<br />
                    <label>Address</label>
					<input type="text" name="Address" id="Address" class="form-control" />
                    <span id="addrerror" style="color:red;display:none;">This Fields is required</span>
					<br />
					<label>Latitude</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="Latitude" id="Latitude" class="form-control" >
                    <!--<span id="laterror" style="color:red;display:none;">This Fields is required</span>-->
					<br />
					<label>Longitude</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="Longitude" id="Longitude" class="form-control" >
                    <!--<span id="lonerror" style="color:red;display:none;">This Fields is required</span>-->
					<br />

				<div class="modal-footer">
					<input type="hidden" name="SchoolId" id="SchoolId" />
					<input type="hidden" name="operationschool" id="operationschool" />
					<input type="submit" name="actionschool" id="actionschool" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--School section end here-->

                <!--Section Class Start Here-->
                <section id="Class_Sec" style="display:none">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Class" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Class Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Class_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>ClassName</th>
							<th>Section</th>
							<th>SubjectName</th>
                           
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="ClassModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Class_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Class Information</h4>
				</div>
				<div class="modal-body">
					<label>Class Name</label>
					<input type="text" name="ClassName" id="ClassName" class="form-control" />
					<br />
					<label>Section</label>
					<select name="Section" id="Section" class="form-control">
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblsections";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['SectionName'];?>"><?php echo $row['SectionName'];?></option>
                    <?php
                    }
                    ?>

                    </select>
					<br />
                    <label>SubjectName</label>
					<input type="text" name="SubjectName" id="SubjectName" class="form-control" />
					<br />
					

				<div class="modal-footer">
					<input type="hidden" name="ClassId" id="ClassId" />
					<input type="hidden" name="operationClass" id="operationClass" />
					<input type="submit" name="actionClass" id="actionClass" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Class section end here-->

                
                <!--Section Section Start Here-->
                <section id="Sec" style="display:none">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Section" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Section Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Section_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>SectionName</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="SectionModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Section_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Section Information</h4>
				</div>
				<div class="modal-body">
					<label>Section Name</label>
					<input type="text" name="SectionName" id="SectionName" class="form-control" />
                    <span id="snameerror" style="color:red;display:none;">This Fields is required</span>
					<br />
	
				<div class="modal-footer">
					<input type="hidden" name="SectionId" id="SectionId" />
					<input type="hidden" name="operationSection" id="operationSection" />
					<input type="submit" name="actionSection" id="actionSection" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section section end here-->

                 <!--Section Subject Start Here-->
                <section id="Sub" style="display:none">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Subject" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Subject Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Subject_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>SubjectName</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="SubjectModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Subject_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Subject Information</h4>
				</div>
				<div class="modal-body">
					<label>Subject Name</label>
					<input type="text" name="SubjectNames" id="SubjectNames" class="form-control" />
                    <span id="suberror" style="color:red;display:none;">This Fields is required</span>
					<br />
	
				<div class="modal-footer">
					<input type="hidden" name="SubjectId" id="SubjectId" />
					<input type="hidden" name="operationSubject" id="operationSubject" />
					<input type="submit" name="actionSubject" id="actionSubject" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section subject end here-->


                 <!--Section Activity Start Here-->
                <section id="Act" style="display:none">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Activity" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Activity Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Activity_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>ActivityName</th>
                            <th>ActivityDescription</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="ActivityModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Activity_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modal-title">Add Activity</h4>
				</div>
				<div class="modal-body">
					<label>Activity Name</label>
					<input type="text" name="ActivityName" id="ActivityName" class="form-control" />
					<br />
                    <label>Activity Description</label>
					<textarea name="ActivityDescription" id="ActivityDescription" class="form-control"></textarea>
					<br />
	
				<div class="modal-footer">
					<input type="hidden" name="ActivityId" id="ActivityId" />
					<input type="hidden" name="operationActivity" id="operationActivity" />
					<input type="submit" name="actionActivity" id="actionActivity" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section section end here-->

                  <!--Schedule section start here-->
            <section id="Sch" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Sch" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Schedule Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Sch_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>FromTime</th>
							<th>ToTime</th>
                            <th>Occurs</th>
							<th>TeacherSubject</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="SchModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Sch_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Schedule</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">From Time</label>
					<input type="time" name="FromTime" id="FromTime" class="form-control" />
                    
					<br />
					<label class="control-label">To Time</label>
					<input type="time" name="ToTime" id="ToTime" class="form-control"/>
					<br />
                    <label class="control-label">Occurs</label> 
					<input type="text" name="Occurs" id="Occurs" class="form-control"/>
					<br />
					<label class="control-label">TeacherSubject</label>
					<input type="text" name="TeacherSubject" id="TeacherSubject" class="form-control" />
					<br />
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="ClassSectionId" id="ClassSectionId" />
					<input type="hidden" name="operationSch" id="operationSch" />
					<input type="submit" name="actionSch" id="actionSch" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Section Schedule Master end here-->

            </section>
        </section>

        <!--main content end-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="Scripts/school.js"></script>
<script src="Scripts/Class.js"></script>
<script src="Scripts/Section.js"></script>
<script src="Scripts/Subject.js"></script>
<script src="Scripts/Activity.js"></script>
<script>

$(document).ready(function(){

$('#Class_Sec').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();

$('#SchInfo').click(function(){

$('#Class_Sec').hide();
$('#School').show();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
});

$('#Class').click(function(){

$('#Class_Sec').show();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
});

$('#Section').click(function(){
$('#Sub').hide();
$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').show();
$('#Act').hide();
$('#Sch').hide();

});

$('#Subject').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').show();
$('#Act').hide();
$('#Sch').hide();
});

$('#Activity').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').show();
$('#Sch').hide();
});



$('#Schedule').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').show();
});

});

</script>