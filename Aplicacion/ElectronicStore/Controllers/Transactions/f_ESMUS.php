<? 
/* .....................................................
	ARCHIVO FUENTE : Mantenimiento de usuarios ESMUS
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 19-10-16
	Hour     : 
  ...................................................... */

//	Declaracion de include global y fuente de cabecera
//	--------------------------------------------------

/* -------------------------------------
	Inicializa las screen vars
----------------------------------------*/
function fncInivars(){
	global $VSPais,$VSSucursal,$VSJornada,$VSUsuario,$VSRol,$VSId_persona,$OBJDB;
	$VSPais			=	CLEANNUM;
	$VSSucursal		=	CLEANCHAR;
	$VSJornada		=	CLEANCHAR;
	$VSUsuario		=	CLEANCHAR;
	$VSId_persona	=	CLEANCHAR;
	$VSRol			=	CLEANNUM;
}

/* ------------------------------------
	Valida valores
----------------------------------------*/
function fncValFields(){
	global $VSPais,$VSSucursal,$VSJornada,$VSUsuario,$VSRol,$VSId_persona,$OBJDB;

	// Valida que se ingrese informacion en el campo Opcion
	// ----------------------------------------------------
	$OBJDB->RDDebugger("ESMUS","PAIS:".$VSPais);
	if($VSPais==ZERO){
		fncAjaxPostMessage("Debe Seleccionar pais",24);
		return 0;
	}
	
	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSSucursal=="" or $VSSucursal==" "){
		fncAjaxPostMessage("Debe ingresar Sucursal",25);
		return 0;
	}

	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSJornada=="" or $VSJornada==" "){
		fncAjaxPostMessage("Debe ingresar Jornada",25);
		return 0;
	}
	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSUsuario=="" or $VSUsuario==" "){
		fncAjaxPostMessage("Debe ingresar Usuario",25);
		return 0;
	}
	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSId_persona=="" or $VSId_persona==CLEANNUM){
		fncAjaxPostMessage("Debe seleccionar persona",25);
		return 0;
	}

	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSRol=="" or $VSRol==CLEANNUM){
		fncAjaxPostMessage("Debe seleccionar rol",25);
		return 0;
	}
}

