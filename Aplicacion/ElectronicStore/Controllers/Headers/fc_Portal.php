<? 
/* .....................................................
	ARCHIVO DE CABECERA : Mantenimiento de usuarios PSMCA
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-03-14
	Hour     : 
  ...................................................... */

	// Declaracion de variables de pantalla request
	// --------------------------------------------
  	global $VSAction,$varSendStr,$varSendString,$VSUsuario,$VSSesion,$VSPerfil1,$VSPerfil2,$VSPerfil3,$VSPerfil4,$VSPerfil5,$VSPerfil6,$VSPerfil7,$VSPerfil8,$VSPerfil9,$VSPerfil10;

	// Arreglo con los tag de las variables y nombre de la Trx
	// -------------------------------------------------------
	$TAG_Portal	=	array(
				"0"=>"Portal",
				"1"=>"vsAction",
				"2"=>"vsUsuario",
				"3"=>"vsSesion",
				"4"=>"vsPerfil1",
				"5"=>"vsPerfil2",
				"6"=>"vsPerfil3",
				"7"=>"vsPerfil4",
				"8"=>"vsPerfil5",
				"9"=>"vsPerfil6",
				"10"=>"vsPerfil7",
				"11"=>"vsPerfil8",
				"12"=>"vsPerfil9",
				"13"=>"vsPerfil10"
	);

	// Arreglo con las variables y tag de la Trx
	// -----------------------------------------
	$VAR_Portal	=	array(
				"0"=>$TAG_Portal,
				"1"=>$vartrx1="VSAction",
				"2"=>$vartrx2="VSUsuario",
				"3"=>$vartrx3="VSSesion",
				"4"=>$vartrx4="VSPerfil1",
				"5"=>$vartrx5="VSPerfil2",
				"6"=>$vartrx6="VSPerfil3",
				"7"=>$vartrx7="VSPerfil4",
				"8"=>$vartrx8="VSPerfil5",
				"9"=>$vartrx9="VSPerfil6",
				"10"=>$vartrx10="VSPerfil7",
				"11"=>$vartrx11="VSPerfil8",
				"12"=>$vartrx12="VSPerfil9",
				"13"=>$vartrx13="VSPerfil10"
	);

// ------------------------------------------------
// Setea mensaje de respuesta en variables
// ------------------------------------------------
function fncSetResponseVars(&$jj){
	global $varSendStr,$varSendString, $VSUsuario, $VSSesion;

	$varSendStr		=	"|vsUsuario#".$VSUsuario."|vsSesion#".$VSSesion;
	$varSendString	=	$varSendString."";
}

// ------------------------------------------------
// Envia mensaje de respuesta Ajax
// ------------------------------------------------
function fncSetResponseVarsAjax($Msg){
	global $varSendStr,$varSendString;

	if($Msg==0)
		//echo	"*|Msg#Transaccion exitosa".$varSendStr.$varSendString."|";
		echo "0|".$Msg;
	else
		echo "0|".$Msg;
		//echo	"*|Msg#".$Msg.$varSendStr.$varSendString."|";
}

?>