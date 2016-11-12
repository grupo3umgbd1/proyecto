<? 
/* ......................................................
	ARCHIVO DE CABECERA : Mantenimiento de usuarios ESMUS
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-10-16
	Hour     : 
  ....................................................... */

	// Declaracion de variables de pantalla request
	// --------------------------------------------
  	global $VSAction,$VSPais,$VSSucursal,$VSJornada,$VSUsuario,$VSRol,$VSId_persona;

	// Arreglo con los tag de las variables y nombre de la Trx
	// -------------------------------------------------------
	$TAG_ESMUS	=	array(
				"0"=>"ESMUS",
				"1"=>"vsAction",
				"2"=>"vsPais",
				"3"=>"vsSucursal",
				"4"=>"vsJornada",
				"5"=>"vsUsuario",
				"6"=>"vsRol",
				"7"=>"vsId_persona"
	);

	// Arreglo con las variables y tag de la Trx
	// -----------------------------------------
	$VAR_ESMUS	=	array(
				"0"=>$TAG_ESMUS,
				"1"=>$esmus1="VSAction",
				"2"=>$esmus2="VSPais",
				"3"=>$esmus3="VSSucursal",
				"4"=>$esmus4="VSJornada",
				"5"=>$esmus5="VSUsuario",
				"6"=>$esmus6="VSRol",
				"7"=>$esmus7="VSId_persona"
	);
?>