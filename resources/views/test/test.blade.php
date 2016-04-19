<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/js1_programmingfree.js")}} type="text/javascript"></script>

		</head>
		<body>
						<select id="sel1">
					
				</select>
				
				<script>
					$(function(){
				PF.category.initCategorySelectOption('#sel1');
					});
					
					function doAsync2(){
						var deferredObject=$.Deferred();
						setInterval(function(){
							deferredObject.resolve();
						},100);
						return deferredObject.promise();
					}
					function doAsync3(){
						
					}



				</script>
		</body>

</html>


