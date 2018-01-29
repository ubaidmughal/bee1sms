<?php 
include('Studentheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Student/login.php');
 }
  

?>


<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  } 
  label{margin-top: 10px;}
  .help-inline-error{color:red;}
</style>
<!--main content start-->
        <section id="main-content">
            <section class="wrapper">

            <br/>
              <br/>
                <br/>

                  <!--Family Master section start here-->
            <section id="FamilyMaster">
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
					<input type="text" name="FamilyName" id="FamilyName" required class="form-control"/>
					<br />
                    <div class="panel panel-primary" id="mytable">
                <div class="panel-heading">Family Students Info</div>
                <!--start panel body-->
                <div class="panel-body">            
                <table id="Family_students" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>Student Names</th>
                            <th>Family Name</th>
						</tr>
					</thead>
				</table>
                </div><!--end panel body-->
                </div>
                    <label class="control-label" id="FStdName">StudentName</label> 
					<input type="text" name="FStudentName" id="FStudentName" class="form-control"/>
					<br />
					
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="FamilyId" id="FamilyId" />
					<input type="hidden" name="operationFamily" id="operationFamily" />
					<input type="submit" name="actionFamily" id="actionFamily" class="btn btn-success" value="Add" />
					<button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Family Master end here-->
            <!--Student section start here-->
            <section id="StudentMaster" style="display:none;">
            
             <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Student" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Student Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Student_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>GRNO</th>
							<th>StudentName</th>
                            <th>FatherName</th>
							<th>FamilyGroup</th>
                            <th>Religion</th>
                            <th>Address</th>
                            <th>Address2</th>
                            <th>DateOfBirth</th>
                            <th>PlaceOfBirth</th>
							<th>Actions</th>
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
             <!--modal-->
       <div id="StudentModal" class="modal fade">
	<div class="modal-dialog modal-lg">

   

      <form name="Student_form" id="Student_form" method="post" action="">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Student Information</h4>
				</div>
				<div class="modal-body">
           
<div id="sf1" class="frm">
          <fieldset>
            <legend>Personal Info</legend>

            <div class="row">
                    <div class="col-md-6">
                    <label>GRNO</label>
                
					<input type="text" name="GRNO" id="GRNO" class="form-control" readonly/>
					
					<label>Student Name</label>
					<input type="text" name="StudentName" id="StudentName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
				
					<label>Religion</label>
					<input type="text" name="Religion" id="Religion" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					
                    <label>Address</label>
					<textarea name="Address" id="Address" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"></textarea>
					
                    <label>Address2</label>
					<textarea name="Address2" id="Address2" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"></textarea>
					
                 </div>
                 <div class="col-md-6">
                 <div>
                 <img src="/assets/img/avatar.png" id="uploaded_stdimage" width="100" height="120" />
                     <span id="uploadedImage"></span>
                   </div>
                         <br />  
					    <input type="file" name="StudentImage" id="StudentImage" />
                         
                        
					   
                       
                        
                    <label>DateOfBirth</label>
					<input type="date" name="DateOfBirth" id="DateOfBirth" class="form-control"/>
					
                    <label>PlaceofBirth</label>
					<input type="text" name="PlaceOfBirth" id="PlaceOfBirth" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"/>
                  
                
                    <label>Gender</label>
					<select name="Gender" id="Gender" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
                    <option> Male </option>
                    <option> FeMale </option>
                    </select>
                 </div>
                 
                 </div>



            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2 text-right">
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>Step 2 of 3</legend>

             Guardian Info
            <div>
                    <label>FatherName</label>
					<input type="text" name="FatherName" id="FatherName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label>Faimly Group</label>
					<select name="FamilyGroup" id="FamilyGroup" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
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
                    <label>Father Profession</label>
					<input type="text" name="FatherProfession" id="FatherProfession" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
                    <label>Father's NIC#</label>
					<input type="text" name="FatherNIC" id="FatherNIC" required class="form-control" />
					<br />
                    
                      </div>


            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2 text-right">
              <div class="btn-group">
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
</div>             
 </div>
            </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
            <legend>Academic Info</legend>


            

       <div class="col-md-12">
                   <label>Last Institution</label>
					<input type="text" name="LastInstitution" id="LastInstitution" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
					<br />
					<label>Date Of Admission</label>
					<input type="date" name="DateOfAdmission" id="DateOfAdmission" class="form-control" />
					<br />
                    <label>Admit Class</label>
						<select name="ClassAdmit" id="ClassAdmit" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
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
					<label>Roll Number</label>
					<input type="text" name="RollNumber" id="RollNumber" readonly="readonly" class="form-control" />
					<br />
                     <label>Section</label>
					<select name="Section" id="Section" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
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
                    <br/>
                    </div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2 text-right">
              <div class="btn-group">
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span></button> 
                </div>
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf4" class="frm" style="display: none;">
          <fieldset>
            <legend>Documents</legend>

            
            

            
