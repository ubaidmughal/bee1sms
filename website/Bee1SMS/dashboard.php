 
 
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
                     <a href="/Info/Info.php">
                      	<div class="col-md-4 col-sm-4 mb">
                        
                      		<div class="grey-panel pn">
                            <br />
                            <br />
                            <h1 class="h1" style="font-family:Rockwell Extra Bold; font-size:50px;color:#000;">School Info</h1>
                                </div>
                              
                      	</div><!-- /col-md-4 -->
                     </a>
                         
                         <a href="#">
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="twitter-panel pn">
                            <br />
                            <br />
                            <h1 style="font-family:Rockwell Extra Bold; font-size:50px;color:Black;">Student Info</h1>
                                </div>
                      	</div><!-- /col-md-4 -->
                      	</a>
                        <a href="Contact/contact.php">
						<div class="col-md-4 col-sm-4 mb">
                      		<div class="grey-panel pn">
                            <br />
                            <br />
                            <h1 style="font-family:Rockwell Extra Bold; font-size:50px;color:Black;">Contact Info</h1>
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
		  	
