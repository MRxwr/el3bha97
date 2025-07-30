<?php 
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");
$pageTitle = 'سين جيم - لعبة الأسئلة التفاعلية';
$pageTitle = 'سين جيم - اللعب';
$theme = "theme2";	
include "theme/{$theme}/header.php";
// get viewed page from pages folder \\
if( isset($_GET["v"]) && searchFile("views","blade{$_GET["v"]}.php") ){
	require_once("views/".searchFile("views","blade{$_GET["v"]}.php"));
}else{
	require_once("views/".searchFile("views","bladeHome.php"));
}
include "theme/{$theme}/footer.php";
?>