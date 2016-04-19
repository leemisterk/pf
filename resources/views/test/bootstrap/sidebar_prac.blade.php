<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
		</head>
		<body>
				<style>

						#wrapper2{
										top:55px;
						}
						#sidebar-wrapper2{
										width:0px;
										background-color: black;
										position: absolute;
										z-index: 1;
										opacity: 0.9;
										overflow-y: auto;
										height: 100%;
										border: 2px solid red;


						}

						#page-content-wrapper2{
										position: absolute;
										width: 100%;
										border: 5px solid green;
										padding:12px;
						}

						#wrapper2.content-display #sidebar-wrapper2{
										width: 250px;

						}

					 #wrapper2.content-display #page-content-wrapper2{
										padding-left: 250px;
						}

						.sidebar-nav2{
										list-style: none;
						}

						.sidebar-nav2 li{
										text-indent: 20px;
										line-height: 40px;
										color: white;
						}

						.sidebar-nav2 li a{
										display: block;
										color: greenyellow;
										text-decoration: none;
						}

						.sidebar-nav2 li:hover{
										background-color: yellow;
						}

				</style>


				<div id="wrapper2">
						<div class="navbar navbar-inverse navbar-static-top ">
								<div class="navbar-header">
										<button class="navbar-toggle"
																		data-toggle="collapse"
																		data-target=".navbar-collapse"
																		type="button"
																		>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>

										</button>
										<a href="#" class="navbar-brand">Pro</a>
								</div>

						</div>
						<!-- sidebar -->
						<div id="sidebar-wrapper2">
								<ul class="sidebar-nav2">
										<li><a>lesson 1</a></li>
										<li>lesson 1</li>
										<li>lesson 1</li>
								</ul>
						</div>

						<!-- page content -->
						<div id="page-content-wrapper2">
								<div class="container">

										<div class="row">
												<a href="#" id="ContentDisplay" class="btn btn-danger">Content</a>
												<div class="col-lg-12">
														<h1>Side bar tutorial</h1>
														<p> ;ladskfa; ;lasdjf;alsdkfj asdf;lkdfj a;sdlfjas;ldfkj f;aldksjf;a sdfkjasd;lfkjsad;flkja;f ;ldkfja;lsdkfj ;alksdjf;alskdf
																dsa;lfka sdf; ;lkdsjf;alsd f;lkdjf ;sldskfja /;dlklfj a;ldskfj  sdfklajsd;it4poiadj;lksd; df;lkfj f;lksdajf;
																;ldsakf ;sdalkfjas flksd;asdkjf ;asdl;lakjsdf;lasdkj f;laskj</p>
												</div>
										</div>
								</div>

						</div>
				</div>

				<script>
					$('#ContentDisplay').click(function(){
						$('#wrapper2').toggleClass('content-display');
					});

					$('.navbar-toggle').click(function(){
						$('#wrapper2').toggleClass('content-display');
					})
				</script>
		</body>
</html>

