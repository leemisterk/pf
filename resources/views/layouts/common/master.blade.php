<html>
		<head>
				<title>App Name - @yield('title')</title>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
				<link href={{asset("css/style1_programmingfree.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/js1_programmingfree.js")}} type="text/javascript"></script>

		</head>

		<body>
				@section('topnav')
				<nav class="navbar navbar-inverse navbar-fixed-top  " role="navigation">
						<div class="container">
								<div class="navbar-header">
										<button class="navbar-brand btn " href="#" id='sidebar-toggle'>Content</button>>	
										<a class="navbar-brand " href="#">Programmin Free</a>		

										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
										</button>

								</div>

								<div class="navbar-collapse collapse "> 
										<ul class=" nav navbar-nav navbar-right"> 
												<li class="active"><a href="#">Home</a></li>
												<li><a href="#about">About</a></li>
												<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">Themes 	
																<b class="caret"></b>
														</a>
														<ul class="dropdown-menu">
																<li class="dropdown-header " class="btn">Admin & Dashboard</li>
																<li><a href="#" class="btn">Admin 1</a></li>
																<li><a href="#" class="btn">Admin 2</a></li>
																<li class="dropdown-header" class="btn">Portfolio</li>
																<li><a href="#" class="btn">Portfolio 1</a></li>
																<li><a href="#" class="btn">Portfolio 2</a></li>
														</ul>
												</li>

										</ul>
								</div>
						</div>
				</nav>			
				@show

				<div id='wrapper'>

						@section('sidebar')
						<!-- Sidebar -->
						<div id="sidebar-wrapper">
								
										<div	id="close-content-sidebar" class="close-button">
												X
										</div>
										

												<ul class="sidebar-nav">				
														<li>

														</li>
														<li><a href="#">lesson 1</a></li>
														<li><a href="#">lesson 2</a></li>
														<li><a href="#">lesson 3</a></li>

												</ul>
										</div>
										@show
										<!--  page content -->
										<div id="page-content-wrapper">
												<div class="container-fluid">										
														@yield('content')
												</div>
										</div>
								</div>		

								</body>
								</html>