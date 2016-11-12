<? 
/* ......................................................
	ARCHIVO DE CABECERA : Mantenimiento de usuarios ESMEN
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-10-16
	Hour     : 
  ....................................................... */

	// Declaracion de variables de pantalla request
	// --------------------------------------------
  	global $VSAction,$VSUsuario,$VSPerfil,$VSTransmit,$VSString;

	// Arreglo con los tag de las variables y nombre de la Trx
	// -------------------------------------------------------
	$TAG_ESMEN	=	array(
				"0"=>"ESMEN",
				"1"=>"vsAction",
				"2"=>"vsUsuario",
				"3"=>"vsPerfil",
				"4"=>"vsTransmit",
				"5"=>"vsString"
	);

	// Arreglo con las variables y tag de la Trx
	// -----------------------------------------
	$VAR_ESMEN	=	array(
				"0"=>$TAG_ESMEN,
				"1"=>$esmen1="VSAction",
				"2"=>$esmen2="VSUsuario",
				"3"=>$esmen3="VSPerfil",
				"4"=>$esmen4="VSTransmit",
				"5"=>$esmen5="VSString"
	);
?>