<? 
/* .....................................................
	ARCHIVO FUENTE : Mantenimiento de usuarios Portal
	Powered  : In RunDevelopment Maker.
	Developer: Jhonnatan Brichaux.
	Date     : 16-03-14
	Hour     : 
  ...................................................... */

//	Declaracion de include global y fuente de cabecera
//	--------------------------------------------------
//include(TrxHeaders."fc_Portal.html");

	//	Declaracion variables locales de programa
	//	-----------------------------------------

// -------------------
// Inicio del programa
// -------------------

	// Seteo de variables locales
	// --------------------------
		
	// Valida que se ingrese informacion en el campo Usuario
	// -----------------------------------------------------
	if($VSUsuario=="" or $VSUsuario==" "){
		fncAjaxPostMessage("Conexion Invalida",24);
		return 0;
	}
	
	// Valida que se ingrese informacion en el campo Sesion
	// ----------------------------------------------------
	if($VSSesion=="" or $VSSesion==" "){
		fncAjaxPostMessage("Conexion Invalida",24);
		return 0;
	}

	// Accion a ejecutarse
	// -------------------
	switch($VSAction){
		// Buscar
		// ------
		case BUSCAR:

			// Verifica existencia del registro
			// --------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESUSR,$VSUsuario);
			if($ESTADO == ERRORS){
				fncAjaxPostMessage("Usuario no existe",22);
				return 0;
			}

			// Valida sesion del usuario conectado
			// -----------------------------------
			if($VSSesion!=$esusr_SESION){
				fncAjaxPostMessage("Sesion Invalida",23);
				//fncAjaxPostMessage($VSUsuario."***".$VSSesion."---".$psusr_Sesion,23);
				return 0;
			}

			// Verifica existencia de categoria
			// --------------------------------
			$OBJDB->ReadDb(T_GET_ONE,$IND_ESROL,$esusr_IDROL);
			if($ESTADO == ERRORS){
				fncAjaxPostMessage("Rol no existe",24);
				return 0;
			}
			
			$varPerfil	=	ZERO;
			$OBJDB->ReadDb(T_GET_FIFTY,$IND_ESRRP,$esusr_IDROL,FROM,$varPerfil);
			if($ESTADO == FAIL){
				fncRDAjaxJsonResponse($VAR_PSRSG,BOTH,ERR,"No existe acceso para este usuario");
				return 0;
			}
			$varMgs	=	"";
			// Setea los valores
			// -----------------
			for($Cont=1;$Cont<=MIDROW;$Cont++){
				
				if($RSDD_ESRRP){ 
					//$OBJDB->JumpROW($Cont);
					$OBJDB->GetData($Cont,$ESRRP);

					$OBJDB->ReadDb(T_GET_ONE,$IND_ESPER,$esrrp_IDPERFIL);
					if($ESTADO != ERRORS){

						$varMgs	=	$varMgs."ESMEN.php?vsUsuario=".$VSUsuario."&vsPerfil=".$esrrp_IDPERFIL."&vsTransmit=1|";
						$varMgs	=	$varMgs.$esper_DESCRIPCION.".ico|";
						$varMgs	=	$varMgs.$esper_DESCRIPCION."|";
					}
				}
				else
					break;
			}
			
			

			// Administrador sistema
			// ---------------------
			/*
				$varMgs	=	"";
			if($esusr_IDROL==1){

				$varMgs	=	$varMgs."ESMUS.php|";
				$varMgs	=	$varMgs."Login_Manager.ico|";
				$varMgs	=	$varMgs."Personas|";

				$varMgs	=	$varMgs."ESMUS.php|";
				$varMgs	=	$varMgs."usuarios.ico|";
				$varMgs	=	$varMgs."Usuarios|";

				$varMgs	=	$varMgs."ESMUS.php|";
				$varMgs	=	$varMgs."reports.ico|";
				$varMgs	=	$varMgs."Reportes|";

				$varMgs	=	$varMgs."Descktop2.php|";
				$varMgs	=	$varMgs."mime_colorset.ico|";
				$varMgs	=	$varMgs."Graficas|";
			}

			// Administrador colegio
			// ---------------------
			if($esusr_IDROL==2){
				$varMgs	=	$varMgs."DeskAdmin1.php|";
				$varMgs	=	$varMgs."Institucion.png|";
				$varMgs	=	$varMgs."Institucion|";

				$varMgs	=	$varMgs."DeskAdmin2.php|";
				$varMgs	=	$varMgs."docentes.png|";
				$varMgs	=	$varMgs."Docentes|";

				$varMgs	=	$varMgs."DeskAdmin3.php|";
				$varMgs	=	$varMgs."icono_aulas.png|";
				$varMgs	=	$varMgs."Alumnos|";

				$varMgs	=	$varMgs."DeskAdmin4.php|";
				$varMgs	=	$varMgs."mylinspire.png|";
				$varMgs	=	$varMgs."Academico|";

				$varMgs	=	$varMgs."Desktop6.php|";
				$varMgs	=	$varMgs."mylinspire.png|";
				$varMgs	=	$varMgs."Economico|";
			}

			// Estudiante
			// ----------
			if($esusr_IDROL==3){
				$varMgs	=	$varMgs."Descktop4.php|";
				$varMgs	=	$varMgs."mylinspire.png|";
				$varMgs	=	$varMgs."Portafolio|";
			}

			// Profesor
			// --------
			if($esusr_IDROL==4){
				$varMgs	=	$varMgs."Descktop4.php|";
				$varMgs	=	$varMgs."mylinspire.png|";
				$varMgs	=	$varMgs."Portafolio|";	
			}

			// Apoderado
			// ---------
			if($esusr_IDROL==5){}

			*/		

			// Setea mensaje de respuesta en pantalla
			// --------------------------------------
			//fncAjaxPostMessage("Usuario encontrado con exito",0);
			//fncSetResponseVars($jj);
			fncSetResponseVarsAjax($varMgs);
			return 0;
		break;

		// Eliminar
		// --------
		case ELIMINAR:
			$OBJDB->ReadDb(T_GET_ONE,$IND_PSCTU,$VSId);
			if($ESTADO == ERRORS){
				//fncPostMessage(2,22);
				fncAjaxPostMessage("categoria no existe",22);
				return 0;
			}

			// Seteo de variables de programa
			// ------------------------------


			// Eliminacion logica del registro header
			// --------------------------------------
			$OBJDB->ClsDB($PSCTU);
				$psctu_Estatus	=	NULO;
			$OBJDB->UpdateDB($PSCTU);

			// Setea mensaje de respuesta en pantalla
			// --------------------------------------
			//fncPostMessage(1,19);
			fncAjaxPostMessage(" Registro eliminado con exito.",0);

			return 0;
		break;

		default:
			fncAjaxPostMessage(" Ha seleccionado una accion invalida",3);
			return 0;
			break;
	}

	//fncPostMessage(0,$varErr);
	return 0;


?>