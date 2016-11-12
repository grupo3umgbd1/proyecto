<? 
/* .....................................................
	ARCHIVO FUENTE : Login de usuarios LOGIN
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 19-10-16
	Hour     : 
  ...................................................... */

	//	Declaracion variables locales de programa
	//	-----------------------------------------


// -------------------
// Inicio del programa
// -------------------

	// Accion a ejecutarse
	// -------------------
	switch($VSAction){

		// Buscar
		// ------
		case BUSCAR:
			
			// Valida que el usuairo no venga vacio
			// ------------------------------------
			if($VSUserID=="" or $VSUserID==" "){
				fncRDAjaxJsonResponse($VAR_LOGIN,SCR,ERR,"Debe ingresar usuario");
				return 0;
			}
			
			// Valida que el Password no venga vacio
			// -------------------------------------
			if($VSPassword=="" or $VSPassword==" "){
				fncRDAjaxJsonResponse($VAR_LOGIN,SCR,4,"Debe ingresar clave de acceso");
				return 0;
			}
			
			// Verifica existencia del registro
			// --------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESUSR,$VSUserID);
			if($ESTADO == ERRORS){
				fncRDAjaxJsonResponse($VAR_LOGIN,SCR,9,"Usuario no existe");
				return 0;
			}

			// Valida la clave
			// ---------------
			if($OBJSC->RDCrypToCmp($VSUserID,$VSPassword,$esusr_CLAVE)){
				// Actualizar tabla con historial password invalidos e inhabilitar el usuario si llego a su limite 
				// De fallos permitidos
				$VSPassword	=	CLEANCHAR;
				fncRDAjaxJsonResponse($VAR_LOGIN,SCR,8,"Clave invalida");
				return 0;
			}

			// Setea sesion del usuario conectado
			// ----------------------------------
			$SESION	=	date("d-m-y");
			$Times	=	time()-86400;
			$Time	=	date ( "h:i:s" , $Times ); 
			$SESION	=	$SESION.$Time;
			$RDS_SUCURSAL		=	$esusr_IDSUCURSAL;
			$RDS_JORNADA		=	$esusr_IDJORNADA;
			$RDS_USER			=	$VSUserID;
			$RDS_CACHESTORAGE	=	CLEANCHAR;

			// Graba la sesion del usuario conectado
			// --------------------------------------
			$OBJDB->ClsDB($ESUSR);
				$esusr_SESION	=	str_replace("#","N",$OBJSC->RDCrypToDb($VSUserID,$SESION));
				$esusr_SESION	=	str_replace("&","Y",$esusr_SESION);
				$esusr_SESION	=	str_replace("%",".",$esusr_SESION);
			$OBJDB->UpdateDB($ESUSR);
			
			$RDS_SESSION		=	$esusr_SESION;
			
			$OBJDB->RDSession(PUT);

			// Definicion Arreglo de variables
			// -------------------------------
			$ArryVars	=	array(
					"0"=>"vsUsuario",
					"1"=>$VSUserID,
					"2"=>"vsSesion",
					"3"=>$RDS_SESSION
			);
			
			
			// Ingreso con exito al portal
			// ---------------------------
			fncSendTrxArry("Portal",$ArryVars);

			return 0;
		break;

		default:
			//fncAjaxPostMessage(9,28);
			fncRDAjaxJsonResponse($VAR_LOGIN,SCR,10,28);
			return 0;
			break;

	}

	fncRDAjaxJsonResponse($VAR_LOGIN,SCR,ERR,9);
	return 0;
?>