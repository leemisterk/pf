<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>

		</head>
		<body>
				<nav class="navbar navbar-inverse">
						<div class="container-fluid">
								<div class="navbar-header">
										<a class="navbar-brand" href="#">WebSiteName</a>
										<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
										</button>
								</div>
								<div class="navbar-collapse">
									
								<ul class="nav navbar-nav">
										<li class="active"><a href="#">Home</a></li>
										<li><a href="#">Page 1</a></li>
										<li><a href="#">Page 2</a></li>
										<li><a href="#">Page 3</a></li>
										<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Book
														<b class="caret"></b>
												</a>
												<ul class="dropdown-menu">
														<li><a href="#">HTML</a></li>
												</ul>
										</li>
								</ul>
								</div>
						</div>
				</nav>

				<div class="container">
						<h3>Basic Navbar Example</h3>
						<p>A navigation bar is a navigation header that is placed at the top of the page.</p>
				</div>
		</body>


</html>

