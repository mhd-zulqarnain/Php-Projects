<?php
include "function/function.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>OSS PROJECT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  
    <![endif]-->
		<script src="js/jquery-1.10.1.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
	</head>
  <body>
  <div class="container-fluid" id="ars">
		 <!-- header start-->
		<div class="container" id="adn">
				 <!--LOGO -->
			<div class="hidden-xs col-sm-2 hidden-md hidden-lg" id="lo"><center><img src="images/logo1.png"/></center></div>
			<div class="hidden-xs  hidden-sm col-md-2 hidden-lg" id="lo"><img src="images/logo1.png"/></div>
			<div class="hidden-xs hidden-sm hidden-md col-lg-2" id="lo"><img src="images/logo1.png"/></div>
				 <!--LOGO-->
				 
				 
				 <!--Navigation start on md-->
		<div class="hidden-xs col-sm-7 col-md-5">
				<div class="navi">
				<ul>
					<li><a href="#">HOME</a></li>
					<li><a href="#">CATEGORY</a></li>
					<li><a href="#">ALL ADS</a></li>
					<li><a href="#">HELP/SUPPORT</a></li>
					<li>PAGES
						<ul>
							<li><a href="#">Product 1</a></li>
							<li><a href="#">Product 2</a></li>
							<li><a href="#">Product 3</a></li>
							<li><a href="#">Product 4</a></li>
							<li><a href="#">Product 5</a></li>
						</ul>
					</li>
					
				</ul>
			</div>	
		</div>
			<div class="hidden-xs hidden-sm col-md-5  ">
							<div id="nav">
				<ul>
					<li><span class="glyphicon glyphicon-user"/>France
						<ul>
							<li><a href="#">Pakistan</a></li>
							<li><a href="#">France</a></li>
						</ul>
					</li>
					
					<li>Sign In / Registeration
						<ul>
							<li><a href="#">Login In</a></li>
							<li><a href="#">Registeration</a></li>
						</ul>
					</li>
					<li style="background:green; border-radius:10px;"><a href="#" >Post Your Ads</a></li>
					
				</ul>
			</div>
								
							
			</div>
			
				
					</div>
						<!-- End of Navigation md -->
						<!--Start of nacigation on XS-->
				<nav class="navbar navbar-default hidden-sm hidden-md hidden-lg col-xs-12">
				  <div class="container ">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<img src="images/logo1.png"/>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						  </ul>
						</li>
					  </ul>
					  <form class="navbar-form navbar-left">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					  </form>
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
						  </ul>
						</li>
					  </ul>
					</div>
				  </div>
				</nav>
				<!--End of navigation on XS-->
	</div>
		 <!--Header Close -->
	
	<!--START OF MAIN SECTION O OUR WEBSITE-->
	
			<div class="container-fluid" id="main">
							<div class="container">

								<div class="col-xs-12 col-md-10 col-md-offset-2" id="head">
									<h1>World's Largest Classified Portals</h1>
								</div>
								<div class="hidden-xs col-md-9 col-md-offset-3" style="color:#fff;">
									<h4>Search from over 15,00,000 classifieds & Post unlimited classifieds free!</h4>
								</div>
								</div>
								<!--START SEARCH BAR AND CATEGORY-->
								<div class=" hidden-xs col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-3 " style="margin-top:20px;">
									
									
									<div class="bar">
										<div class="category">
										<select style="height:50px;width:180px;border-radius:5px;position:absolute;">
										<option>Select Category</option>
										<option>Electric</option>
										<option>Mobiles</option>
										<option>Fashion</option>
										</select>
										
										</div>
											<div class="keyword">
										<input type="text" placeholder="Select Keyword"/>
										</div>
										<div class="search">
										<input type="submit" value="Search" style="background:#28ae71;"/>
										</div>
									</div>
								</div>
								<!--END SEARCH BAR AND CATEGORY-->
								
								<!--ICONS YOU HAVE TO CHANGE ZUL-->
									<div class="hidden-xs col-sm-3 col-sm-offset-5 col-md-5 col-md-offset-5" id="icon">
										<img src="images/f.png"/>
										<img src="images/y.png"/>
										<img src="images/i.png"/>
										<img src="images/g.png"/>
									</div>
									<!--End ICONS-->
									<!--START OF BANNER AND CATEGORY -->
										<div class="container " >
										<!--FIRST BANNER-->
											<div class="col-md-2 hidden-xs hidden-sm"style="margin-top:40px;">
											<img src="images/2.jpg"/>
											</div>
											<!--FIRST BANNER END-->
											
											<!-- START OF MAIN CATEGORIES AND PRODUCT SLIDER -->
									<div class="col-xs-12 col-sm-12 col-md-8" style="margin-top:40px;">
												<div class="col-xs-12 col-sm-3 col-md-3  " style="background:#f7f7f7;"><div class="products">
												<center><img src="images/7.png"/></center>
												<p>Car & Vechiles<br>(1200)</p>
												</div></div>
												<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;"><div class="products">
												<center><img src="images/16.png"/></center>
												<p>Electrics & Gidget<br>(1600)</p>
												</div></div>
												<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;" ><div class="products">
												<center><img src="images/24.png"/></center>
												<p>Real Estate<br>(1300)</p>
												</div></div>
												<div class="col-xs-12 col-sm-3 col-md-3 "  style="background:#f7f7f7;" ><div class="products">
												<center><img src="images/26.png"/></center>
												<p>Sports & Games<br>(1050)</p>
												</div></div>
											
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">
													<center><img src="images/27.png"/></center>
												<p>Fashion & Beauty<br>(1530)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">

													<center><img src="images/28.png"/></center>
												<p>Pets & Animals<br>(1130)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">

													<center><img src="images/32.png"/></center>
												<p>Home Appliances<br>(200)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;"> <div id="products">
													
													<center><img src="images/5.png"/></center>
												<p>Matrimony Services<br>(120)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">
													<center><img src="images/8.png"/></center>
												<p>Music & Arts<br>(1943)</p>
															
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">
													<center><img src="images/6.png"/></center>
												<p>Miscellaneous<br>(1900)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;">	<div id="products">
													<center><img src="images/29.png"/></center>
												<p>Job Openings<br>(800)</p>
													</div></div>
													<div class="col-xs-12 col-sm-3 col-md-3 " style="background:#f7f7f7;"> <div id="products">
													<center><img src="images/31.png"/></center>
												<p>Books & Maginzes<br>(1900)</p>
													</div></div>
												<!--END OF MAIN CATEGORIES-->
												
												<!--START OF SLIDER CATEGORIES-->
												<div class="col-md-8 col-sm-6 hidden-xs" style="margin-top:20px;">
										<div id="main1">
											<h6 style="margin-top:30px;widtH:80px;position:absolute;margin-left:40px;">Featuerd Ads</h6>
											<img  style="height:20px;margin-left:600px;position:absolute;margin-top:30px;"src="images/1.png" id="Previous1">
											<img  style="height:20px;margin-left:620px;position:absolute;margin-top:30px;"src="images/2.png" id="Next1">

											<hr style="position:absolute;background:green;width:590px;margin-left:40px;margin-top:60px;"/>
											<ul id="slider">
											
												<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/21.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
									<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/14.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
									<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/4.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
									<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/3.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
									<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/25.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
									<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/22.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
											<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/19.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
											<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/14.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>
										<li ><div class="ads3">
															<div class="sub_ads4">
																<image src="images/25.jpg" />
																<p >$25.00 (Negoitable)</p>
																	<h5>Visistar gostic <center>guitar</center></h5>
																		<h6>Music & Art</h6>				
															</div>
															<div class="btm">
																<p>7 Jan 10:10pm</p>
															</div>
															
									</div></li>


												<div style="clear:both"></div>
											</ul>
										</div>	
										</div>
										
										<!--END OF SLIDER CATEGORIES-->

									</div>


												<!--SECOND  BANNER-->
											<div class="col-md-2 hidden-xs hidden-sm"style="margin-top:40px;">
											<img src="images/13.jpg"/>
											</div>
											
											<!--END OF SECOND BANNER-->
										</div>
										
										
										<!--FEATURED ADS IN XS BUT ITS NOT A SLIDER-->
				<div class="container col-xs-12 hidden-sm hidden-md hidden-lg" >
					<h2><centeR>Featured Ads</centeR></h2>
							<div class="ads2" >
						<div class="sub_ads2">
							<img src="images/19.jpg" />
							<p >$25.00 (Negoitable)</p>
								<h5>Visistar gostic <center>guitar</center></h5><br>
									<h6>Music & Art</h6>
										
						</div>
						<div class="btm">
							<p>7 Jan 10:10pm</p>
								<img src="images/a.png"/>
						</div>
							</div>	
							
					
						<div class="ads2" >
						<div class="sub_ads2">
							<img src="images/21.jpg" />
							<p >$25.00 (Negoitable)</p>
								<h5>Visistar gostic <center>guitar</center></h5><br>
									<h6>Music & Art</h6>
										
						</div>
						<div class="btm">
							<p>7 Jan 10:10pm</p>
								<img src="images/a.png"/>
						</div>
							</div>	
							
					
						<div class="ads2" >
						<div class="sub_ads2">
							<img src="images/22.jpg" />
							<p >$25.00 (Negoitable)</p>
								<h5>Visistar gostic <center>guitar</center></h5><br>
									<h6>Music & Art</h6>
										
						</div>
						<div class="btm">
							<p>7 Jan 10:10pm</p>
								<img src="images/a.png"/>
						</div>
							</div>	
							
				</div>
			
			<!--END OF FEATURE ADS IN XS-->
							
							<!--HORUZONTAL BANNER BANNER-->
				<div class="container" style="margin-top:50px;">
					<div class=" hidden-xs col-sm-6 col-md-3 col-md-offset-2" style="width:730px;" >
				<div class="baner">
					<img src="images/23.jpg"/>
				</div>
				</div>
				</div>
				
				<!--START OF MORE PRODUCTS-->
			<div class="container" >
				<div class="hidden-xs col-sm-12 col-md-3 col-md-offset-2" style="background:#f7f7f7;height:890px;margin-top:30px;width:730px;">
						
	<?php
	morePro();
	?>
						
				</div>
				
				
				
				
					<div class="container col-xs-12  hidden-sm hidden-md hidden-lg" style="margin-top:20px;" >
						<h2><centeR>Categories</center></h2>
							<?php
							moreProxm()?>
					</div>
					
						
				
				
					
			</div>
			<!--END OF MORE PRODUCTS-->
				
				<!--START OF ADRESS-->
					<div class="container" >
					<div class=" hidden-xs col-sm-8 col-md-5 col-md-offset-2" style="background:#f7f7f7;margin-top:30px;width:730px;">
						<div class="adrs1">
						<img src="images/9.png"/>
							<h4>Secure Trading</h4>
							<p><centeR>Lorem Ipsum dumy text <br>of websites</center></p>
						</div>
						<div class="adrs1">
						<img src="images/15.png"/>
							<h4>Secure Trading</h4>
							<p><center>Lorem Ipsum dumy text <br>of websites</center></p>
						</div>
						<div class="adrs1">
						<img src="images/11.png"/>
							<h4>Secure Trading</h4>
							<p><center>Lorem Ipsum dumy text <br>of websites</centeR></p>
						</div>
					</div>
					</div>
					<!--END OF ADDRESS-->
					<!--START OF ADRESS IN XS-->
					<div class="container" >
					<div class=" col-xs-12 hidden-sm hidden-md hidden-lg" style="margin-top:20px;">
				
						<div class="adrs1">
						<img src="images/9.png"/>
							<h4>Secure Trading</h4>
							<p><centeR>Lorem Ipsum dumy text <br>of websites</center></p>
						</div>
						

						<div class="adrs1">
						<img src="images/15.png"/>
							<h4>Secure Trading</h4>
							<p><center>Lorem Ipsum dumy text <br>of websites</center></p>
						</div>
						<div class="adrs1">
						<img src="images/11.png"/>
							<h4>Secure Trading</h4>
							<p><center>Lorem Ipsum dumy text <br>of websites</centeR></p>
						</div>
					</div>
					</div>
					<!--END OF ADRESS IN XS-->
										
			</div>
			
			
			<!--END OF CONTAINER FLUID WHICH START FROM TOP-->
			
			<!--SECOND CONTAINER FLUID START FOR CONTACT US-->
			<div class="container-fluid hidden-xs hidden-sm " id="crtn">
				<div class="hidden-xs hidden-sm col-md-12">
						<div class="full ">
						</div>
					</div>
				</div>
				<!--SECOND CONTAINER FLUID END FOR CONTACT US-->
				
				
				<!--THIRD CONTAINER FLUID START FOR  FOOTER-->
		<div  class="container-fluid" style="background:#f7f7f7;margin-top:50px;">
				<div class="col-md-10 hidden-xs  col-md-offset-1">
					
				<div class="footer" >
				<div class="ftr1   ">
				<ul><h3 style="width:150px;">Quick links</h3>
					<li>About us</li>
					<li>Contact us</li>
					<li>Career</li>
					<li>All Cities</li>
					<li>Help & Support</li>
					<li>Advertise With Us</li>
					<li>Blog</li>
				</ul>
				</div>
				
				<div class="ftr1 hidden-xs ">
				<ul><h3>How To sell fast</h3>
					<li>Membership</li>
					<li>Banner Advertising</li>
					<li>Promote Your Add</li>
					<li>Trade Delivers</li>
					<li>Faqs</li>
				</ul>
				</div>
				
				<div class="ftr1 hidden-xs hidden-sm">
				<ul><h3>Follow us on</h3>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Google</li>
					<li>You tube</li>
				</ul>
				</div>
				<div class="ftr1 hidden-xs hidden-sm" >
				<ul><h3 >Newsletter</h3>
					<li style="width:260px;">Trade is the Wordest leading classsified platform that brings</li><br>
					<input style="heighT:50px;width:250px;"type="text" placeholder="Your email ID"/>
					<input style="height:35px;width:100px;margin-top:20px;color:#fff;background:green;border:1px solid green;"type="submit" value="Sign up"/>
				</ul>
				</div>	
					
				<p  class=" hidden-xs hidden-sm"style="position:absolute; margin-top:31%;margin-left:37%;color:gray">Copyright c 2016 Developed by 4BF</p>
					
		
					
				</div>	
				</div>
				
				<!--START FOR XS-->
				<div class="container">
					<div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="ftr1">
						<ul><h3>Quick links</h3>
					<li>About us</li>
					<li>Contact us</li>
					<li>Career</li>
					<li>All Cities</li>
					<li>Help & Support</li>
					<li>Advertise With Us</li>
					<li>Blog</li>
				</ul>
					</div>
				</div>
				<!--END OF FOOTER FOR XS-->
				</div>
				
				<!--SECOND CONTAINER FLUID END FOR FOOTER-->
				<script>
		$('document').ready(function(){
			$('#Next1').click(function(){
			$('#slider').animate({marginLeft:'+=210px'},300);
				var getSlider = document.getElementById('slider').style.marginLeft; 
				if(getSlider == "0px"){
				$('#slider').stop();
				}
			});
			
			$('#Previous1').click(function(){
			$('#slider').animate({marginLeft:'-=210px'},300);
			var getSlider = document.getElementById('slider').style.marginLeft;
				if(getSlider ==   "-1260px")
				{
					$('#slider').stop();
				}
			});
			//$( "li" ).draggable();
			<!-- $( "#slider" ).sortable(); -->
			//$( "#slider" ).disableSelection();
		});
	</script>
	
	
		<script>
		$('document').ready(function(){
			$('#Next1').click(function(){
			$('#slider').animate({marginLeft:'+=210px'},400);
				var getSlider = document.getElementById('slider').style.marginLeft; 
				if(getSlider == "0px"){
				$('#slider').stop();
				}
			});
			
			$('#Previous1').click(function(){
			$('#slider').animate({marginLeft:'-=210px'},400);
			var getSlider = document.getElementById('slider').style.marginLeft;
				if(getSlider ==   "-1260px")
				{
					$('#slider').stop();
				}
			});
			//$( "li" ).draggable();
			<!-- $( "#slider" ).sortable(); -->
			//$( "#slider" ).disableSelection();
		});
	</script>
	
						
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>