// -------------------
// Inicio del programa
// -------------------
	$VSStrPersona	= array("vsId_persona");
	$OBJDB->RDInitComboBox();


	// Seteo de variables locales
	// --------------------------
	$VSId_persona=1;
	
	// Accion a ejecutarse
	// -------------------
	switch($VSAction){
		// Grabar
		// ------
		case GRABAR:
			
			// Valida los valores previo a grabar
			// ----------------------------------
			fncValFields();

			// Valida que se ingrese informacion en el campo categoria
			// -------------------------------------------------------
			if($VSRol=="" or $VSRol==" " or $VSRol=="0"){
				fncAjaxPostMessage("Debe ingresar categoria",25);
				return 0;
			}
			
			// Verifica existencia del registro
			// --------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESUSR,$VSUsuario);

			// Inserta el registro en la DB
			// ------------------------------------	
			if($ESTADO == ERRORS){
				$OBJDB->ClsDB($ESUSR);
					$esusr_IDSUCURSAL		=	$VSSucursal;
					$esusr_IDJORNADA		=	$VSJornada;
					$esusr_IDUSUARIO		=	2;
					$esusr_USUARIO			=	$VSUsuario;
					$esusr_CLAVE			=	$OBJSC->RDCrypToDb($VSUsuario,$VSUsuario);
					$esusr_IDROL			=	$VSRol;
					$esusr_IDPERSONA		=	$VSId_persona;
					$esusr_SESION			=	$VSSesion = "***";
					$esusr_EDOCONEXION		=	$VSEdo_conexion = "***";
					fnDateFormat(fncRDGetDate('DD/MM/CCYY'),'DD/MM/CCYY',$esusr_FECHACREACION,'DAYNUMERIC');
					$esusr_FECHAMOD 		=	CLEANNUM;
					$esusr_FECHAULTINGRESO	=	CLEANNUM;
					$esusr_HORAULTINGRESO	=	CLEANNUM;
					$esusr_ESTATUS			=	ACTIVO;
				$OBJDB->InsertDB($ESUSR);
				
				// Inicializa las screen vars
				// --------------------------
				fncInivars();

				fncAjaxPostMessage(13,0);
			}
			else
				fncAjaxPostMessage(11,3);
				return 0;
			break;

		// Buscar
		// ------
		case BUSCAR:

			// Verifica existencia del registro
			// --------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESUSR,$VSUsuario);
			if($ESTADO == ERRORS){
				fncInivars();
				fncAjaxPostMessage("Usuario no existe",22);
				//fncSetResponseVars($jj);
				//fncSetResponseVarsAjax(0);
				return 0;
			}

			// Seteo de variables de programa
			// ------------------------------
			$VSPais				=	"1";
			$VSSucursal			=	$esusr_IDSUCURSAL;
			$VSJornada			=	$esusr_IDJORNADA;
			$VSUsuario			=	$esusr_USUARIO;
			$VSRol				=	$esusr_IDROL;
			$VSId_persona		=	$esusr_IDPERSONA;
			$VSFecha_creacion	=	$esusr_FECHACREACION;
			
			// Setea mensaje de respuesta en pantalla
			// --------------------------------------
			//fncAjaxPostMessage("Usuario encontrado con exito",0);
			//fncSetResponseVars($jj);
			//fncSetResponseVarsAjax(0);
			fncRDAjaxJsonResponse($VAR_ESMUS,LBL,OK,"Operacion exitosa.");
			return 0;
		break;

		// Eliminar
		// --------
		case ELIMINAR:
			$OBJDB->ReadDb(T_GET_ONE,$IND_PSUSR,$VSUsuario);
			if($ESTADO == ERRORS){
				//fncPostMessage(2,22);
				fncAjaxPostMessage("Usuario no existe",22);
				return 0;
			}

			// Seteo de variables de programa
			// ------------------------------


			// Eliminacion logica del registro header
			// --------------------------------------
			$OBJDB->ClsDB($PSUSR);
				$psusr_Estatus	=	NULO;
			$OBJDB->UpdateDB($PSUSR);

			// Inicializa las screen vars
			// --------------------------
			fncInivars();

			// Setea mensaje de respuesta en pantalla
			// --------------------------------------
			//fncPostMessage(1,19);
			fncAjaxPostMessage(" Registro eliminado con exito.",0);

			return 0;
		break;

		case 8:
			//$OBJDB->RDDebugger("ESMUS","LLEGO:".$VSAction.JUMPDOWN);
			$IdPersona=0;
			$OBJDB->ReadDb(T_GET_FIFTY,$IND_ESMPR,FROM,$IdPersona);
			if($ESTADO != FAIL){
				for($ContTRX=1;$ContTRX<=MIDROW;$ContTRX++){
					if($RSDD_ESMPR){ 
						$OBJDB->GetData($ContTRX,$ESMPR);
						$NombrePersona	=	$esmpr_PRIMERNOMBRE." ".$esmpr_SEGUNDONOMBRE." ".$esmpr_PRIMERAPELLIDO." ".$esmpr_SEGUNDOAPELLIDO;
						$VSStrPersona[$ContTRX]	=	$OBJDB->fnRDAddOption($esmpr_IDPERSONA,$NombrePersona);
					}
					else
						break;
				}
				// Guarda las opciones a setear en el combo box grado
				// --------------------------------------------------
				$OBJDB->fnRDPutComboOptions($VSStrPersona);

				// Setea mensaje de respuesta en pantalla
				// --------------------------------------
				fncRDAjaxJsonResponse($VAR_ESMUS,LBL,OK,"Operacion exitosa.");
			}
			else
				fncRDAjaxJsonResponse($VAR_ESMUS,BOTH,ERR,"No existen personas.");


			break;

		default:
			fncAjaxPostMessage(" Ha seleccionado una accion invalida",3);
			return 0;
			break;
	}

	//fncPostMessage(0,$varErr);
	return 0;


?>