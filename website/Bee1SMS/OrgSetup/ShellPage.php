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
            <h3> Organization Setup Page.</h3>
            <div id="MenuSection">
                            <table  style="width:100%;height:650px;" >
                                <tr style="height:30px;">
                                    <td style="width:45%;" >
                                        <div class="control-group">
                                            <label class="offset2 span2 control-label">Select Menu </label>
                                                <div class="controls">
                                                    <select name="cbMenuName" id ="cbMenu">
                                                    <option>one</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                    <option>Four</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </td>
                                    <td style="width:10%;" ></td>
                                    <td style="width:45%;" ></td>
                                </tr>
                                <tr>
                                    <td >
                                        <div class="portlet box light-grey" style="height:100%;">
                                            <div class="portlet-title">
                                                <div class="caption"><i class="icon-globe"></i>Available Options </div>
                                                    <div class="tools">
                                                    </div>
                                                </div>
                                            <div class="portlet-body">
                                                <table class="dt table  table-bordered " style="height:100%" id="grdAvailable">
                                                    <thead>
                                                        <tr>
                                                            <th>Menu ID</th>
                                                            <th class="hidden-480">Menu Type</th>											
                                                            <th class="hidden-480">Group</th>
                                                            <th class="hidden-480">Descriptions</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                           
                                    <td style="width:250px;">
                                        <table>
                                            <tr style="height:100px;">
                                                <td> <input type="button" class="btn blue" data-toggle="modal" id="cmdAdd" style="width:250px;" value ="Add" />						</td>
                                            </tr>
                                        
                                            <tr >
                                                <td> <input type="button" class="btn blue" data-toggle="modal" id="cmdRemove" style="width:250px;" value ="Remove" /> 				</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>  
                                        <div class="portlet box light-grey" style="height:100%;">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-globe"></i>Selected Options 
                                                </div>
                                                
                                            </div><div class="tools">
                                            </div>
                                            
                                        </div><div class="portlet-body">
                                                    <table class="dt table  table-bordered " style="height:100%" id="grdSelected">
                                                        <thead>
                                                            <tr class="aria-selected" >
                                                                <th>Menu ID</th>
                                                                <th class="hidden-480">Menu Type</th>											
                                                                <th class="hidden-480">Group</th>
                                                                <th class="hidden-480">Descriptions</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
            <div id="groupUsers">
                            <table  style="width:100%;height:650px;" >
                                <tr style="height:30px;">
                                    <td style="width:45%;" >
                                        <div class="control-group">
                                            <label class="offset2 span2 control-label">Select Group </label>
                                                <div class="controls">
                                                    <select name="cbGroup" id ="cbGroup">
                                                    <option>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </td>
                                        <td style="width:10%;" ></td>
                                        <td style="width:45%;" ></td>
                                </tr>
                                <tr>
                                    <td >
                                        <div class="portlet box light-grey" style="height:100%;">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                <i class="icon-globe"></i>Available Users 
                                                </div>
                                                <div class="tools">
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="dt table  table-bordered " style="height:100%" id="grdAvailableUsr">
                                                    <thead>
                                                        <tr>
                                                            <th class="hidden-480">User Code</th>											
                                                            <th class="hidden-480">User Name</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:250px;">
                                        <table>
                                            <tr style="height:100px;">
                                                <td> <input type="button" class="btn blue" data-toggle="modal" id="cmdAddUsr" style="width:250px;" value ="Add" />
                                                </td>
                                            </tr>
                                            <tr >
                                                <td> <input type="button" class="btn blue" data-toggle="modal" id="cmdRemoveUsr" style="width:250px;" value ="Remove" /> 
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>  
                                        <div class="portlet box light-grey" style="height:100%;">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                <i class="icon-globe"></i>Selected User(s) 
                                                </div>
                                                <div class="tools">
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                    <table class="dt table  table-bordered " style="height:100%" id="grdSelectedUsr">
                                                        <thead>
                                                            <tr class="aria-selected" >
                                                                <th class="hidden-480">User Code</th>											
                                                                <th class="hidden-480">User Name</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

      <!--main content end-->
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>