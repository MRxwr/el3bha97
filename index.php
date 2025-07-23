<?php 
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");
$pageTitle = 'سين جيم - لعبة الأسئلة التفاعلية';
$pageTitle = 'سين جيم - اللعب';
include 'theme/theme1/header.php';
// get viewed page from pages folder \\
if( isset($_GET["v"]) && searchFile("views","blade{$_GET["v"]}.php") ){
	require_once("views/".searchFile("views","blade{$_GET["v"]}.php"));
}else{
	require_once("views/".searchFile("views","bladeHome.php"));
}
include 'theme/theme1/footer.php';
?>