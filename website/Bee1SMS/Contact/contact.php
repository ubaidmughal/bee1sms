 

 <?php include('contactheader.php' ); ?>
 

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <section id="Sec_Contact" style="display:none;">

                  	<h3>Contact Information !</h3>
          	
          		
        <div class="panel panel-default users-content">
           
            <div class="panel-heading">Add Contact Info <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkCon" onclick="javascript:$('#addFormCon').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormCon">
                
                <form class="form" id="ConForm" onsubmit='return formValidatorCon()'>
                    <div class="col-md-6">

                         <div class="form-group">
                        <label>ContactType</label>
                        <select class="form-control" name="ContactType" id="ContactType"  >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="Name" id="Name"  />
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address"  />
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="Phone"  />
                    </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" id="Email"  />
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" class="form-control" name="DOB" id="DOB"/>
                    </div>
                    <div class="form-group">
                        <label>TimeOfContact</label>
                        <input type="text" class="form-control" name="TimeOfContact" id="TimeOfContact" />
                    </div>
                    <div class="form-group">
                        <label>WayofContact</label>
                        <select class="form-control" name="WayOfContact" id="WayOfContact"  >

                            <option>Morning</option>
                            <option>Noon</option>
                            <option>Evening</option>
                            <option>Night</option>
                        </select>
                    </div>
                        <div class="form-group">
                        <label>Profession</label>
                        <input type="text" class="form-control" name="Profession" id="Profession"  />
                    </div>
                    </div>
                   <div class="col-md-12">
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormCon').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorCon()">Add Contact Info</a>
                   </div>
                  
                </form>
            </div>
            <div class="panel-body none formData" id="editFormCon">
                <h2 id="actionLabel">Edit Contact Info</h2>
                <form class="form" id="ConForm">
                    <div class="col-md-6">   
                        <div class="form-group">
                        <label>ContactType</label>
                        <select class="form-control" name="ContactType" id="ContactTypeEdit"  >
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                        
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="Name" id="NameEdit" />
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="AddressEdit" />
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="Phone" id="PhoneEdit" />
                    </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" id="EmailEdit"/>
                    </div>
                  </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" class="form-control" name="DOB" id="DOBEdit"/>
                    </div>
                    <div class="form-group">
                        <label>TimeofContact</label>
                        <input type="text" name="TimeOfContact" id="TimeOfContactEdit" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>WayofContact</label>
                        <select class="form-control" name="WayOfContact" id="WayOfContactEdit"  >

                            <option>Morning</option>
                            <option>Noon</option>
                            <option>Evening</option>
                            <option>Night</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" class="form-control" name="Profession" id="ProfessionEdit" />
                    </div>
                    </div>
                    <div class="col-md-12">
                         <input type="hidden" class="form-control" name="ContactId" id="idEditCon"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormCon').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorCon()">Update Contact Info</a>
                    </div>
                   
                </form>
            </div>
            
            
        </div>
   
              <div class="panel panel-primary">

                  <div class="panel-heading">School Info</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ContactType</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>TimeOfContact</th>
                        <th>WayofContact</th>
                        <th>Profession</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ConData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblcontacts',array('order_by'=>'ContactId DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['ContactType']; ?></td>
                        <td><?php echo $user['Name']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['Phone']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td><?php echo $user['DOB']; ?></td>
                        <td><?php echo $user['TimeOfContact']; ?></td>
                        <td><?php echo $user['WayOfContact']; ?></td>
                        <td><?php echo $user['Profession']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCon('<?php echo $user['ContactId']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionContact('delete','<?php echo $user['ContactId']; ?>'):false;"></a>
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

      <!--main content end-->

<script src="app/contact.js"></script>

 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>
		  	
<script>

    $(document).ready(function () {

        $('#Sec_Contact').hide();

        $('#ConInfo').click(function () {

            $.LoadingOverlay('show');
            $('#Sec_Contact').show();
            $.LoadingOverlay('hide');
        });

    });
</script>