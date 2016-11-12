<? 
/* .....................................................
	ARCHIVO FUENTE : Consulta perfiles y listas (ESMEN)
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-10-16
	Hour     : 
  ...................................................... */

/* -------------------------------------
	Inicializa las screen vars
----------------------------------------*/
function fncInivars(){
	global $VSPerfil,$VSTransmit,$VSString;
	$VSTransmit		=	CLEANNUM;
	$VSString		=	CLEANCHAR;
}

/* ------------------------------------
	Valida valores
----------------------------------------*/
function fncValFields(){
	global $VSUsuario,$VSPerfil;

	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSUsuario=="" or $VSUsuario==" "){
		fncAjaxPostMessage("Usuario no conectado",25);
		return 0;
	}
	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSPerfil=="" or $VSPerfil==CLEANNUM){
		fncAjaxPostMessage("Usuario no conectado (Pfl)",25);
		return 0;
	}
}

// -------------------
// Inicio del programa
// -------------------

	// Seteo de variables locales
	// --------------------------
	$varLista	=	0;
	$varTrx		=	0;
	
	// Accion a ejecutarse
	// -------------------
	switch($VSAction){
		
		// Buscar
		// ------
		case BUSCAR:

			// Inicializa variables de pantalla
			// --------------------------------
			fncInivars();

			// Verifica existencia del perfil
			// ------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESPER,$vsPerfil);
			if($ESTADO != ERRORS){

				// Obtiene todas las listas asociadas al perfil
				// --------------------------------------------
				$OBJDB->ReadDb(T_GET_FIFTY,$IND_ESRPL,$vsPerfil,FROM,$varLista);
				if($ESTADO != FAIL){

					$VSString	=	$VSString."{".DQUO."LISTAS".DQUO.":[";
					// Setea los valores
					// -----------------
					for($Cont=1;$Cont<=MIDROW;$Cont++){
						
						if($RSDD_ESRPL){ 
							$OBJDB->GetData($Cont,$ESRPL);

							$OBJDB->ReadDb(T_GET_ONE,$IND_ESLTS,$esrpl_IDLISTA);
							if($ESTADO != ERRORS){
								if ($Cont>1) {
									$VSString	=	$VSString.COMA;
								}

								$VSString	=	$VSString."{".DQUO."LISTA".DQUO.":[{".DQUO."ID".DQUO.":".DQUO.$eslts_IDLISTA.DQUO.",".DQUO."DESC".DQUO.":".DQUO.$eslts_DESCRIPCION.DQUO."}";

								$OBJDB->ReadDb(T_GET_FIFTY,$IND_ESRLT,$eslts_IDLISTA,FROM,$varTrx);
								if($ESTADO != FAIL){
									
									$VSString	=	$VSString.",{".DQUO."TRXS".DQUO.":[";
					
									// Setea los valores
									// -----------------
									for($ContTRX=1;$ContTRX<=MIDROW;$ContTRX++){
										if($RSDD_ESRLT){ 
											$OBJDB->GetData($ContTRX,$ESRLT);
											$OBJDB->ReadDb(T_GET_ONE,$IND_ESTRX,$esrlt_IDTRX);
											if($ESTADO != ERRORS){
												if ($ContTRX>1) {
													$VSString	=	$VSString.COMA;
												}

												$VSString	=	$VSString."{".DQUO."IDTRX".DQUO.":".DQUO.$estrx_IDTRX.DQUO.COMA.DQUO."NOMBRE".DQUO.":".DQUO.$estrx_NOMBRE.DQUO."}";
											}
										}
										else
											break;
									}

									$VSString	=	$VSString."]}]";
								}
								else
									break;

								$VSString	=	$VSString."}";
							}
							else
								break;
						}
						else
							break;
					}
					$VSString	=	$VSString."]}";
				}
				else{
					fncRDAjaxJsonResponse($VAR_ESMEN,BOTH,ERR,"No existe acceso para este usuario (RLP)");
					return 0;
				}
			}
			else{
					fncRDAjaxJsonResponse($VAR_ESMEN,BOTH,ERR,"No existe acceso para este usuario (PRF)");
					return 0;
				}

			//$VSString="HOLA MUNDO";
			fncRDAjaxJsonResponse($VAR_ESMEN,LBL,OK,"Transaccion exitosa.");
			return 0;
		break;

		// Eliminar
		// --------
		case ELIMINAR:
			$OBJDB->ReadDb(T_GET_ONE,$IND_PSUSR,$VSUsuario);
			if($ESTADO == ERRORS){
				fncAjaxPostMessage("Usuario no existe",22);
				return 0;
			}

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
			fncAjaxPostMessage(" Registro eliminado con exito.",0);
			return 0;
		break;

		default:
			fncAjaxPostMessage(" Ha seleccionado una accion invalida",3);
			return 0;
			break;
	}
	
	return 0;
?>