 
 <?php include('infoheader.php' );
 
  
 
 ?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
            
      <section id="main-content">
          <section class="wrapper site-min-height">
          <br>
          <div class="alert" style="display:none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
            
           <!--section school info start here-->

           <section id="Sec_SchoolInfo" style="display:none;">
          	<h3>School Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add School Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkInfo" onclick="javascript:$('#addFormSInfo').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSInfo">
<form id="schoolform" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>School Name</label>
     <input type="text" name="SchoolName" id="SchoolName" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
     <div class="form-group">
     <label>Select Image</label>
    <input type="file" name="user_image" id="user_image" />  
    <label name="hidden_user_image" id="hidden_user_image"></label>
    <span id="uploaded_image"></span>  
       
     </div>
     <br>
     <div class="form-group">
     <label>Registration #</label>
     <input type="text" name="Reg" id="Reg" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     <span class="form__group__info" data-validate="number">This field must be a number</span>
     </div>
     </div>
     <div class="col-md-6">
     
     <div class="form-group">
     <label>Address</label>
     <textarea name="Address" id="Address" class="form-control"></textarea>
     <span class="form__group__info" data-validate="required">This field is required</span>
	 <span class="form__group__info" data-validate="maxLenght | 40">The comment must be no more than 40 chars long</span>
     </div>
     <div class="form-group">
     <label>Latitude</label>
     <input type="text" name="Latitude" id="Latitude" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     <span class="form__group__info" data-validate="number">This field must be a number</span>
     </div>
     
     <div class="form-group">
     <label>Longitude</label>
     <input type="text" name="Longitude" id="Longitude" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     <span class="form__group__info" data-validate="number">This field must be a number</span>
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSInfo').slideUp();">Cancel</a>
    <input type="hidden" name="action" id="action" />  
    <input type="hidden" name="user_id" id="user_id" />  
   <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">School Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
             <thead>
                    <tr>
                        
	 <th>SchoolName</th>
     <th>Registration #</th>
     <th>Image</th>
	 <th>Address</th>
	 <th>Latitude</th>
	 <th>Longitude</th>
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="#school_data">
                   <?php 
				   $query = "SELECT * FROM tblschoolinfo ORDER BY SchoolId";
                   $result = mysqli_query($con, $query);
                   
  $output = '
   
   
  ';
  while($row = mysqli_fetch_assoc($result))
  {
   $output .= '

    <tr>
    

     
	 <td>'.$row["SchoolName"].'</td>
	 <td>'.$row["Reg"].'</td>
     <td><img src="data:image/jpeg;base64,'.base64_encode($row['Logo'] ).'" height="20" width="20" class="img-thumbnail" /></td>  
	 <td>'.$row["Address"].'</td>
	 <td>'.$row["latitude"].'</td>
	 <td>'.$row["longitude"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit update" id="'.$row["SchoolId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash delete" id="'.$row["SchoolId"].'"></a></td>
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

           <!--school info ends here-->
 <!--  Class section start here-->
            
            <section id="Sec_Class" style="display:none;">
                  <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Class <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkClass" onclick="javascript:$('#addFormClass').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormClass">
                <h2 id="actionLabel">Add Class</h2>
                <form class="form" id="ClassForm">
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name="ClassName" id="ClassName" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                   
                    </div> 
                   <div class="col-sm-6 col-xs-6">
                      <div class="form-group">

                            <label>Section</label> &nbsp  
                        <select class="form-control" name="Section" id="Section">
                            <?php
                            $querysection = "select * from tblsections";
                            $res = mysqli_query($con, $querysection);   
                            ?>
                             <?php
                             while ($row = $res->fetch_assoc()) 
                             {
                                 echo '<option value=" '.$row['SectionName'].' "> '.$row['SectionName'].' </option>';
                             }
                             ?>
                            
                        </select>
                        <span class="form__group__info" data-validate="required">This field is required</span>
                        </div>
                   </div>   
                  
                   <div class="col-sm-6 col-xs-6">
                     <div class="form-group">
     <label>Select which SubjectNames you have knowledge</label>
     <select id="SubjectNames" name="SubjectNames[]" multiple class="form-control" >
  <?php 
  $con = mysqli_connect('localhost','root','','bee1sms');
  $query = "select * from tblsubject";
  $sql = mysqli_query($con,$query);
  while($row = mysqli_fetch_assoc($sql))
  {
	  ?>
      <option value="<?php echo $row['SubjectName'];?>"><?php echo $row['SubjectName'];?></option>
      <?php
  }
  ?>
     </select>
    </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">           
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormClass').slideUp();">Cancel</a>
                    <input type="hidden" name="actionclass" id="actionclass" />  
                         <input type="hidden" name="Class_id" id="Class_id" />
                         <input type="submit" name="button_actionclass" id="button_actionclass" class="btn btn-default" value="Insert" />
                        </div>
                </form>
            </div>           
        </div>
   
              <div class="panel panel-primary">
                  <div class="panel-heading">Class</div>
     <div class="panel-body">
                             
                  <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        
                     <th>Class Name</th>
                        <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="class_table">
                   <?php 
       $query = "SELECT * FROM tblclasses ORDER BY ClassId";
                   $result = mysqli_query($con, $query);
                   while($row = mysqli_fetch_assoc($result))
                   {
                   $Class = $row['ClassName'].'-'.$row['Section'];
                   ?>

                   <tr>
                  <td><?php echo $Class;?></td>
                  <td><a name="update" class="glyphicon glyphicon-edit updateclass" id="<?php echo $row['ClassId'];?>"></a>&nbsp
                      <a name="delete" class="glyphicon glyphicon-trash deleteclass" id="<?php echo $row['ClassId'];?>"></a>
                  </td>
                  
                   </tr>

                   <?php
                   }
                   
 
       ?>
                </tbody>
            </table>
        </div>
    </div>
   
              </section>

       <!--  Class section ends here-->

       <!-- section Section start here-->

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
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                   
                    </div>    
                    <div class="col-md-12">              
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSec').slideUp();">Cancel</a>
                    <input type="hidden" name="actionsection" id="actionsection" />  
                         <input type="hidden" name="Section_id" id="Section_id" />
                         <input type="submit" name="button_actionsection" id="button_actionsection" class="btn btn-default" value="Insert" />
                        </div>
                </form>
            </div>            
        </div>
    
          
              <div class="panel panel-primary">
                  <div class="panel-heading">Sections</div>
     <div class="panel-body">
                             
                  <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        
                     <th>Section Name</th>
                        <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="section_table">
                   <?php 
       $query = "SELECT * FROM tblsections ORDER BY SectionId";
                   $result = mysqli_query($con, $query);
                
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

  <td>'.$row["SectionName"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit updatesection" id="'.$row["SectionId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deletesection" id="'.$row["SectionId"].'"></a></td>
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

    <!--end section here-->

      <!--  subject section start here-->
            
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
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                   
                    </div>    
                    <div class="col-md-12">           
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSub').slideUp();">Cancel</a>
                    <input type="hidden" name="actionsubject" id="actionsubject" />  
                         <input type="hidden" name="Subject_id" id="Subject_id" />
                         <input type="submit" name="button_actionsubject" id="button_actionsubject" class="btn btn-default" value="Insert" />
                        </div>
                </form>
            </div>           
        </div>
   
              <div class="panel panel-primary">
                  <div class="panel-heading">Subjects</div>
     <div class="panel-body">
                             
                  <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        
                     <th>Subject Name</th>
                        <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="subject_table">
                   <?php 
       $query = "SELECT * FROM tblsubject ORDER BY SubjectId";
                   $result = mysqli_query($con, $query);
                   
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     
  <td>'.$row["SubjectName"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit updatesubject" id="'.$row["SubjectId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deletesubject" id="'.$row["SubjectId"].'"></a></td>
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

          <!--  subject end here-->

          
<!-- section Activity start from here-->
     <section id="Sec_Activity" style="display:none;">
                   <div  class="panel panel-default users-content">
            <div  class="panel-heading">Add New  Activity <a href="javascript:void(0);"  class="glyphicon glyphicon-plus" id="addLinkactivity" onclick="javascript:$('#addFormactivity').slideToggle();">Add</a></div>
            <div  class="panel-body none formData" id="addFormactivity">
                <h2 id="actionLabel">Add  Activity</h2>
                <form  class="form" id="activityForm">
                    <div  class="col-md-12">
                        <div  class="form-group">
                        <label> Activity Name</label>
                        <input type="text"  class="form-control" name="ActivityName" id="ActivityName" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                        <div  class="form-group">
                        <label> Activity Description</label>
                        <input type="text"  class="form-control" name="ActivityDescription" id="ActivityDescription" />
                        <span class="form__group__info" data-validate="required">This field is required</span>
                    </div>
                   
                    </div>
                    
                    <div class="col-md-12">
                         <a href="javascript:void(0);"  class="btn btn-warning" onclick="$('#addFormactivity').slideUp();">Cancel</a>
                         <input type="hidden" name="actionactivity" id="actionactivity" />  
                         <input type="hidden" name="Activity_id" id="Activity_id" />
                         <input type="submit" name="button_actionactivity" id="button_actionactivity" class="btn btn-default" value="Insert" />  
                    </div>                  
                   
                </form>
            </div>         
        </div>
    
        
              <div  class="panel panel-primary">
                  <div  class="panel-heading"> Activity</div>
     <div  class="panel-body">
                             
                  <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        
                     <th>Activity Name</th>
                        <th>Activity Description </th>
                        <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="activity_table">
                   <?php 
       $query = "SELECT * FROM tblactivities ORDER BY ActivityId";
                   $result = mysqli_query($con, $query);
                   
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     
  <td>'.$row["ActivityName"].'</td>
  <td>'.$row["ActivityDescription"].'</td>
     <td><a name="update" class="glyphicon glyphicon-edit updateactivity" id="'.$row["ActivityId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deleteactivity" id="'.$row["ActivityId"].'"></a></td>
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
              <!-- section Activity end  here-->

               <!--ClassSchedule Section Start here-->

       <section id="Sec_ClassSchedule" style="display:none;">
          	<h3>Class Schedule Information !</h3>
          	
          		<div class="panel panel-default users-content">
            <div class="panel-heading">Add Class Schedule <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkSchedule" onclick="javascript:$('#addFormSchedule').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormSchedule">
<form id="ScheduleForm" method="post" enctype="multipart/form-data">
     <div class="col-md-6">
     <div class="form-group">
     <label>From Time</label>
     <input type="time" name="FromTime" id="FromTime" class="form-control"/>
     <span class="form__group__info" data-validate="required">This field is required</span>
     </div>
    
     <div class="form-group">
     <label>To Time</label>
     <input type="time" name="ToTime" id="ToTime" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     </div>
     <div class="col-md-6">
     
     <div class="form-group">
     <label>Occurs</label>
     <input type="text" name="Occurs" id="Occurs" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     <div class="form-group">
     <label>TeacherSubject</label>
     <input type="text" name="TeacherSubject" id="TeacherSubject" class="form-control" />
     <span class="form__group__info" data-validate="required">This field is required</span>
     
     </div>
     
     </div>
     <div class="col-md-12">
     <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormSchedule').slideUp();">Cancel</a>
    <input type="hidden" name="actionschedule" id="actionschedule" />  
    <input type="hidden" name="schedule_id" id="schedule_id" />  
   <input type="submit" name="button_actionschedule" id="button_actionschedule" class="btn btn-default" value="Insert" />  
      </div>
    </form>
    </div>
            
    </div>
    <div class="panel panel-primary">
                  <div class="panel-heading">Class Schedule Info</div>
	    <div class="panel-body">
   
   <table class="example table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        
	 <th>FromTime</th>
     <th>ToTime</th>
     <th>Occurs</th>
	 <th>TeacherSubject</th>
     <th>Action</th>
     
                    </tr>
                </thead>
                <tbody id="schedule_table">
                   <?php 
				   $query = "SELECT * FROM tblclssecschedule ORDER BY ClassSectionId";
                   $result = mysqli_query($con, $query);
                   
  $output = '
   
   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    

     
	 <td>'.$row["FromTime"].'</td>
	 <td>'.$row["ToTime"].'</td>
     
	 <td>'.$row["Occurs"].'</td>
	 <td>'.$row["TeacherSubject"].'</td>
	 
     <td><a name="update" class="glyphicon glyphicon-edit updateschedule" id="'.$row["ClassSectionId"].'"></a>&nbsp
     <a name="delete" class="glyphicon glyphicon-trash deleteschedule" id="'.$row["ClassSectionId"].'"></a></td>
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


   <!--section ends here-->
  
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	
      
 		  	

 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
  <script src="info.js"></script>
 <script src="subject.js"></script>
 <script src="activity.js"></script>
<script src="Section.js"></script>
<script src="Class.js"></script>
<script src="Schedule.js"></script>

 <script>

     $(document).ready(function () {

         
          $('#Sec_Class').hide();
            $('#Sec_SchoolInfo').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').hide();

         $('#SchInfo').click(function () {
             $('#Sec_SchoolInfo').show();
            $('#Sec_Activity').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Class').hide();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').hide();

         });
          $('#Class').click(function () {

            $('#Sec_Class').show();
            $('#Sec_SchoolInfo').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').hide();
        
        });
        $('#Subject').click(function () {

           
            $('#Sec_SchoolInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').show();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').hide();

        });
        $('#Activity').click(function () {


            $('#Sec_SchoolInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').show();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').hide();

        });
        $('#Section').click(function () {


            $('#Sec_SchoolInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').show();
            $('#Sec_ClassSchedule').hide();

        });
        $('#CSchedule').click(function () {


            $('#Sec_SchoolInfo').hide();
            $('#Sec_Class').hide();
            $('#Sec_Subject').hide();
            $('#Sec_Activity').hide();
            $('#Sec_Section').hide();
            $('#Sec_ClassSchedule').show();

        });

     
 
     });
</script>

   