<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
				<style>
						
						/* Sidebar */
						
						
						#sidebar-wrapper{
										z-index: 1;
										position: absolute;
										width: 0;
										height: 100%;
										overflow-y: hidden;
										background-color: black;
										opacity: 0.9;
										border: 2px solid red;
										
						}
						
						/* main content */
						#page-content-wrapper{
										width: 100%;
										position: absolute;
										padding: 12px;
										border: 5px solid green;
						}
						
						/* change the width of sidebar to display */
						#wrapper.menuDisplayed #sidebar-wrapper{
										width: 250px;
						}
							#wrapper.menuDisplayed #page-content-wrapper{
										padding-left: 250px;
						}
						
						/* sidebar styling */
						.sidebar-nav{
										padding:0;
										list-style: none;
						}
						
						.sidebar-nav li{
										text-indent: 20px;
										line-height: 40px;
						}
						
						.sidebar-nav li a{
										display: block;
										text-decoration: none;
										color:green;
						}
						
						.sidebar-nav li a:hover{
										background-color: yellow;
						}
				</style>
		</head>

		<body>			
				<div id="wrapper">

						<!-- Sidebar -->
						<div id="sidebar-wrapper">
								<ul class="sidebar-nav">
										<li><a href="#">lesson 1</a></li>
										<li><a href="#">lesson 2</a></li>
										<li><a href="#">lesson 3</a></li>
								</ul>
						</div>
						<!--  page content -->

						<div id="page-content-wrapper">
								<div class="container-fluid">
										<div class="row">
												<div class="col-lg-12">
														<a href="#" class="btn btn-success" id="menu-toggle">
																Toggle Menu
														</a>
														<h1> Side bar menu tutorial</h1>
														<p> sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar
																sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar
																sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar
																sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar sidebar
														</p>
												</div>

										</div>
								</div>
						</div>
				</div>
				<!-- javascript -->
				<script>
					$('#menu-toggle').click(function(){
						$('#wrapper').toggleClass('menuDisplayed');
					});
				</script>
				
		</body>
</html>

