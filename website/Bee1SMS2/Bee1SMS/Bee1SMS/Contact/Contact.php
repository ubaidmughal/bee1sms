<?php 
include('Contactheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
?>
 <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
            <br/><br/><br/>
            <!--Contact Master section start here-->
            <section id="Sec_Contact">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_Contact" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/><br/>              
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Contact Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Contact_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>ContactType</th>
							<th>Name</th>
                            <th>Address</th>
							<th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>TimeOfContact</th>
                            <th>WayOfContact</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="ContactModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="contact_form" action="" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Contact</h4>
				</div>
				<div class="modal-body">
                <div class="col-lg-4">
					<label class="control-label">ContactType</label>
					<input type="text" name="ContactType" id="ContactType" class="form-control" />
                    
					<br />
					<label class="control-label">Name</label>
					<input type="text" name="Name" id="Name" class="form-control"/>
					<br />
                    
					<label class="control-label">Phone</label>
					<input type="phone" name="Phone" id="Phone" class="form-control" />
					<br />
                    <label class="control-label">Email</label>
					<input type="email" name="Email" id="Email" class="form-control" />
					<br />
                    <label class="control-label">Address</label> 
					<textarea rows="6" name="Address" id="Address" class="form-control"></textarea>
					<br />
                    <br />
                    </div>
                    <div class="col-lg-4">
                    <label class="control-label">Select Country</label>
					<select name="country" class="form-control countries" id="countryId" required="required">
                    <option value="">Select Country</option>
                    </select>
					<br />
                    <label class="control-label">Select State/Province</label>
					<select name="state" class="form-control states" id="stateId" required="required">
                    <option value="">Select State</option>
                    </select>
					<br />
                    <label class="control-label">City</label>
					<select name="city" class="form-control cities" id="cityId" required="required">
                    <option value="">Select City</option>
                    </select>
					<br />
                    <label class="control-label">ZipCode</label>
					<input type="text" name="ZipCode" id="ZipCode" class="form-control" />
					<br />
                    <label class="control-label">TimeOfContact</label>
					<input type="time" name="TimeOfContact" id="TimeOfContact" class="form-control" />
					<br />
                    <label class="control-label">WayOfContact</label>
					<input type="text" name="WayOfContact" id="WayOfContact" class="form-control" />
					<br />
                    </div>
                    <div class="col-lg-4">
                    
                    <label class="control-label">DOB</label>
					<input type="date" name="DOB" id="DOB" class="form-control" />
					<br />
                    
                    <label class="control-label">Profession</label>
					<input type="text" name="Profession" id="Profession" class="form-control" />
                    <br/>
                     <label class="control-label">SkypeID</label>
					<input type="text" name="SkypeId" id="SkypeId" class="form-control" />
					<br />
                     <label class="control-label">WhatsappNo</label>
					<input type="text" name="WhatsappNo" id="WhatsappNo" class="form-control" />
					<br />
                     <label class="control-label">FacebookId</label>
					<input type="text" name="FacebookId" id="FacebookId" class="form-control" />
					<br />
                    <label class="control-label">TwitterId</label>
					<input type="text" name="TwitterId" id="TwitterId" class="form-control" />
					
                   
                    </div>
					<div id="messages"></div>
					
				<div class="modal-footer">
                <div class="col-md-12 text-left">
					<input type="hidden" name="ContactId" id="ContactId" />
					<input type="hidden" name="operationContact" id="operationContact" />
					<input type="submit" name="actionContact" id="actionContact" class="btn btn-success" value="Add New Contact" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
				</div>
			</div>
            </div>
		</form>
	</div>
    </div>

                <!--end modal-->
                </div><!--end row-->
                </section>
                <!--Contact Master end here-->
           



             
            </section>
        </section>

        <!--main content end-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
<script src="js/location.js"></script>
<script src="Contact.js"></script>