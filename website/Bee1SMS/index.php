 
 <?php include('header.php');
 include('appconfig.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
  
 
 ?>

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">

                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                         
                            <a href="/Admin/Admin.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn" style="background-color:#008080;">
                            <br />
                            <br />
                                  <img src="images/Admin.png" width="120" height="120" alt=""  />
                            <h3 class="h3" style="font-family:Rockwell Extra ; font-size:30px;color:#000;">Admin</h3>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                     <a href="/SchoolInfo/SchInfo.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn" style="background-color:#ffd777;">
                            <br />
                            <br />
                                  <img src="images/school.png" width="120" height="120" alt=""  />
                            <h3 class="h3" style="font-family:Rockwell Extra ; font-size:30px;color:#000;">School Info</h3>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                         
                         <a href="/Students/studentinfo.php">
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="twitter-panel pn" style="background-color:#68dff0">
                            <br />
                            <br />
                          
                            <img src="images/student.png" width="120" height="120" alt=""  />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Student Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                        <a href="Contact/contact.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#ff9933">
                            <br />
                            <br />
                            <img src="images/contact.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Contact Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                          <a href="Teacher/Teacher.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#e6e6e6">
                            <br />
                            <br />
                            <img src="images/teacher.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Teacher Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                            <a href="Exam/Exam.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#e60073">
                            <br />
                            <br />
                            <img src="images/exam.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Exam</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                    </div><!-- /row -->
                    
                    				
					
					
                      <!--custom chart end-->
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-12 END SECTION MIDDLE -->
      </section>
      <!--close 1row 2nd column-->
</section>
	 
	 <?php include('footer.php');?>
		  	
