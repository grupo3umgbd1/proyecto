<? 
/* .....................................................
	ARCHIVO DE CABECERA : Mantenimiento de usuarios RMMUS
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-03-14
	Hour     : 
  ...................................................... */

	// Declaracion de variables de pantalla request
	// --------------------------------------------
	$VSAction;  $varSendStr; $varSendString;$VSPais;$VSColegio;$VSSucursal;$VSJornada;$VSUsuario;$VSId_categoria;

	// Seteo de variables de pantalla
	// -------------------------------
	$VSAction		=	$_GET["vsAction"];
	$VSPais			=	$_POST["vsPais"];
	$VSColegio		=	$_POST["vsColegio"];
	$VSSucursal		=	$_POST["vsSucursal"];
	$VSJornada		=	$_POST["vsJornada"];
	$VSUsuario		=	$_POST["vsUsuario"];
	$VSId_categoria	=	$_POST["vsId_categoria"];

// -------------------------------
// Seteo de variables de respuesta
// -------------------------------
// ------------------------------------------------
// Setea mensaje de respuesta Ajax
// ------------------------------------------------
/*
function fncSetResponseVarsAjax($jj){
	
	global 	$VSUsuario, 	$VSId_categoria; 
	
	echo	"*|Msg#Transaccion exitosa|vsUsuario#".$VSUsuario."|vsId_categoria#".$VSId_categoria."|";
}
*/

// ------------------------------------------------
// Setea mensaje de respuesta en variables
// ------------------------------------------------
function fncSetResponseVars(&$jj){
	global $varSendStr,$varSendString,$VSPais,$VSColegio,$VSSucursal,$VSJornada,$VSUsuario,$VSId_categoria;

	$varSendStr		=	"|vsPais#".$VSPais."|vsColegio#".$VSColegio."|vsSucursal#".$VSSucursal."|vsJornada#".$VSJornada."|vsUsuario#".$VSUsuario."|vsId_categoria#".$VSId_categoria;
	$varSendString	=	$varSendString."";
}

// ------------------------------------------------
// Envia mensaje de respuesta Ajax
// ------------------------------------------------
function fncSetResponseVarsAjax($Msg){
	global $varSendStr,$varSendString;

	if($Msg==0)
		echo	"*|Msg#Transaccion exitosa".$varSendStr.$varSendString."|";
	else
		echo	"*|Msg#".$Msg.$varSendStr.$varSendString."|";
}


/*
function fncSetResponseVars($jj){
 global 	$VSUsuario, 	$VSId_categoria; 

	print_r("<script language='javascript1.2'>");
	print_r(" psform1.vpUsuario".".value='$VSUsuario';");
	print_r(" psform1.vpId_categoria".".value='$VSId_categoria';");
	print_r(" </script> ");
}
*/

?>