<div class="col-md-12">
<br />
                    <label>Admission Fee</label>
					<input type="text" name="AdmissionFee" id="AdmissionFee" required class="form-control" />
					<br />
                    <label>MonthlyFee</label>
					<input type="text" name="MonthlyFee" id="MonthlyFee" required class="form-control" />
					<br />
                     <label>Annual Fee</label>
					<input type="text" name="AnnualFee" id="AnnualFee" required class="form-control" />
					<br />
                   Select files:
					<input type="file" name="Attachments" id="Attachments" />
                    
					<span id="uploaded_Attachments"></span>
                    <br />

      </div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2 text-right">
                
                <div class="btn-group">
                <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                    <input type="hidden" name="StudentId" id="StudentId" />
					<input type="hidden" name="operationStudent" id="operationStudent" />
					<input type="submit" name="actionStudent" id="actionStudent" class="btn btn-success open4" value="Add" />
					<button type="button"  id="cancel" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
                
              </div>
            </div>

          </fieldset>
        </div>
    
  
        </div>
        <div class="modal-footer">
        

        </div>
      </div>
      </form>

  </div>
  </div>
  <!--end modal-->
     <!--start Print modal-->
             <div id="PrintModal" class="modal fade">
	<div class="modal-dialog modal-lg">

			<div class="modal-content" id="modal-content">
				<div class="modal-header">
                 <style>
                 .signature{border-top:1px solid #000; text-align:center; margin-top:4%; width:20%; float:right;}
                .headleft, .headright{width:20% !important;}
                .headmid{width:60% !important; text-align:center; width:55%;}
                .headdetail{border-bottom:1px solid #000;}
                .headtitle{width:15%;}
                .gap{padding-left:5% !important;}
                table{border-collapse:separate;}
                </style>
                <button class="print-link no-print" onclick="jQuery('#modal-content').print()"> Print this </button>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="#AddmissionForm">
                    <div class="row">
                    <div class="col-md-12">
                    <table>
                        <tr>
                            <td class="headleft">
                                <?php 
                                    $query = "select * from tblschoolinfo";
                                    $sql = mysqli_query($con,$query);
                                    $row = mysqli_fetch_assoc($sql);
                                    echo '<img src="data:image;base64,' .$row['Logo']. '" width="150"/>';
                                 ?>
                            </td>
                            <td class="headmid">
                                <h2 id="h2"><?php echo $row['SchoolName'];?></h2>    
                                <h4><?php echo $row['Address'];?></h4>
                                <h4><?php echo $row['Phone'];?></h4>
                                <h3 class="modal-title text-center">Addmission Form</h3>
                            </td>
                            <td class="headright">
                                <span id="PrintStudentImage"></span>
                            </td>
                        </tr>
                    </table>
                    </div>
                    </div>					
				</div>
               <br/>
                <br/>
				<div class="modal-body">
                
					<div class="row">
                    <table>
                        <tr>
                            <td class="headtitle">GRNO</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintGRNO"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Student Name</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintStudentName"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Father Name</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintFathertName"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Date of Birth</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintDOB"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Age</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintAge"></lable></td>
                            <td class="headtitle gap">Phone</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintPhone"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Class</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintClass"></lable></td>
                            <td class="headtitle gap">Section</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintSection"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Father Profession</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintFProfession"></lable></td>
                            <td class="headtitle gap">Father CNIC</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintFNIC"></lable></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Address</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintAddress"></lable></td>
                        </tr>
                    </table>
                    <div class="signature"><p>Parents Signature</p></div>
                    </div>
                    <hr/>
                    <h2 class="text-center">OFFICE USE</h2>
                    <table>
                        <tr>
                            <td class="headtitle">Roll Number</td>
                            <td class="headdetail" colspan="5"><label class="input" type="text" id="PrintRollNumber"></label></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Student Name</td>
                            <td class="headdetail" colspan="5"><label class="input" type="text" id="PrintName"></label></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Father Name</td>
                            <td class="headdetail" colspan="5"><label class="input" type="text" id="PrintFName"></label></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Class</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintOClass"></label></td>
                            <td class="headtitle gap">Section</td>
                            <td class="headdetail" colspan="3"><label class="input" type="text" id="PrintOSection"></label></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Addmission Fee</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintAddmissionFee"></label></td>
                            <td class="headtitle gap">Monthly Fee</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintMonthlyFee"></label></td>
                            <td class="headtitle gap">Annual Fund</td>
                            <td class="headdetail"><label class="input" type="text" id="PrintAnnualFee"></label></td>
                        </tr>
                        <tr>
                            <td class="headtitle">Date</td>
                            <td class="headdetail" colspan="5"><label class="input" type="text" id="PrintDOA"></label></td>
                        </tr>
                    </table>
                    <div class="signature"><p>Parents Signature</p></div>
                   <div class="modal-footer">
					
				
				</div>
			</div>
	
	</div>
    </div>
    </div>
    </div>
    <!--end print modal-->
                </div><!--end row-->

                </section>
                <!--Student section end here-->












               


                      <!--Assign Class section start here-->
            <section id="AssignClass" style="Display:none;">
            
                <div class="row col-sm-12 col-md-12">
               <div class="col-md-6">
                <label>From Class</label>
					<select name="FromClass" id="FromClass" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
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
                    <br/>
                    <br/>
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">From</div>
                <!--start panel body-->
                <div class="panel-body">
                <form method="Post" action="" id="FormAssignClass">
                 <input type="hidden" name="operationFamily" id="operationFamily" />
                 <table id="FromClassData" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							
							<th>GRNO</th>
                            
							<th>StudentName</th>

                            <th>Class</th>
							  <th>RollNumber</th>
                              
							
						</tr>
					</thead>
				</table>
                </form>
                </div><!--end panel body-->

                </div><!--end panel-->
               </div><!--end col-md-6-->
               <div class="col-md-6">
               <label>To Class</label>
					<select name="ToClass" id="ToClass" required class="ToClass form-control">
                    <option value="" selected="selected"> - Select - </option>
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
                    <br/>
                    <br/>
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">From</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="ToClassData" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>GRNO</th>
							<th>StudentName</th>
                            <th>Class</th>
							  <th>RollNumber</th>
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
               </div><!--end col-md-6-->
               <input type="button"  name="actionAssignClass" id="actionAssignClass" class="btn btn-success" value="MoveStudent" />
                </div><!--end row-->
                </section>
                <!--Assign Class end here-->
                

            </section>
        </section>

        <!--main content end-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="/parsleyjs/dist/parsley.min.js"></script>
<script src="Scripts/Student.js"></script>
<script src="Scripts/Family.js"></script>
<script src="Scripts/assignclass.js"></script>
<!-- First, include the Webcam.js JavaScript Library -->
	
	


<script>

$(document).ready(function(){


$('#Student_form').parsley();
$('#Family_form').parsley();
$('#StudentMaster').hide();

$('#Family').click(function(){

$('#FamilyMaster').show();
$('#StudentMaster').hide();
$('#AssignClass').hide();
$('#Schedule').hide();

});

$('#Student').click(function(){

$('#FamilyMaster').hide();
$('#StudentMaster').show();
$('#AssignClass').hide();
$('#Schedule').hide();

});



$('#AssingClass').click(function(){

$('#FamilyMaster').hide();
$('#StudentMaster').hide();
$('#AssignClass').show();

});

$('.btnNext').click(function(){
$('#Student_form').parsley();
  $('.nav-tabs > .active').next('li').find('a').trigger('click');

});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});


});

</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploaded_stdimage').attr('src', e.target.result);
                 
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#StudentImage").change(function(){
    $('#uploaded').html('');
    $('#uploaded_stdimage').attr('width','100');
        readURL(this);
    });

 
</script>

<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#Student_form").validate({
      rules: {
        uname: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        uemail: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        upass2: {
          required: true,
          minlength: 6,
          equalTo: "#upass1",
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
    
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    $(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
      }
    });
    
    
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });
    $(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("slow");
    });

  });
</script>

<script>
function getRollNumber() {
        var operationStudent = "getRollNumber";
        var ClassAdmit = $('#ClassAdmit').val();
        var StudentId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "post",
            data: { ClassAdmit: ClassAdmit, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#RollNumber').val(data.RollNumber);
            }
        });
        }
</script>