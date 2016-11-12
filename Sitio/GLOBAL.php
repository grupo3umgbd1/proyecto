<?
date_default_timezone_set('America/Guatemala');		// Define la zona horaria.
include("Proyect.php");								// Definicion del path del core y nombre del proyecto.
include(DRIVE.PATHPK."ConstSys.php");				// Constantes globales del sistema.
include(Package."RunDeveloper.php");				// Core Run Development.
include(Package."FunctionSys.php");					// Funciones privadas del sistema.
include(Package."TableConst.php");					// Constantes globales para el manejo de la DB del proyecto.
include(Headers."MODELS.php");						// Definicion de los modelos de la base de datos.
include(Headers."GlobalMsg.php");					// Definicion de los mensajes del proyecto.
include(Headers."SESSION.php");					    // Definicion de las variables de session.
$OBJDB = new AccessDB($DataBase);					// Instancia del objeto para interactuar con la DB del proyecto.
$OBJSC = new RDSecurity($DataBase);					// Instancia del objeto para interactuar con la seguridad.
?>