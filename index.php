<?php 
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");

// get viewed page from pages folder \\
if( isset($_GET["v"]) && searchFile("views","blade{$_GET["v"]}.php") ){
	require_once("views/".searchFile("views","blade{$_GET["v"]}.php"));
}else{
	require_once("views/".searchFile("views","blade{$_GET["v"]}.php"));
}
?>