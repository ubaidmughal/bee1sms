 
 
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
                         

                     <a href="/SchoolInfo/SchInfo.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn">
                            <br />
                            
                                  <img src="img/scholinfo.png" width="128" height="128" alt="" />
                            <h1 class="h1" style="font-family:Rockwell Extra; font-size:50px;color:#000;">School Info</h1>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                         
                         <a href="#">
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="twitter-panel pn">
                            <br />
                            
                                  <img src="img/stdinfo.jpg" width="128" height="128" alt="" />
                            <h1 style="font-family:Rockwell Extra; font-size:50px;color:Black;">Student Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                        <a href="Contact/contact.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn">
                            <br />
                            <img src="img/coninfo.png" width="128" height="128" alt="" />
                            <h1 style="font-family:Rockwell Extra; font-size:50px;color:Black;">Contact Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                           <a href="/Teacher/Teacher.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn">
                            <br />
                            <img src="img/coninfo.png" width="128" height="128" alt="" />
                            <h1 style="font-family:Rockwell Extra ; font-size:50px;color:Black;">Teacher Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                              <a href="Exam/Exam.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn">
                            <br />
                            <img src="img/coninfo.png" width="128" height="128" alt="" />
                            <h1 style="font-family:Rockwell Extra ; font-size:50px;color:Black;">Exam</h1>
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
		  	
