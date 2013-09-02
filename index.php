<?php
	session_start();

	if(isset($_GET['URL_Pagina_1'])) {
		$URL_Pagina_1 = $_GET['URL_Pagina_1'];
	}
	else {
		$URL_Pagina_1 = NULL;
	}
	
	if(isset($_GET['URL_Pagina_2'])) {
		$URL_Pagina_2 = $_GET['URL_Pagina_2'];
	}
	else {
		$URL_Pagina_2 = NULL;
	}
	
	function __autoload($class_name) {
    	include $_SERVER['DOCUMENT_ROOT'].'/class/'.$class_name . '.php';
	}
	
	switch($URL_Pagina_1) {
		case NULL:
			$TITLE = 'Sistema de Controle de Vendas';
			include $_SERVER['DOCUMENT_ROOT'].'/inc/HTML-Head.php';
			include $_SERVER['DOCUMENT_ROOT'].'/paginas/home.php';
			include $_SERVER['DOCUMENT_ROOT'].'/inc/HTML-Footer.php';
		break;
		
		case 'venda':
			$TITLE = 'Cadastrar Vendas';
			include $_SERVER['DOCUMENT_ROOT'].'/inc/HTML-Head.php';
			include $_SERVER['DOCUMENT_ROOT'].'/paginas/vendas_form.php';
			include $_SERVER['DOCUMENT_ROOT'].'/inc/HTML-Footer.php';
		break;
		
		default:
			echo $URL_Pagina_1;
		break;
	}
	
?>