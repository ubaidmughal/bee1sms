    
 
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
          
         <br />
              <section id="Sec_StdInfo" style="display:none;">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Students <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkStd" onclick="javascript:$('#addFormStd').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormStd">
                
                <form class="form" id="StdForm">
                    <div class="col-md-6">
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
                    <div class="col-md-6">

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
                    <div class="col-md-12">
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormStd').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorStd()">Add Students</a>
                    </div>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormStd">
                
                <form class="form" id="StdForm">
                    <div class="col-md-6">
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
                            <select name="Class" id="ClassEdit" class="form-control">
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
                        <select name="Section" id="SectionEdit" class="form-control">
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
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" name="FatherName" id="FatherNameEdit" required />
                    </div>
                    <div class="form-group">
                        <input type="radio" id="GenderEdit" name="Gender" value="male"/>&nbsp &nbsp Male<span style="margin-left:20px"><input type="radio" name="Gender" id="GenderEdit1" value="female"/> &nbsp &nbsp Female</span>
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
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" name="StudentId" id="idEditStd"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormStd').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorStd()">Update Students</a>
                    </div>
                    
                </form>
            </div>
            
        </div>
          
              <div class="panel panel-primary">
                  <div class="panel-heading">Students</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
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
                 </section>
              <section id="Sec_Class" style="display:none;">
                  <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Class <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkClass" onclick="javascript:$('#addFormClass').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormClass">
                <h2 id="actionLabel">Add Class</h2>
                <form class="form" id="ClassForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name="ClassName" id="ClassName" />
                    </div>
                   
                    </div>  
                    <div class="col-md-12">              
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormClass').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorClass()">Add class</a>
                        </div>  
                </form>
            </div>
            <div class="panel-body none formData" id="editFormClass">
                <h2 id="actionLabel">Edit Class</h2>
                <form class="form" id="ClassForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name="ClassName" id="ClassNameEdit" required />
                    </div>
                    </div>
                 <div class="col-md-12">
                    <input type="hidden" class="form-control" name="ClassId" id="idEditClass"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormClass').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorClass()">Update Class</a>
                     </div>
                </form>
            </div>
            
        </div>
    
              <div class="panel panel-primary">
                  <div class="panel-heading">Classes</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ClassData">
                    <?php
                    
                    $users = $db->getRows('tblclasses',array('order_by'=>'ClassId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['ClassName']; ?></td> 
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editClass('<?php echo $user['ClassId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionClass('delete','<?php echo $user['ClassId']; ?>'):false;"></a>
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
              <section id="Sec_Subject" style="display:none;">
                  <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Subject <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkSub" onclick="javascript:$('#addFormSub').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSub">
                <h2 id="actionLabel">Add Subject</h2>
                <form class="form" id="SubForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" class="form-control" name="SubjectName" id="SubjectName" />
                    </div>
                   
                    </div>    
                    <div class="col-md-12">           
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSub').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorSub()">Add Subject</a>
                        </div>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormSub">
                <h2 id="actionLabel">Edit Section</h2>
                <form class="form" id="SubForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" class="form-control" name="SubjectName" id="SubjectNameEdit" required />
                    </div>
                    </div>
                    <div class="col-md-12">
                    <input type="hidden" class="form-control" name="SubjectId" id="idEditSub"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormSub').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorSub()">Update Subject</a>
                     </div>
                </form>
            </div>
            
        </div>
   
              <div class="panel panel-primary">
                  <div class="panel-heading">Subjects</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="subData">
                    <?php
                    
                    $users = $db->getRows('tblsubject',array('order_by'=>'SubjectId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['SubjectName']; ?></td> 
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSub('<?php echo $user['SubjectId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionsub('delete','<?php echo $user['SubjectId']; ?>'):false;"></a>
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
              <section id="Sec_Activity" style="display:none;">
                   <div  class="panel panel-default users-content">
            <div  class="panel-heading">Add New  Activity <a href="javascript:void(0);"  class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div  class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add  Activity</h2>
                <form  class="form" id="userForm">
                    <div  class="col-md-12">
                        <div  class="form-group">
                        <label> Activity Name</label>
                        <input type="text"  class="form-control" name="ActivityName" id="ActivityName" />
                    </div>
                        <div  class="form-group">
                        <label> Activity Description</label>
                        <input type="text"  class="form-control" name="ActivityDescription" id="ActivityDescription" />
                    </div>
                   
                    </div>
                    
                    <div class="col-md-12">
                         <a href="javascript:void(0);"  class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);"  class="btn btn-success" onclick="return formValidator()">Add  Activity</a>
                    </div>                  
                   
                </form>
            </div>
            <div  class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit  Activity</h2>
                <form  class="form" id="userForm">
                    <div  class="col-md-12">
                        <div  class="form-group">
                        <label> Activity Name</label>
                        <input type="text"  class="form-control" name="ActivityName" id="ActivityNameEdit" required />
                    </div>
                        <div  class="form-group">
                        <label> Activity Description</label>
                        <input type="text"  class="form-control" name="ActivityDescription" id="ActDescriptionEdit" required />
                    </div>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden"  class="form-control" name="ActivityId" id="IdEdit"/>
                    <a href="javascript:void(0);"  class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);"  class="btn btn-success" onclick="return EditformValidator()">Update  Activity</a>
                    </div>
                    
                </form>
            </div>
            
        </div>
    
        
              <div  class="panel panel-primary">
                  <div  class="panel-heading"> Activity</div>
	    <div  class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Activity Name</th>
                        <th>Activity Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                   
                    $users = $db->getRows('tblactivities',array('order_by'=>'ActivityId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['ActivityName']; ?></td> 
                        <td><?php echo $user['ActivityDescription']; ?></td> 
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser('<?php echo $user['ActivityId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?action('delete','<?php echo $user['ActivityId']; ?>'):false;"></a>
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
              <section id="Sec_Section" style="display:none;">
                  <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Section <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkSec" onclick="javascript:$('#addFormSec').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSec">
                <h2 id="actionLabel">Add Section</h2>
                <form class="form" id="SecForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Section Name</label>
                        <input type="text" class="form-control" name="SectionName" id="SectionName" />
                    </div>
                   
                    </div>    
                    <div class="col-md-12">              
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSec').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorSec()">Add Section</a>
                        </div>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormSec">
                <h2 id="actionLabel">Edit Section</h2>
                <form class="form" id="SecForm">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                        <label>Section Name</label>
                        <input type="text" class="form-control" name="SectionName" id="SectionNameEdit" required />
                    </div>
                    </div>
                 <div class="col-md-12">
                    <input type="hidden" class="form-control" name="SectionId" id="idEditSec"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormSec').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorSec()">Update Section</a>
                     </div>
                </form>
            </div>
            
        </div>
    
          
              <div class="panel panel-primary">
                  <div class="panel-heading">Sections</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Section Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="secData">
                    <?php
                 
                    $users = $db->getRows('tblsections',array('order_by'=>'SectionId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['SectionName']; ?></td> 
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSec('<?php echo $user['SectionId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionsec('delete','<?php echo $user['SectionId']; ?>'):false;"></a>
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
      </section>
      <!--close 1row 2nd column-->
          </section>
</body>
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
 

<script src="StudentShellPage.js"></script>
<script>

    $(document).ready(function () {

        $('#Sec_StdInfo').hide();
        $('#Sec_Class').hide();
        $('#Sec_Subject').hide();
        $('#Sec_Activity').hide();
        $('#Sec_Section').hide();

        $('#StdInfo').click(function () {

            $('#Sec_StdInfo').show();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
           
        });
        $('#Class').click(function () {

        
            $('#Sec_Class').show();
            $('#Sec_StdInfo').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
            
        });
        $('#Subject').click(function () {

          
            $('#Sec_StdInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').show();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
           
        });
        $('#Activity').click(function () {

           
            $('#Sec_StdInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').show();
            $('#Sec_Section').hide();
            
        });
        $('#Section').click(function () {

            
            $('#Sec_StdInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').show();
            
        });

    });

		  	</script>


		  	
