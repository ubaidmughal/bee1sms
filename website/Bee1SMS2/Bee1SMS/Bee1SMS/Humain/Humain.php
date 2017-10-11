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
							<th>TeacherContact</th>
							<th>TeacherQualfication</th>
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
					<h4 class="modal-title">Add Teacher</h4>
				</div>
				<div class="modal-body">
					<label>Teacher Contact</label>
					<input type="text" name="teacher_contact" id="teacher_contact"  class="form-control" />
					<br />
					<label>Teacher Qualification</label>
					<input type="text" name="teacher_qualification" id="teacher_qualification"  class="form-control" />
					<br />
					
				<div class="modal-footer">
					<input type="hidden" name="TId" id="TId" />
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
