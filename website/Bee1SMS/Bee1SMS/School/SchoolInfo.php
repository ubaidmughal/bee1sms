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
          

                <!--Section Class Start Here-->
                <section id="Class_Sec">
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
					<input type="text" name="ClassName" id="ClassName" required data-parsley-type="alphanum"  class="form-control" />
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
					<input type="text" name="SectionName" id="SectionName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
                    
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
					<input type="text" name="SubjectNames" id="SubjectNames" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
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
                            <th>ActivityDate</th>
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
					<input type="text" name="ActivityName" id="ActivityName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label>Activity Date</label>
					<input type="date" name="ActivityDate" id="ActivityDate" required class="form-control" />
					<br />
                    <label>Activity Description</label>
					<textarea name="ActivityDescription" id="ActivityDescription" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"></textarea>
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

           
                  <!--Section Subject Start Here-->
                <section id="Sch" style="display:none">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Schedule" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Subject Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Schedule_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>Class</th>
                            <th>Section</th>
                            <th>Day</th>
                            <th>FromTime</th>
                            <th>ToTime</th>
                            <th>Subject</th>
                            <th>Teacher</th>
						    <th>Actions</th>
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="ScheduleModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Schedule_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Schedule Information</h4>
				</div>
				<div class="modal-body">
					<label>Class Name</label>
					<select name="Class" id="Class" class="form-control" required>
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblclasses";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['ClassName'];?>"><?php echo $row['ClassName'];?></option>
                    <?php
                    }
                    ?>

                    </select>
					<br />
					<label>Section</label>

					<select name="Section" id="Section" class="form-control" required>
                    <option value="" selected="selected"> - Select - </option>
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
					<br 
                    
                    <label>Day</label>
                    
                    <select name="Day" id="Day" class="form-control" required>
                    <option> - Select - </option>
                    <option >Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                    <option>Saturday</option>
                    </select>
					<br />
	                <label>From Time</label>
					<input type="time" name="FromTime" id="FromTime" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label>ToTime</label>
					<input type="time" name="ToTime" id="ToTime" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label>Subject</label>

					<select name="Subject" id="Subject" class="form-control" required>
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblsubject";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['SubjectName'];?>"><?php echo $row['SubjectName'];?></option>
                    <?php
                    }
                    ?>

                    </select>
					<br />
                    <label class="control-label">TeacherName</label>
					<select name="Teacher" id="Teacher" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control">
                    <?php 
                    
                    $query = "select * from tblhresources";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    $TeacherName = $row['FirstName'].$row['LastName'];
                    ?>
                    <option value="<?php echo $TeacherName?>"><?php echo $TeacherName;?></option>
                    <?php
                    }
                    ?>

                    </select>
                    
					<br />
				<div class="modal-footer">
					<input type="hidden" name="ScheduleId" id="ScheduleId" />
					<input type="hidden" name="operationSchedule" id="operationSchedule" />
					<input type="submit" name="actionSchedule" id="actionSchedule" class="btn btn-success" value="Add" />
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

                

            </section>
        </section>

        <!--main content end-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="/parsleyjs/dist/parsley.min.js"></script>
<script src="Scripts/school.js"></script>
<script src="Scripts/Class.js"></script>
<script src="Scripts/Section.js"></script>
<script src="Scripts/Subject.js"></script>
<script src="Scripts/Activity.js"></script>
<script src="Scripts/Schedule.js"></script>
<script>

$(document).ready(function(){

$('#School_form').parsley();
$('#Class_form').parsley();
$('#Section_form').parsley();
$('#Subject_form').parsley();
$('#Activity_form').parsley();
$('#Sch_form').parsley();


$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').hide();

$('#SchInfo').click(function(){

$('#Class_Sec').hide();
$('#School').show();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').hide();
});

$('#Class').click(function(){

$('#Class_Sec').show();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').hide();
});

$('#Section').click(function(){
$('#Sub').hide();
$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').show();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').hide();
});

$('#Subject').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').show();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').hide();
});

$('#ClassSubjects').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').hide();
$('#CSub').show();
});

$('#Activity').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').show();
$('#Sch').hide();
$('#CSub').hide();
});



$('#Schedule').click(function(){

$('#Class_Sec').hide();
$('#School').hide();
$('#Sec').hide();
$('#Sub').hide();
$('#Act').hide();
$('#Sch').show();
$('#CSub').hide();
});

});

</script>