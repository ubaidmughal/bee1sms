 
 <?php include('Examheader.php' );
 ?>
 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          
   
     

           <section id="QueMaster" style="display:none;">
                  	<h3>Question Master !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Question<a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkQM" onclick="javascript:$('#addFormQM').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormQM">
                
                <form class="form" id="QMForm" onsubmit='return formValidatorQM()'>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>Chapter</label>
                        <select class="form-control" name="Chapter" id="Chapter" >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                            
                    </div>
                         <div class="form-group">
                        <label>BookId</label>
                         
                            <?php
                            $query = "select * from tblbookmaster";
                            $res = mysqli_query($con, $query);   
                            ?>
                             <select class="form-control" name="BookId" id="BookId">
                                        <?php
                                        while ($row = $res->fetch_assoc()) 
                                        {
                                            echo '<option value=" '.$row['BookId'].' "> '.$row['BookName'].' </option>';
                                        }
                                        ?>
                               </select>
                            
                    </div>
                         <div class="form-group">
                        <label>QuestionType</label>
                         
                        <select class="form-control" name="QuestionType" id="QuestionType">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                        
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>QuestionString</label>
                        <textarea class="form-control" name="QuestionString" id="QuestionString"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>McqsOption</label>
                        <input type="text" class="form-control" name="McqsOption" id="McqsOption"  >

                    </div>
                        
                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormQM').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorQM()">Add Question</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editFormQM">
                <h2 id="actionLabel">Edit Question Master</h2>
                <form class="form" id="QMForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>Chapter</label>
                          <select class="form-control" name="Chapter" id="ChapterEdit" >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                            
                    </div>
                        <div class="form-group">
                        <label>BookId</label>
                        
                              <?php
                              $query = "select * from tblbookmaster";
                              $res = mysqli_query($con, $query);   
                              ?>
                             <select class="form-control" name="BookId" id="BookIdEdit">
                                        <?php
                                        while ($row = $res->fetch_assoc()) 
                                        {
                                            echo '<option value=" '.$row['BookId'].' "> '.$row['BookName'].' </option>';
                                        }
                                        ?>
                               </select>
                    </div>
                        
                        <div class="form-group">
                        <label>QuestionType</label>
                        
                            <select class="form-control" name="QuestionType" id="QuestionTypeEdit">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                        
                  </div>
                    <div class="col-md-6">  
                   
                    <div class="form-group">
                        <label>QuestionString</label>
                        <textarea name="QuestionString" id="QuestionStringEdit" class="form-control"></textarea>

                    </div>
                    
                    <div class="form-group">
                        <label>McqsOption</label>
                        <input type="text" class="form-control" name="McqsOption" id="McqsOptionEdit" />
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="QuestionId" id="idEditQM"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormQM').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorQM()">Update Question</a>
                    </div>
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">Question Master</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Chapter</th>
                        <th>BookId</th>
                        <th>QuestionType</th>
                        <th>QuestionString</th>
                        <th>McqsOption</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="QMData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblquemaster',array('order_by'=>'QuestionId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['Chapter']; ?></td>
                        <?php 
                            $bookid = $user['BookId'];
                            $query1 = "select * from tblbookmaster where BookId =$bookid ";
                            $res = mysqli_query($con, $query1);
                            $row = $res->fetch_assoc();
                            
                        ?>
                        <td><?php echo $row['BookName']; ?></td>
                        <td><?php echo $user['QuestionType']; ?></td>
                        <td><?php echo $user['QuestionString']; ?></td>
                        <td><?php echo $user['McqsOption']; ?></td>
                       
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editQM('<?php echo $user['QuestionId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionQue('delete','<?php echo $user['QuestionId']; ?>'):false;"></a>
                        </td>
                    </tr>
                    <?php endforeach;
                    else: ?>
                    <tr><td colspan="5">No Record(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


              </section>
        
           <section id="BookMaster" style="display:none;">
                  	<h3>Book Master !</h3>
          	
          		
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Books<a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkBM" onclick="javascript:$('#addFormBM').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormBM">
                
                <form class="form" id="BMForm" onsubmit='return formValidatorBM()'>
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>BookName</label>
                        <input type="text" class="form-control" name="BookName" id="BookName"  >
                            
                    </div>
                         <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="Author" id="Author"  />
                    </div>
                        
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" name="Publisher" id="Publisher"/>
                    </div>
                    
                    <div class="form-group">
                        <label>ContactPerson</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson"  >

                    </div>
                        
                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormBM').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorBM()">Add Books</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editFormBM">
                <h2 id="actionLabel">Edit Books Master</h2>
                <form class="form" id="BMForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>Book Name</label>
                        <input type="text" class="form-control" name="BookName" id="BookNameEdit"  >
                            
                    </div>
                        
                        <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="Author" id="AuthorEdit" />
                    </div>
                        
                  </div>
                    <div class="col-md-6">  
                   
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" name="Publisher" id="PublisherEdit" class="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label>ContactPerson</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPersonEdit" />
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="BookId" id="idEditBM"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormBM').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return editFormBMValidatorBM()">Update Books</a>
                    </div>
                   
                </form>
            </div>
            
        </div>
    
         
              <div class="panel panel-primary">
                  <div class="panel-heading">Books Master</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>BooKName</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>ContactPerson</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="BMData">
                    <?php
                    
                    $users = $db->getRows('tblbookmaster',array('order_by'=>'BookId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['BookName']; ?></td>
                        <td><?php echo $user['Author']; ?></td>
                        <td><?php echo $user['Publisher']; ?></td>
                        <td><?php echo $user['ContactPerson']; ?></td>
                       
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUserBM('<?php echo $user['BookId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionBM('delete','<?php echo $user['BookId']; ?>'):false;"></a>
                        </td>
                    </tr>
                    <?php endforeach;
                    else: ?>
                    <tr><td colspan="5">No Record(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


              </section>
          		
          	
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

 
<script src="app/Exam.js"></script>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	<script>

		  	    $(document).ready(function () {

		  	        $('#QueMaster').hide();
		  	        $('#BookMaster').hide();

		  	        $('#QMaster').click(function () {

		  	            $.LoadingOverlay("show");
		  	            $('#QueMaster').show();
		  	            $('#BookMaster').hide();
		  	            $.LoadingOverlay("hide");
		  	        });
		  	        $('#BMaster').click(function () {
		  	            $.LoadingOverlay("show");
		  	            $('#BookMaster').show();
		  	            $('#QueMaster').hide();
		  	            $.LoadingOverlay("hide");

		  	        });
		  	        
		  	    });

		  	</script>
