<html>
	<head>
		<link rel="StyleSheet" href="Style/msgBoxLight.css"  type="text/css">
		<!--<script src="jquery-1.4.3.js"></script>-->
		<script type="text/javascript" src="../Controllers/js/jquery-1.7.2.min.js"></script>
		 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="jquery.ui.core.js"></script>
		<script src="jquery.ui.widget.js"></script>
		<script src="jquery.ui.mouse.js"></script>
		<script src="jquery.ui.draggable.js"></script>
		<script src="../Controllers/js/modernizr.custom.js"></script>
		<script src="../Controllers/js/jquery.msgBox.js" type="text/javascript"></script>
		<script src="../Controllers/js/fncSubmit.js" type="text/javascript"></script>
		<script src="../Controllers/js/Xwalk_Ajax_Transmit.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="style/css/component.css" />
		<style>
			#draggable { width: 150px; height: 150px; padding: 0.5em; }
		</style>
		<script>
		$(function() {
			$( "#draggable" ).draggable();
			$( "#draggable2" ).draggable();
			$( "#draggable3" ).draggable();
			$( "#draggable4" ).draggable();
			$( "#draggable5" ).draggable();
			$( "#draggable6" ).draggable();
			$( "#draggable7" ).draggable();
			$( "#draggable8" ).draggable();
			$( "#draggable9" ).draggable();
			$( "#draggable10" ).draggable();
			$( "#draggable11" ).draggable();
			$( "#draggable12" ).draggable();
			$( "#draggable13" ).draggable();
			$( "#draggable14" ).draggable();
			$( "#draggable15" ).draggable();
		});
		
		$(document).ready(function(){
			if($("#vsTransmit").val()==1){
				$("#VD").css("display","none");
				// Inserta layer transparente que bloqueara la pantalla
				// ----------------------------------------------------
				top.$("body").append("<div id='BlockScr' style='display: none;'><img style='position: absolute;left:47%;top: 30%;' src='img/loading.gif'></div>");
					
				 //$( "#effect" ).show( selectedEffect, options, 500, callback );

				// Setea propiedades y estilos a layer
				// -----------------------------------
				top.$("#BlockScr").css({"display":"block","width":"100%", "height":"100%","background":"rgba(0,0,0,0.67)","opacity":"0.67","position":"absolute","top":"0","left":"0","z-index":"10000"});

				fncSubmit(2);
				
				// Arma menus
				// ----------
				trm = setInterval(function(){
					if ($("#vsString").val()!="") {
						var StrGet	=	$("#vsString").val();
						var ArryResponse	=	$.parseJSON(StrGet);
						var OBJJSON	=	ArryResponse.LISTAS;

						// Setea en los campos de la pagina los valores recibidos de RD
						// ------------------------------------------------------------
						var Counter=0;
						var Contador=1;
						for(var val in OBJJSON){
							$("#Img"+Contador).attr("src","img/"+Contador+".ico");
							$("#Lbl"+Contador).text(OBJJSON[Counter].LISTA[0].DESC);
							Counter++;
							Contador++;
						}
						$("#menu").css("display","block");
						top.$("#BlockScr").remove();
						clearInterval(trm);
					}	
				},500);
			}
		});
	</script>
	</head>
	<body >
		<form name="ESForm" id="ESForm" method="post">
			<input type="hidden" class="text" id="vsUsuario" name="vsUsuario" maxlength="15"  size="15" value='<?echo $_GET["vsUsuario"];?>' />
			<input type="hidden" class="text" id="vsPerfil" name="vsPerfil" maxlength="3"  size="3" value='<?echo $_GET["vsPerfil"];?>' />
			<input type="hidden" class="text" id="vsTransmit" name="vsTransmit" maxlength="1"  size="1" value='<?echo $_GET["vsTransmit"];?>' />
			<input type="hidden" class="text" id="vsString" name="vsString" maxlength="1000"  size="1000" value='<? echo $_POST["vsColegio"];?>' />
			<input type="hidden" maxlength="2"  name="vsAction" id="vsAction" value="<?echo $_GET["vsAction"];?>">
			<input type="hidden" maxlength="5"  name="vsPage"   id="vsPage"   value="ESMEN">
	        <div id="VD" style="width: 100%;margin-right: 70px;">
		        <video autoplay  muted class="fullscreen-bg__video" id="myVideo">
		            <source src="video/Futuro.mp4" type="video/mp4">
		            <source src="video/Futuro.ogv" type="video/ogg">
		            <source src="video/Futuro.webm" type="video/webm">
		        </video>
		    </div>
		<div style="margin-top:35px;" class="main clearfix">
				<nav id="menu" class="nav" style="display: none;">
					<ul>
						
						<li id="draggable7">
							<a href="DesckUsuarios.php"  >
								<img  id="Img1" style="width: 150px;height: 150px;" src="">
								<span id="Lbl1"></span>
							</a>
						</li>
						<li id="draggable2">
							<a href="#" onclick="ChangePassWord();" >
								<img  id="Img2" style="width: 150px;height: 150px;" src="">
								<span id="Lbl2"></span>
							</a>
						</li>
						<li id="draggable3">
							<a href="#" onclick="ChangePassWord();" >
								<img  id="Img3" style="width: 150px;height: 150px;" src="">
								<span id="Lbl3"></span>
							</a>
						</li>
						<li id="draggable6">
							<a href="#" onclick="ChangePassWord();" >
								<img  id="Img4" style="width: 150px;height: 150px;" src="">
								<span id="Lbl4"></span>
							</a>
						</li>
						<li id="draggable4">
							<a href="#" onclick="ChangePassWord();" >
								<img  id="Img5" style="width: 150px;height: 150px;" src="">
								<span id="Lbl5"></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div><!-- /container -->
		<!--
		<div id="Father">
			<div id="draggable" title="Make tables" style="width:auto;height:auto; cursor:move;">
				<a href="RMTBL.php" target="Body"><img src="img/descarga.jpg"></a>
			</div>
			<div id="draggable2" title="Make transactions" style="width:auto;height:auto; cursor:move;">
				<a href="RMTRN.php" target="Body"><img src="img/8.jpg"></a>
			</div>
			<div id="draggable3" title="Make Reports" style="width:auto;height:auto; cursor:move;">
				<a href="RMTRN.php" target="Body"><img src="img/report.png"></a>
			</div>
		</div>
		-->
		</form>
	</body>
</html>