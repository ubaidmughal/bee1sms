<?php 
include('header.php');
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
?>
<style>
table{width:100% !important;}
</style>
 

 <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

            <br/>
              <br/>
                <br/>
            <!--Book Master section start here-->
            <section id="School">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_School" class="btn btn-info btn-lg">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">School Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="School_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
                        
							<th>SchoolName</th>
							<th>Reg</th>
                            <th>Phone</th>
							<th>FromTime</th>
                            <th>ToTime</th>
                            <th>Address</th>
                            <th>Logo</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="SchoolModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="School_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add School Information</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-6">
                <br/>
                    
                    <label class="control-label">SchoolName</label>
					<input type="text" name="SchoolName" id="SchoolName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
                    
					<br />
					<label class="control-label">Reg</label>
					<input type="text" name="Reg" id="Reg" required class="form-control"/>
                    
					<br />
                    <label class="control-label">Phone</label> 
					<input type="phone" name="Phone" id="Phone" required class="form-control"/>
                    
					<br />
					<label class="control-label">FromTime</label>
					
                    <input type="time" required name="FromTime" id="FromTime" class="form-control" >
					<br />
                    </div>
                    <div class="col-md-6">
                <br/>

                    <label class="control-label">ToTime</label>
					
                    <input type="time" required name="ToTime" id="ToTime" class="form-control" >
					<br />
                    <br />
					    <label>Select School Logo</label>
					    <input type="file" class="btn btn-success" name="SchoolLogo" id="SchoolLogo" />
					    <span id="uploadedLogo"></span>
                        <img id="logo" width="50"/>
                        <br />
                    <label>Address</label>
					<textarea name="Address" id="Address" class="form-control" rows="4"></textarea>
					<br />
					</div>
				<div class="modal-footer text-right">
                
					<input type="hidden" name="SchoolId" id="SchoolId" />
					<input type="hidden" name="operationSchool" id="operationSchool" />
					<input type="submit" name="actionSchool" id="actionSchool" class="btn btn-success" value="Add" />
					<button type="button" id="#closemodal" class="btn btn-default" data-dismiss="modal">Close</button>
                
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Book Master end here-->
           



            </section>
        </section>

        <!--main content end-->




<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
    
<script src="/parsleyjs/dist/parsley.min.js"></script>
<script src="setting.js"></script>
<script>

$(document).ready(function(){

$('#School_form').parsley();


$('#QM').click(function(){

$('#School').hide();
$('#QuestionMaster').show();

});



});
 
</script>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#SchoolLogo").change(function(){
    
        $('#uploadedLogo').html('');
        readURL(this);
    });
</script>

