<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
		<title>+Electronic Store</title>
		<? include("CodeScript.php"); ?>
		<link rel="shortcut icon" href="img/favicon.png">
		<link href="Style/css/Portal.css" TYPE="text/css" REL="stylesheet">
		<link href="Style/css/iefix.css" TYPE="text/css" REL="stylesheet">
		<script type="text/javascript" src="../Controllers/js/dom-drag.js"></script>
		<script type="text/javascript" src="../Controllers/js/portal.js"></script>

		<style type="text/css">
			/* Controlar manualmente el ancho inicial de los 2 frames inferiores */
			#ContList li a:hover{background-color: red;}
			#Body{width: 100%}
			#Img1{width:20px; height:20px; float:left; margin-right:5px; margin-left:10px; border-radius: 5px; border-color:#2d6aa1; border:2px;}
			#Img2{width:20px; height:20px; float:left; margin-right:8px; margin-left:10px; border-radius: 5px; border-color:#2d6aa1; border:2px;}
			#Img3{width:20px; height:20px; float:left; margin-right:8px; margin-left:10px; border-radius: 5px; border-color:#2d6aa1; border:2px;}
			#Img4{width:20px; height:20px; float:left; margin-right:8px; margin-left:10px; border-radius: 5px; border-color:#2d6aa1; border:2px;}
			#Img5{width:20px; height:20px; float:left; margin-right:8px; margin-left:10px; border-radius: 5px; border-color:#2d6aa1; border:2px;}
			#StatusImg1{width:15px; height:15px; float:right; margin-left:10px;margin-right: 25px;}
			#StatusImg2{width:15px; height:15px; float:right; margin-left:10px;margin-right: 25px;}
			#StatusImg3{width:15px; height:15px; float:right; margin-left:10px;margin-right: 25px;}
			#StatusImg4{width:15px; height:15px; float:right; margin-left:10px;margin-right: 25px;}
			#StatusImg5{width:15px; height:15px; float:right; margin-left:10px;margin-right: 25px;}
			#NmChat1{float: left;}
			#NmChat2{float: left;}
			#NmChat3{float: left;}
			#NmChat4{float: left;}
			#NmChat5{float: left;}
			@media screen and (max-width:1250px){
				#NmChat1{font-size: 11px;}
				#NmChat2{font-size: 11px;}
				#NmChat3{font-size: 11px;}
				#NmChat4{font-size: 11px;}
				#NmChat5{font-size: 11px;}
			}
			@media screen and (max-width:950px){
				#NmChat1{display: none;margin-left:2px;}
				#NmChat2{display: none;margin-left:2px;}
				#NmChat3{display: none;margin-left:2px;}
				#NmChat4{display: none;margin-left:2px;}
				#NmChat5{display: none;margin-left:2px;}
				#StatusImg1{float:left;margin-right: 0px;}
				#StatusImg2{float:left;margin-right: 0px;}
				#StatusImg3{float:left;margin-right: 0px;}
				#StatusImg4{float:left;margin-right: 0px;}
				#StatusImg5{float:left;margin-right: 0px;}
			}
			@media screen and (max-width:450px){
				#Img1{margin-right: 0;margin-left: 0;}
				#Img2{margin-right: 0;margin-left: 0;}
				#Img3{margin-right: 0;margin-left: 0;}
				#Img4{margin-right: 0;margin-left: 0;}
				#Img5{margin-right: 0;margin-left: 0;}
				#StatusImg1{margin-left: 5px;}
				#StatusImg2{margin-left: 5px;}
				#StatusImg3{margin-left: 5px;}
				#StatusImg4{margin-left: 5px;}
				#StatusImg5{margin-left: 5px;}
			}
			
		</style>
	</head>
	
	<body>
		<form name="psform" id="psform"  method="post">
			<input type="hidden" class="text" id="vsUsuario" name="vsUsuario" maxlength="15"  size="15" value='<?echo $_GET["vsUsuario"];?>' />
			<input type="hidden" class="text" id="vsSesion" name="vsSesion" maxlength="30"  size="30" value='<?echo $_GET["vsSesion"];?>' />

			<noscript>
				Para utilizar esta Aplicacion Web, debe tener habilitado el uso de <span style="color: #c00; font-weight: bold;">"Javascript"</span> en su navegador.
			</noscript>

			<!-- Inicio Contenedor principal -->
			<div id="PORTAL_CONTAINER">
				
				<!-- Inicio Contenedor contactos chat -->
				<div id="contactos"  style="display:none;width:0%; margin-top:50px;margin-bottom:15px;">
					
					<!--<div style="border-bottom:1px solid #b8b8b8;">
						<a href="javascript:alert('Ir a info del colegio');">
							<img id="LogoCole" style="margin-top:10px;width:60px;height:60px;" src="images/PlusStudent.jpg">
							<!--<label style="color:#002d45;font-size:10.5px;margin-left:10px;margin-bottom:10px;">Plus Student</label>
						</a>
					</div>-->
					<ul id="ContList" style="display:none;">
						<li style="margin-top:10px;">
							<a  href="javascript:add_janelas('Kenneth_Brichaux','Kenneth Brichaux');" name="lucas" id="lucas" class="Contacts">
								<img id="Img1" title="Kenneth Brichaux" src="img/mypic.jpg">
								<label id="NmChat1">Kenneth Brichaux</label>
								<img id="StatusImg1" title="Kenneth Brichaux esta conectad@" src="img/profile.jpg">
							</a>
						</li>
						<li style="margin-top:10px;">
							<a  href="javascript:add_janelas('Ivan','Ivan');" name="lucas" id="lucas" class="Contacts">
								<img id="Img2" title="Ivan" src="img/profile.jpg">
								<label id="NmChat2">Ivan</label>
								<img id="StatusImg2" title="Ivan esta conectad@" src="img/profile.jpg.png">
							</a>
						</li>
						<li style="margin-top:10px;">
							<a href="javascript:add_janelas('Fabio','Fabio');" name="Fabio" id="Fabio" class="Contacts">
								<img id="Img3" title="Norman"  src="img/profile.jpg">
								<label id="NmChat3">Norman</label>
								<img id="StatusImg3" title="Norman esta conectad@" src="img/Message.jpg">
							</a>
						</li>
						<li style="margin-top:10px;">
							<a href="jvascript:void(0);" name="" id="" class="Contacts">
								<img id="Img4" title="Fabio Beccari" src="img/profile.jpg">
								<label id="NmChat4">Samuel lopez</label>
								<img id="StatusImg4" title="Jennyfer Orozco esta conectad@" src="img/Message.jpg">
							</a>
						</li>
						<li style="margin-top:10px;">
							<a href="jvascript:void(0);" name="" id="" class="Contacts">
								<img id="Img5" title="Fabio Beccari" src="img/profile.jpg">
								<label id="NmChat5">Gilgecio Santos</label>
								<img id="StatusImg5" title="Jennyfer Orozco esta conectad@" src="img/Message.jpg">
							</a>
						</li>
					</ul>
				</div>

				<!-- Inicio Contenedor superios top -->
				<div id="topFrame" style="display: none;"></div>

				<!-- Inicio Contenedor medio middle -->
				<div id="MiddleFrame">
					<iframe id="Body" name="Body" src="ESMEN.php" style="width: 100%;" scrolling="auto" frameborder="0" ></iframe>
					<!--<iframe id="Body" name="Body" src="Descktop1.php" scrolling="auto" frameborder="0" ></iframe>-->
					<!--<iframe id="Body" name="Body" src="../Controllers/js/fullcalendar-2.3.1/demos/Actividades.html" scrolling="auto" frameborder="0" ></iframe>-->
				</div>
			</div>
			
			<div id="onScreenMessageDialog">
				<span style="background-color:#005a9b;"><span>Buscar</span></span>
				<div class="MessageBody">
					<label style="color:#005a9b;">Telefonos, Tabletas, Electrodomestcos y Gadgets</label><br>
					<input id="TRXDESC" type="text" size="25" maxlength="25" style="font-size:17px;color:#aaabaf;">
				</div>
			</div>
			<div id="notificationBar" style="display: none;">
				<div class="controlbar" title="Contraer barra">
					<span class="desc"></span>
					<span class="closeButton" onClick="$('#notificationBar').hide();">
						<a title="Cerrar">X</a>
					</span>
				</div>
			</div>
			<div id="janelas"></div>
			<div id="onScreenHelp">Pantalla de Ayuda</div>		
			
		</form>
	</body>
</html>