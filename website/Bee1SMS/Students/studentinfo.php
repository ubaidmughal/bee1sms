    
 
 <?php include('studentheader.php');
       include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 
 ?>

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    <!--main content start-->
    <body>
      <section id="main-content">
      <!--insert New Group-->
          
          <section class="wrapper">
          
         
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Students <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkStd" onclick="javascript:$('#addFormStd').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormStd">
                <h2 id="actionLabel">Add Students</h2>
                <form class="form" id="StdForm">
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Student Code</label>
                        <input type="text" class="form-control" name="StudentCode" id="StudentCode" required />
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="StudentName" id="StudentName" required />
                    </div>
                    <div class="form-group">
                        <label>Family Group</label>
                        <input type="text" class="form-control" name="FamilyGroup" id="FamilyGroup" required />
                    </div>
                    <div class="form-group">
                        <label>Name Of Group</label>
                        <input type="text" class="form-control" name="NameOfGroup" id="NameOfGroup" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Select Class</label> &nbsp 
                            <select name="Class" id="Class" class="form-control">
                            <?php
                            $queryclass = "select ClassName from tblclasses";
                            $res = mysqli_query($con, $queryclass);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 echo '<option value=" '.$row['ClassName'].' "> '.$row['ClassName'].' </option>';
                             }
                             ?>
                            
                        </select> 
                        
                    </div>
                        <div class="form-group">

                            <label>Section</label> &nbsp  
                        <select class="form-control" name="Section" id="Section">
                            <?php
                            $queryclass = "select * from tblsections";
                            $res = mysqli_query($con, $queryclass);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 echo '<option value=" '.$row['SectionName'].' "> '.$row['SectionName'].' </option>';
                             }
                             ?>
                            
                        </select>
                        </div>
                               
                    </div>
                    <div class="col-sm-6 col-xs-12">

                      <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherName"  />
                    </div>  
                    <div class="form-group">
                        <input type="radio" name="Gender" value="male"/>Male<span style="margin-left:20px"><input type="radio" name="Gender" value="female"/>Female</span>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="Age" id="Age"  />
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="DOB" />
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson"  />
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="Address" rows="3" required ></textarea>
                    </div>
                    </div>
                    <div class="">
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormStd').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorStd()">Add Students</a>
                    </div>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormStd">
                <h2 id="actionLabel">Edit User</h2>
                <form class="form" id="StdForm">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                        <label>Student Code</label>
                        <input type="text" class="form-control" name="StudentCode" id="StudentCodeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="StudentName" id="StudentNameEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Family Group</label>
                        <input type="text" class="form-control" name="FamilyGroup" id="FamilyGroupEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Name Of Group</label>
                        <input type="text" class="form-control" name="NameOfGroup" id="NameOfGroupEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Select Class</label> &nbsp 
                            <select name="Class" id="ClassEdit" style="width:34%; padding:7px 0;">
                            <?php
                            $queryclass = "select * from tblclasses";
                            $res = mysqli_query($con, $queryclass);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 echo '<option value=" '.$row['ClassName'].' "> '.$row['ClassName'].' </option>';
                             }
                             ?>
                            
                        </select> &nbsp
                        <label>Section</label> &nbsp  
                        <select name="Section" id="SectionEdit" style="width:33%; padding:7px 0;">
                            <?php
                            $queryclass = "select * from tblsections";
                            $res = mysqli_query($con, $queryclass);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 echo '<option value=" '.$row['SectionName'].' "> '.$row['SectionName'].' </option>';
                             }
                             ?>
                            
                        </select>
                    </div>
                    
                    </div>
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherNameEdit" required />
                    </div>
                    <div class="form-group">
                        <input type="radio" name="Gender" value="male"/>&nbsp &nbsp Male<span style="margin-left:20px"><input type="radio" name="Gender" value="female"/> &nbsp &nbsp Female</span>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="Age" id="AgeEdit" required />
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="DOBEdit" />
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPersonEdit" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="AddressEdit" rows="3" required ></textarea>
                    </div>
                    </div>
                    <input type="hidden" class="form-control" name="StudentId" id="idEditStd"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormStd').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorStd()">Update Students</a>
                </form>
            </div>
            
        </div>
   
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Students</div>
	    <div class="panel-body">
                             
                  <table id="example" class="table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Code</th>
                        <th>Student Name</th>
                        <th>Family Group</th>
                        <th>Name Of Group</th>
                        <th>Father Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Age</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="stdData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblstudent',array('order_by'=>'StudentId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['StudentCode']; ?></td>
                        <td><?php echo $user['StudentName']; ?></td>
                        <td><?php echo $user['FamilyGroup']; ?></td>
                        <td><?php echo $user['NameOfGroup']; ?></td>
                        <td><?php echo $user['FatherName']; ?></td>
                        <td><?php echo $user['Class']; ?></td>
                        <td><?php echo $user['Section']; ?></td>
                        <td><?php echo $user['Age']; ?></td>
                        <td><?php echo $user['DOB']; ?></td>
                        <td><?php echo $user['Gender']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['ContactPerson']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editStd('<?php echo $user['StudentId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionstd('delete','<?php echo $user['StudentId']; ?>'):false;"></a>
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
   
       <div>

           
       
       
   </div>
    </div>
       
       
                 
      </section>
      <!--close 1row 2nd column-->
          </section>
</body>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 

<script src="student.js"></script>


		  	
