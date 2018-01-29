
      <?php include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Hello <?php echo $_SESSION['UName'];?></h3>
              <div class="col-md-6">
              <h2> <?php echo date("l/m/Y")?> </h2>
              </div>
              <div class="col-md-6 text-right">
              <h2> <?php  date_default_timezone_set("Asia/Karachi"); echo date("h:i:A");?> </h2>
              </div>
              <br>
               <br>
          	<div class="row mt">
          		<div class="col-lg-12">
          		  <a href="/Admin/Admin.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn" style="background-color:#008080;">
                            <br />
                            <br />
                                  <img src="/assets/img/Admin.png" width="120" height="120" alt=""  />
                            <h3 class="h3" style="font-family:Rockwell Extra ; font-size:30px;color:#000;">Admin</h3>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                     <a href="/School/SchoolInfo.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn" style="background-color:#ffd777;">
                            <br />
                            <br />
                                  <img src="/assets/img/school.png" width="120" height="120" alt=""  />
                            <h3 class="h3" style="font-family:Rockwell Extra ; font-size:30px;color:#000;">School Info</h3>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                         
                         <a href="/Student/Student.php">
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="twitter-panel pn" style="background-color:#68dff0">
                            <br />
                            <br />
                          
                            <img src="/assets/img/student.png" width="120" height="120" alt=""  />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Student Info</h3>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                        <a href="Contact/Contact.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#ff9933">
                            <br />
                            <br />
                            <img src="/assets/img/contact.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Contact Info</h3>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                          <a href="Humain/Humain.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#e6e6e6">
                            <br />
                            <br />
                            <img src="/assets/img/hr.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Human Resources</h3>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                            <a href="Exam/Exam.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#e60073">
                            <br />
                            <br />
                            <img src="/assets/img/exam.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Exam</h3>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                              <a href="Fee/Fee.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn" style="background-color:#e60073">
                            <br />
                            <br />
                            <img src="/assets/img/exam.png" width="120" height="120" alt="" />
                            <h3 style="font-family:Rockwell Extra ; font-size:30px;color:Black;">Fee</h3>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
      <?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>