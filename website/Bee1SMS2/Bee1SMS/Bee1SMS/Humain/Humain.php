<?php 
include('Teacherheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
 ?>
 <style>

</style>

  <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

            <br/>
              <br/>
                <br/>
            <!--Teacher section start here-->
            <section id="TInfo">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="user_data" class="display table table-bordered table-striped">
					<thead>
						<tr>
							<th>EmployeeCode</th>
							<th>FirstName</th>
                            <th>LastName</th>
                            <th>Job Title</th>
                            <th>Designation</th>
                            <th>HireDate</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Employee</h4>
				</div>
				<div class="modal-body">
					<label>EmployeeCode</label>
					<input type="text" name="EmpCode" id="EmpCode"  class="form-control" readonly="readonly" />
					<br />
					<label>FirstName</label>
					<input type="text" name="FirstName" id="FirstName"  class="form-control" />
					<br />
                    <label>LastName</label>
					<input type="text" name="LastName" id="LastName"  class="form-control" />
					<br />
                    <label>Job Title</label>
					<input type="text" name="JobTitle" id="JobTitle"  class="form-control" />
					<br />
					<label>Designation</label>
					<input type="text" name="Designation" id="Designation"  class="form-control" />
					<br />
                    <label>Hire Date</label>
					<input type="date" name="HireDate" id="HireDate"  class="form-control" />
					<br />
				<div class="modal-footer">
					<input type="hidden" name="EmpId" id="EmpId" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>
   <script src="script.js"></script>

  </body>
</html>
