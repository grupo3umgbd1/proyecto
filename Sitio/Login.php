<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>¡Bienvenido a Electronic Store!</title>
        <link type="text/css" rel="StyleSheet" href="Style/msgBoxLight.css"  >
        <link type="text/css" rel="StyleSheet" href="Style/css/Login.css"  >
        <link rel="icon" href="img/favicon.png"/>
        <script type="text/javascript" src="../Controllers/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../Controllers/js/jquery.msgBox.js"></script>
        <script type="text/javascript" src="../Controllers/js/fncSubmit.js"></script>
        <script type="text/javascript" src="../Controllers/js/DocumentReady.js"></script>
        <script type="text/javascript" src="../Controllers/js/SysFunction.js"></script>
        <script type="text/javascript" src="../Controllers/js/jssor/jssor.js"></script>
        <script type="text/javascript" src="../Controllers/js/jssor/jssor.slider.js"></script>
        <script type="text/javascript" src="../Controllers/js/Login.js"></script>
</head>
<body topmargin="10" leftmargin="10">
    <form name="ESForm" id="ESForm" method="post">
        <input type="hidden" maxlength="5"  name="vsPage"   id="vsPage"   value="LOGIN">
        <input type="hidden" maxlength="2"  name="vsAction" id="vsAction" value="<?echo $_GET["vsAction"];?>">

        <header>
            <div style="background-color:#0072c6;height:50px;margin-top:5px;width:96%;margin-left:2%">
                <div style="float:left;margin-top:-5px;">
                    <label style="font-size:45px;color:#fff;margin-right:10px;">+</label>
                    <label style="font-size:19px;font-weight:bold;color:#fff;margin-left:-21px;margin-right:10px;">S</label>
                </div>
                <div style="float:left;margin-top:15px;">
                    <label style="font-size:15px;color:#fff;margin-right:10px;">Electronic Store</label>
                </div>
                <nav>
                    <div style="float:right;border-right:2px solid #cccccc;margin-top:15px;margin-right:10px;">
                        <a href="javascript:void(0);" class="AnchorLnk">Afiliados</a>
                    </div>
                    <div style="float:right;border-right:2px solid #cccccc;border-left:2px solid #cccccc;margin-top:15px;margin-right:10px;">
                        <a href="javascript:void(0);" class="AnchorLnk">Contactanos</a>
                    </div>
                </nav>
                <br><br>
            </div>
        </header>
            
        <main class="PrContainer">
            <div id="slider2_container">
                <!-- Slides Container -->
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
                    overflow: hidden;">
                    <div><img u="image" src="img/landscape/01.jpg" />
                        <div u="caption" t="CLIP|L" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:25px;color:#fff;line-height:40px;">Electronic Store</div>
                        <div u="caption" t="CLIP|L" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:25px;color:#fff;line-height:40px;">Es</div>
                        <div u="caption" t="CLIP|L" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:28px;color:#fff;line-height:40px;">Tabletas!</div>
                    </div>
                    <div><img u="image" src="img/landscape/02.jpg" />
                        <div u="caption" t="ZMF|10" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">Electronic Store</div>
                        <div u="caption" t="ZMF|10" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Es</div>
                        <div u="caption" t="ZMF|10" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">Celulares!</div>
                    </div>
                    <div><img u="image" src="img/landscape/03.jpg" />
                        <div u="caption" t="RTT|10" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:25px;color:#fff;line-height:40px;">Electronic Store</div>
                        <div u="caption" t="RTT|10" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:25px;color:#fff;line-height:40px;">Es</div>
                        <div u="caption" t="RTT|10" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:25px;color:#fff;line-height:40px;">Computadoras!</div>
                    </div>
                    <div><img u="image" src="img/landscape/04.jpg" />
                        <div u="caption" t="FLTTR|R" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:22px;color:#fff;line-height:40px;">Electronic Store</div>
                        <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:22px;color:#fff;line-height:40px;">Es</div>
                        <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:28px;color:#fff;line-height:40px;">TV HD!</div>
                    </div>
                </div>
            
            </div>
            <div id="clearFixDiv">
                <table align="left" cellpadding='0' cellspacing='1' id="contenido">
                    <tr>
                        <td class="TDTitle" width="655" colspan="3">
                            <p align="center">Inicio de sesion Electronic Store</p>
                        </td>
                    </tr>
                    <tr><td width="237">&nbsp;</td></tr>
                    <tr>
                        <td  width="237">
                            <input class="text" id="vsUserID" name="vsUserID"  maxlength="10"  size="20" value='<? echo $_GET["vpUserID"];?>' placeholder="Ingrese usuario" autofocus />
                        </td>
                    </tr>
                    <tr>
                        <td  width="237"><br>
                            <input class="text" type="Password" id="vsPassword" name="vsPassword" maxlength="10"  size="20" value='<? echo $_GET["vpPassword"];?>' placeholder="Ingrese clave" />                    
                        </td>
                    </tr>
                    <tr>
                        <td  width="237">
                            <div><br>
                                <input class="Btn" type ="button" class="b02" id="BtnB" onclick="fncSubmit(2);" value="Iniciar sesion" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="237">
                            <p align="Left" style="margin-left:5px;">
                                <a href="javascript:confirm('Recuperar clave');" class="AnchorLnkCl">
                                    ¿No puedes acceder a tu cuenta ?
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </div> 
        </main>
        <footer>
            <div>
                <a href="http://www.facebook.com/ElectronicStore">
                    <img src="img/faceicon.png" style="width:25px;height:25px;" title="Siguenos en Facebook">
                </a>
            </div>
            <div style="margin-left:1%;">
                <a href="http://www.Twitter.com/@ElectronicStore">
                    <img src="img/TweeterIcon.png" style="width:30px;height:30px;" title="Siguenos en Facebook">
                </a>
            </div>
            <div style="margin-left:30%;">
                <label>Powered by UMG Students  all right reserved Guatemala, San Jose Pinula 2016</label>
            </div>
        </footer>
    </form>
</body>
</html>