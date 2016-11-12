<? 
/* .....................................................
	ARCHIVO DE CABECERA : Login de usuarios LOGIN
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 05-08-13
	Hour     : 
  ...................................................... */

	// Declaracion de variables de pantalla request
	// --------------------------------------------
  	global $VSAction,$VSUserID,$VSPassword;

	// Arreglo con los tag de las variables y nombre de la Trx
	// -------------------------------------------------------
	$TAG_LOGIN	=	array(
				"0"=>"LOGIN",
				"1"=>"vsAction",
				"2"=>"vsUserID",
				"3"=>"vsPassword"
	);

	// Arreglo con las variables y tag de la Trx
	// -----------------------------------------
	$VAR_LOGIN	=	array(
				"0"=>$TAG_LOGIN,
				"1"=>$login1="VSAction",
				"2"=>$login2="VSUserID",
				"3"=>$login3="VSPassword"
	);
?>