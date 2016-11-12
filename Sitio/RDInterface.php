<?
// Evita que guarde cache
// ----------------------
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//	Declaracion de include global y envio al host
//	---------------------------------------------
include("GLOBAL.php");
include(Package."RDCallBack.php");
?>