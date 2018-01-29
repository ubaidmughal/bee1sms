<?php 
include('Examheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
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
            <section id="BookMaster">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_book" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Book Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="Book_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>BookNames</th>
							<th>Author</th>
                            <th>Publisher</th>
							<th>ContactPerson</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="BookModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="book_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Books</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">BookNames</label>
					<input type="text" name="BookNames" id="BookNames" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
                    
					<br />
					<label class="control-label">Author</label>
					<input type="text" name="Author" id="Author" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"/>
                    
					<br />
                    <label class="control-label">Publisher</label> 
					<input type="text" name="Publisher" id="Publisher"  data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"/>
                    
					<br />
					<label class="control-label">ContactPerson</label>
					
                    <input type="text" required data-parsley-type="number" name="ContactPerson" id="ContactPerson" class="form-control" >
                    
					<br />
					
				<div class="modal-footer">
					<input type="hidden" name="BookId" id="BookId" />
					<input type="hidden" name="operationBM" id="operationBM" />
					<input type="submit" name="actionbook" id="actionbook" class="btn btn-success" value="Add" />
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
           



             <!--Question Master section start here-->
            <section id="QuestionMaster" style="display:none;">
            <div class="row col-sm-12 col-md-12 text-right"><button type="button" id="add_button_QM" class="btn btn-info btn-lg" data-backdrop="static" data-keyboard="false">+ Add</button></div>
                <div class="row col-sm-12 col-md-12">
                <br/>
              <br/>
               
              <!--  start panel-->
                <div class="panel panel-primary">
                <div class="panel-heading">Question Master Info</div>
                <!--start panel body-->
                <div class="panel-body">
                
                <table id="QM_data" class="display table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>Chapter</th>
							<th>BookName</th>
                            <th>QuestionType</th>
							<th>QuestionString</th>
                            <th>McqsOption</th>
							<th>Action</th>
							
							
						</tr>
					</thead>
				</table>

                </div><!--end panel body-->

                </div><!--end panel-->
                <!--modal-->

                <div id="QMModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="QM_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modal-title">Add Question Master Info</h4>
				</div>
				<div class="modal-body">
					<label class="control-label">Chapter</label>
					<input type="text" name="Chapter" id="Chapter" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control" />
                    
                    
					<br />
                    <label class="control-label">BookName</label>
					<select name="BookName" id="BookName" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control">
                    <?php 
                    $con = mysqli_connect('localhost','root','','bee1sms');
                    $query = "select * from tblbookmaster";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['BookNames'];?>"><?php echo $row['BookNames'];?></option>
                    <?php
                    }
                    ?>

                    </select>
                    
                    
					<br />
					<label class="control-label">QuestionType</label>
					<input type="text" name="QuestionType" required data-parsley-pattern="^[a-zA-Z ]+$" id="QuestionType" class="form-control"/>
                    
					<br />
                    <label class="control-label">QuestionString</label> 
					<input type="text" name="QuestionString" id="QuestionString" required data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"/>
                    
					<br />
					<label class="control-label">McqsOption</label>
					<input type="text" required data-parsley-type="number" data-parsley-length="[2]" name="McqsOption" id="McqsOption" class="form-control" >
                    
					<br />
					<div id="messages"></div>
					
				<div class="modal-footer">
					<input type="hidden" name="QuestionId" id="QuestionId" />
					<input type="hidden" name="operationQM" id="operationQM" />
					<input type="submit" name="actionQM" id="actionQM" class="btn btn-success" value="Add" />
					<button id="#closemodal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$('#book_form').parsley();

$('#QM_form').parsley();
$('#QuestionMaster').hide();


$('#QM').click(function(){

$('#BookMaster').hide();
$('#QuestionMaster').show();

});

$('#BM').click(function(){

$('#BookMaster').show();
$('#QuestionMaster').hide();

});

});

</script>
<script src="Scripts/BM.js"></script>
<script src="Scripts/QM.js"></script>
