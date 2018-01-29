<?php 
include('Feeheader.php');
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
            <section id="SecDueType">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_book" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Due Type</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Due_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>DueType</th>
						<th>Actions</th>
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="DueModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Due_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Due Type</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">DueType</label>
					<input type="text" name="DueTypes" id="DueTypes" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
                    
					<br />
					
				<div class="modal-footer">
					<input type="hidden" name="DueId" id="DueId" />
					<input type="hidden" name="operationDue" id="operationDue" />
					<input type="submit" name="actionDue" id="actionDue" class="btn btn-success" value="Add" />
					<button type="button" id="#closemodal" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Due TYpe end here-->
           



             <!--Question FeePayable section start here-->
            <section id="SecFeePay" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_FeePay" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Question Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="FeePay_Data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>DocEntry</th>
							<th>DocNumber</th>
                            <th>GRNO</th>
							<th>DueType</th>
                            <th>PayableAmount</th>
                            <th>PaidAmount</th>
                            <th>DueDate</th>
                            <th>DocDate</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="FeePayModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="FeePay_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modal-title">Add FeePayable</h4>
				</div>
				<div class="modal-body">
                <div class="col-md-6">
					
                    <label class="control-label">DocNumber</label>
					<input type="text" name="DocNumber" id="DocNumber" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />

					<br />
					<label class="control-label">Class</label>
					<select name="Class" id="Class" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    
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
                    <label class="control-label">Section</label> 
					<select name="Section" id="Section" required class="form-control">
                    
                    </select>
                    <br/>
                    <label class="control-label">Student Name</label>
					<select name="StudentName" id="StudentName" required class="form-control">
                    
                    
                    </select>


<br />

                    </div>
                <div class="col-md-6">
					
                    <label class="control-label">DueType</label> 
					<select name="DueType" id="DueType" required class="form-control">
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    
                    $query = "select * from tblduetype";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    
                    ?>
                    <option value="<?php echo $row['DueType'];?>"><?php echo $row['DueType'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <br/>
                			<label class="control-label">PayableAmount</label>
					<input type="text" required  name="PayableAmount" id="PayableAmount" class="form-control" >
					<br />
                    <label class="control-label">PaidAmount</label>
					<input type="text" required  name="PaidAmount" id="PaidAmount" class="form-control" >
                    
					<br />
                    <label class="control-label">DueDate</label>
					<input type="date"  name="DueDate" id="DueDate" class="form-control" >
                    
					<br />
                    <label class="control-label">DocDate</label>
					<input type="date"  name="DocDate" id="DocDate" class="form-control" >
                    
					<br />
                    </div>

					
				<div class="modal-footer">
					<input type="hidden" name="DocEntry" id="DocEntry" />
					<input type="hidden" name="operationFeePay" id="operationFeePay" />
					<input type="submit" name="actionFeePay" id="actionFeePay" class="btn btn-success" value="Add" />
					<button id="#closemodal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Teacher section end here-->
            </section>
        </section>

        <!--main content end-->




<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
    
<script src="/parsleyjs/dist/parsley.min.js"></script>
<script>

$(document).ready(function(){

$('#DUE_form').parsley();

$('#QM_form').parsley();
$('#QuestionMaster').hide();


$('#DUE').click(function(){

$('#SecFeePay').hide();
$('#SecDueType').show();

});

$('#FPAY').click(function(){

$('#SecFeePay').show();
$('#SecDueType').hide();

});

});

</script>
<script src="Scripts/Due.js"></script>
<script src="Scripts/FeePay.js"></script>
