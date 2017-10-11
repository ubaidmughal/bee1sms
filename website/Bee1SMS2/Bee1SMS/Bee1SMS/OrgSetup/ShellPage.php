<?php 
include('Orgheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 if(!isset($_SESSION['SupUser']))
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
            <!--Menu Master section start here-->
            <section id="MenuMaster">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Menu" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Menu Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Menu_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>MenuCode</th>
							<th>MenuName</th>
                            <th>MenuType</th>
							<th>GroupCode</th>
                            <th>Position</th>
                            <th>Title</th>
                            <th>Detail</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="MenuModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="Menu_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Menu</h4>
				</div>
				<div class="modal-body">
                <div class="col-md-6">
					<label class="control-label">MenuCode</label>
					<input type="number" name="MenuCode" id="MenuCode" class="form-control" />
                    
					<br />
					<label class="control-label">MenuName</label>
					<input type="text" name="MenuName" id="MenuName" class="form-control"/>
					<br />
                    <label class="control-label">MenuType</label> 
					<input type="text" name="MenuType" id="MenuType" class="form-control"/>
					<br />
					<label class="control-label">GroupCode</label>
					<input type="number" name="GroupCode" id="GroupCode" class="form-control" />
					<br />
                    </div>
                     <div class="col-md-6">
					<label class="control-label">Position</label>
					<input type="text" name="Position" id="Position" class="form-control" />
                    
					<br />
					<label class="control-label">Title</label>
					<input type="text" name="Title" id="Title" class="form-control"/>
					<br />
                    <label class="control-label">Detail</label> 
					<input type="text" name="Detail" id="Detail" class="form-control"/>
					<br />
					<input type="hidden" name="MenuId" id="MenuId" />
					<input type="hidden" name="operationMenu" id="operationMenu" />
					<input type="submit" name="actionMenu" id="actionMenu" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
					<div id="messages"></div>
					
				<div class="modal-footer">
					
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Menu Master end here-->
           

                 <!--Group Master section start here-->
            <section id="GroupMaster" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Group" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Group Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Group_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>GroupCode</th>
							<th>GroupName</th>
                            <th>GroupPosition</th>
							
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="GroupModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Group_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Group</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">GroupCode</label>
					<input type="text" name="GroupCode" id="GroupCodes" class="form-control" />
                    
					<br />
					<label class="control-label">GroupName</label>
					<input type="text" name="GroupName" id="GroupName" class="form-control"/>
					<br />
                    <label class="control-label">GroupPosition</label> 
					<input type="text" name="GroupPosition" id="GroupPosition" class="form-control"/>
					<br />
					
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="GroupId" id="GroupId" />
					<input type="hidden" name="operationGroup" id="operationGroup" />
					<input type="submit" name="actionGroup" id="actionGroup" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Group Master end here-->


                  <!--Organization section start here-->
            <section id="OrgMaster" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Org" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Org Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Org_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>OrgCode</th>
							<th>OrgName</th>
                            <th>OrgType</th>
							<th>Description</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>ZipCode</th>
                            <th>Phone</th>
                            <th>AdminId</th>
                            
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="OrgModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="Org_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Organization</h4>
				</div>
				<div class="modal-body">
                <div class="col-md-6">
					<label class="control-label">OrgCode</label>
					<input type="number" name="OrgCode" id="OrgCode" class="form-control" />
                    
					<br />
					<label class="control-label">OrgName</label>
					<input type="text" name="OrgName" id="OrgName" class="form-control"/>
					<br />
                    <label class="control-label">OrgType</label> 
					<input type="text" name="OrgType" id="OrgType" class="form-control"/>
					<br />
					<label class="control-label">Description</label>
					<input type="text" name="Description" id="Description" class="form-control" />
					<br />
                    <label class="control-label">Address</label>
					<input type="text" name="Address" id="Address" class="form-control" />
					<br />
                    <label class="control-label">City</label>
					<input type="text" name="City" id="City" class="form-control" />
                    
					<br />
                    </div>

                    <div class="col-md-6">
					
					<label class="control-label">State</label>
					<input type="text" name="State" id="State" class="form-control"/>
					<br />
                    <label class="control-label">ZipCode</label> 
					<input type="number" name="ZipCode" id="ZipCode" class="form-control"/>
					<br />
					<label class="control-label">Phone</label>
					<input type="number" name="Phone" id="Phone" class="form-control" />
					<br />
                    <label class="control-label">AdminId</label>
					<input type="text" name="AdminId" id="AdminId" class="form-control" />
					<br />
                    <label class="control-label">AdminPassword</label>
					<input type="password" name="AdminPwd" id="AdminPwd" class="form-control" />
					<br />
                    </div>
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="OrgId" id="OrgId" />
					<input type="hidden" name="operationOrg" id="operationOrg" />
					<input type="submit" name="actionOrg" id="actionOrg" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Org Master end here-->
           
           
            </section>
        </section>

        <!--main content end-->




<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>

<script src="Menu.js"></script>
<script src="Group.js"></script>
<script src="Org.js"></script>
<script>

$(document).ready(function(){

$('#GroupMaster').hide();
$('#OrgMaster').hide();

$('#Group').click(function(){

$('#MenuMaster').hide();
$('#OrgMaster').hide();
$('#GroupMaster').show();

});

$('#Menu').click(function(){

$('#MenuMaster').show();
$('#GroupMaster').hide();
$('#OrgMaster').hide();

});

$('#Org').click(function(){

$('#MenuMaster').hide();
$('#GroupMaster').hide();
$('#OrgMaster').show();

});

});

</script>