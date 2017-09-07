 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' );

include( $_SERVER['DOCUMENT_ROOT'] . '/appconfig.php' );

if(!isset($_SESSION['SupUser']))
{
	header('location:/Admin/login.php');
}


 ?>
 
 
 
 
 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <section id="Sec_Menu" style="display:none;">
               <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Menu <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkMenu" onclick="javascript:$('#addFormMenu').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormMenu">
                
                <form class="form" id="MenuForm">
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>MenuCode</label>
                        <input type="text" class="form-control" name="MenuCode" id="MenuCode"/>
                    </div>
                    <div class="form-group">
                        <label>MenuName</label>
                        <input type="text" class="form-control" name="MenuName" id="MenuName"/>
                    </div>
                    <div class="form-group">
                        <label>MenuType</label>
                        <input type="text" class="form-control" name="MenuType" id="MenuType"/>
                    </div>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCodeMenu"/>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="PositionMenu"/>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="Title" id="Title"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="Detail" id="Detail"></textarea> 
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormMenu').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorMenu()">Add Menu</a>
                    </div>
                    
                    </div>
                   
                </form>
            </div>
            <div class="panel-body none formData" id="editFormMenu">
                <h2 id="actionLabel">Edit Menu</h2>
                <form class="form" id="MenuForm">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>MenuCode</label>
                        <input type="text" class="form-control" name="MenuCode" id="MenuCodeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>MenuName</label>
                        <input type="text" class="form-control" name="MenuName" id="MenuNameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>MenuType</label>
                        <input type="text" class="form-control" name="MenuType" id="MenuTypeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCodeEditMenu"/>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="PositionEditMenu"/>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="Title" id="TitleEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="Detail" id="DetailEdit"></textarea> 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id" id="idEditMenu"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormMenu').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorMenu()">Update Menu</a>
                    </div>
                    
                    </div>
                   
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Menu</div>
                  <div class="panel-body">

                      <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MenuCode</th>
                        <th>MenuName</th>
                        <th>MenuType</th>
                        <th>GroupCode</th>
                        <th>Position</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="MenuData">
                    <?php
                    include 'DB.php';
                    $db = new DB();
                    $users = $db->getRows('tblmenus',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['MenuCode']; ?></td>
                        <td><?php echo $user['MenuName']; ?></td>
                        <td><?php echo $user['MenuType']; ?></td>
                        <td><?php echo $user['GroupCode']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td><?php echo $user['Title']; ?></td>
                        <td><?php echo $user['Detail']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editMenu('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionMenu('delete','<?php echo $user['id']; ?>'):false;"></a>
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
          </div>
           </section>
            <section id="Sec_Group" style="display:none;">
                 <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add New Groups <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkGroup" onclick="javascript:$('#addFormGroup').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormGroup">
                <h2 id="actionLabel">Add Groups</h2>
                <form class="form" id="GroupForm" onsubmit='return formValidatorGroup()'>
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCode" required />
                    </div>
                    <div class="form-group">
                        <label>GroupName</label>
                        <input type="text" class="form-control" name="GroupName" id="GroupName" required />
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="Position" required />
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormGroup').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorGroup()">Add Group</a>
                </form>
            </div>
            <div class="panel-body none formData" id="editFormGroup">
                <h2 id="actionLabel">Edit User</h2>
                <form class="form" id="GroupForm">
                    <div class="form-group">
                        <label>GroupCode</label>
                        <input type="text" class="form-control" name="GroupCode" id="GroupCodeEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>GroupName</label>
                        <input type="text" class="form-control" name="GroupName" id="GroupNameEdit" required/>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="Position" id="PositionEdit" required/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEditGroup"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormGroup').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorGroup()">Update Group</a>
                </form>
            </div>
            
        </div>
    </div>
          <div class="row">
              <div class="panel panel-primary">
                  <div class="panel-heading">Group</div>
	    <div class="panel-body">
                             
                  <table class="example table table-striped display table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>GroupCode</th>
                        <th>GroupName</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="GroupData">
                    <?php
                   
                    $users = $db->getRows('tblmenugroup',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['GroupCode']; ?></td>
                        <td><?php echo $user['GroupName']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editGroup('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?actionGroup('delete','<?php echo $user['id']; ?>'):false;"></a>
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
          </div>
           </section>
            <section id="Sec_Org" style="display:none;">
             <div class="col-md-12">
          <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Add Organization <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLinkOrg" onclick="javascript:$('#addFormOrg').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addFormOrg">
                <h4 id="actionLabel">Add Org</h4>
                <form class="form" id="OrgForm">
                    <div class="col-md-6">

                           <div class="form-group">
                        <label>OrganizationCode</label>
                        <input type="text" class="form-control" name="OrgCode" id="OrgCode"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationName</label>
                        <input type="text" class="form-control" name="OrgName" id="OrgName"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationType</label>
                        <input type="text" class="form-control" name="OrgType" id="OrgType"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description" id="Description"></textarea>
                    </div>
                        
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="Address" id="Address"/>
                    </div>
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="City"/>
                    </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="State" id="State"/>
                    </div>
                        <div class="form-group">
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name="ZipCode" id="ZipCode"/>
                    </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="Phone"/>
                    </div>
                        <div class="form-group">
                        <label>AdminId</label>
                        <input type="text" class="form-control" name="AdminId" id="AdminId"/>
                    </div>
                        <div class="form-group">
                        <label>AdminPassword</label>
                        <input type="password" class="form-control" name="AdminPwd" id="AdminPwd"/>
                    </div>
                        <div class="form-group">
                           <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addFormOrg').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return formValidatorOrg()">Add User</a>
                    </div>
                    </div>
              
                </form>
            </div>
            <div class="panel-body none formData" id="editFormOrg">
                <h4 id="actionLabel">Edit User</h4>
                <form class="form" id="OrgForm">
                    <div class="col-md-6">

                          <div class="form-group">
                        <label>OrganizationCode</label>
                        <input type="text" class="form-control" name="OrgCode" id="OrgCodeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationName</label>
                        <input type="text" class="form-control" name="OrgName" id="OrgNameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>OrganizationType</label>
                        <input type="text" class="form-control" name="OrgType" id="OrgTypeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description" id="DescriptionEdit"></textarea>
                    </div>
                        <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="Address" id="AddressEdit"></textarea>
                    </div>
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="CityEdit"/>
                    </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="State" id="StateEdit"/>
                    </div>
                       <div class="form-group">
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name="ZipCode" id="ZipCodeEdit"/>
                    </div>
                       <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="Phone" id="PhoneEdit"/>
                    </div>
                       <div class="form-group">
                        <label>AdminId</label>
                        <input type="text" class="form-control" name="AdminId" id="AdminIdEdit"/>
                    </div>
                       <div class="form-group">
                        <label>AdminPwd</label>
                        <input type="password" class="form-control" name="AdminPwd" id="AdminPwdEdit"/>
                    </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" name="id" id="idEditOrg"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editFormOrg').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="return EditformValidatorOrg()">Update Organization</a>
                        </div>
                    </div>
                  
                </form>
            </div>
            
        </div>
    </div>
    <div class="row">
    <div class="panel panel-primary">
   <div class="panel-heading">Organization</div>
       <div class="panel-body">

           <table class="example table table-striped display table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>OrgCode</th>
                        <th>OrgName</th>
                        <th>OrgType</th>
                         <th>Description</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                         <th>ZipCode</th>
                        <th>Phone</th>
                        <th>AdminId</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="OrgData">
                    <?php
                  
                    $users = $db->getRows('tblorg',array('order_by'=>'id DESC'));
                    if(!empty($users)):
                        $count = 0; foreach($users as $user):
                            $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['OrgCode']; ?></td>
                        <td><?php echo $user['OrgName']; ?></td>
                        <td><?php echo $user['OrgType']; ?></td>
                        <td><?php echo $user['Description']; ?></td>
                        <td><?php echo $user['Address']; ?></td>
                        <td><?php echo $user['City']; ?></td>
                        <td><?php echo $user['State']; ?></td>
                        <td><?php echo $user['ZipCode']; ?></td>
                        <td><?php echo $user['Phone']; ?></td>
                        <td><?php echo $user['AdminId']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editOrg('<?php echo $user['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?')?Orgaction('delete','<?php echo $user['id']; ?>'):false;"></a>
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
          </div>
             </div>
           </section>
           
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

      <!--main content end-->

<script src="app/ShellPage.js"></script>
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>

<script>
    $(document).ready(function () {

        $('#Sec_Menu').hide();
        $('#Sec_Group').hide();
        $('#Sec_Org').hide();

        $('#Menu').click(function () {

            $.LoadingOverlay('show');
            $('#Sec_Group').hide();
            $('#Sec_Org').hide();
            $('#Sec_Menu').show();
            $.LoadingOverlay('hide');
        });

        $('#Group').click(function () {

            $.LoadingOverlay('show');
            $('#Sec_Menu').hide();
            $('#Sec_Org').hide();
            $('#Sec_Group').show();
            $.LoadingOverlay('hide');
        });

        $('#Org').click(function () {

            $.LoadingOverlay('show');
            $('#Sec_Menu').hide();
            $('#Sec_Group').hide();
            $('#Sec_Org').show();
            $.LoadingOverlay('hide');
        });
    })

</script>