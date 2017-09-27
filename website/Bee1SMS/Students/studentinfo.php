    
 
 <?php include('studentheader.php');
       include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 
 ?>
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    <!--main content start-->
    <body>
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
          
          <br>
                          <section id="Sec_StdInfo" style="display:none;">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Students <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkStd" onclick="javascript:$('#addFormStd').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormStd">
                
                <form class="form" id="StdForm" method="post">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Student Code</label>
                        <input type="text" class="form-control" name="StudentCode" id="StudentCode" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                        <span class="form__group__info" data-validate="number">This field must be a number</span>
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="StudentName" id="StudentName" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                    <div class="form-group">
                        <label>Family Group</label>
                        <input type="text" class="form-control" name="FamilyGroup" id="FamilyGroup" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                    <div class="form-group">
                        <label>Name Of Group</label>
                        <input type="text" class="form-control" name="NameOfGroup" id="NameOfGroup" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                    
                    <div class="form-group">
                        <label>Select Class</label> &nbsp 
                            <select name="Class" id="Class" class="form-control">
                            <option>---Select Class---</option>
                            <?php
                            $queryclass = "select * from tblclasses";
                            $res = mysqli_query($con, $queryclass);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 $Class = $row['ClassName'].'-'.$row['Section'];
                                 echo '<option value=" '.$Class.' "> '.$Class.' </option>';
                             }
                             ?>
                            
                        </select> 
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                       <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherName"  />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                               
                    </div>
                    <div class="col-md-6">

                      
                    <div class="form-group">
                        <input type="radio" name="Gender" value="male"/>Male<span style="margin-left:20px"><input type="radio" name="Gender" value="female"/>Female</span>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="Age" id="Age"  />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                        <span class="form__group__info" data-validate="number">This field must be a number</span>
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="DOB" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                        <span class="form__group__info" data-validate="number">This field must be a number</span>
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson"  />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                        <span class="form__group__info" data-validate="number">This field must be a number</span>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="Address" rows="3" required ></textarea>
                        <span class="form__group__info" data-validate="required">This field is required</span>
	                    <span class="form__group__info" data-validate="maxLenght | 40">The comment must be no more than 40 chars long</span>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormStd').slideUp();">Cancel</a>
                    <input type="hidden" name="actionstudent" id="actionstudent" />  
                    <input type="hidden" name="Student_id" id="Student_id" />  
                    <input type="submit" name="button_actionstudent" id="button_actionstudent" class="btn btn-default" value="Insert" /> 
                    </div>
                </form>
            </div>
            
        </div>
          
              <div class="panel panel-primary">
                  <div class="panel-heading">Student Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                         
	                     <th>Student Code</th>
                         <th>Student Name </th>
                         <th>Family Group</th>
	                     <th>Name Of Group</th>
                         <th>Father Name</th>
	                     <th>Class</th>
	                     
                         
                         <th>Age </th>
                         <th>DOB</th>
	                     <th>Gender</th>
	                     <th>Address</th>
	                     <th>ContactPerson</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody id="student_table">
                   <?php 
				   $query = "SELECT * FROM tblstudent ORDER BY StudentId";
                   $result = mysqli_query($con, $query);
                   $i=1;
                   $output = '
   
   
  ';
                   while($row = mysqli_fetch_array($result))
                   {
                       $i++;
                       $output .= '

    <tr>
    

	 <td>'.$row["StudentCode"].'</td>
	 <td>'.$row["StudentName"].'</td> 
	 <td>'.$row["FamilyGroup"].'</td>
	 <td>'.$row["NameOfGroup"].'</td>
      <td>'.$row["FatherName"].'</td>
	 <td>'.$row["Class"].'</td>

	 <td>'.$row["Age"].'</td> 
	 <td>'.$row["DOB"].'</td>
	 <td>'.$row["Gender"].'</td>
	 <td>'.$row["Address"].'</td>
	 <td>'.$row["ContactPerson"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit updatestudent" id="'.$row["StudentId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deletestudent" id="'.$row["StudentId"].'"></a></td>
    </tr>
   ';
                   }
                   $output ;
                   echo $output;
                   ?>
                </tbody>
            </table>
   
   </div>
   </div>
                 </section>

      </section>
      <!--close 1row 2nd column-->
          </section>
</body>
 
 
<script src="student.js"></script>
<script>

    $(document).ready(function () {

        $('#Sec_StdInfo').hide();
      

        $('#StdInfo').click(function () {

        
            $('#Sec_StdInfo').show();
           
            
        });
       

    });

		  	</script>


		  	

 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 
