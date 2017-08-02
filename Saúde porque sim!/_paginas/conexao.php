<?php

	/* Conexão com o banco de dados MySQL. */

	$db = mysqli_connect("localhost", "root", ""); // A variável db armazena todas as informações necessárias para se conectar com o banco. Usuário = root, Senha = vazio. 
	
	
	if(!$db) { // Se a variável db retornar false a conexão falhou.
		
		die("Conexão falhou: " . mysqli_connect_error());
		
	}
	
	else { // Se a variável db retornar true a conexão teve sucesso.
		
		$select = mysqli_select_db($db, "postagens"); // Seleciona a tabela que os dados serão inseridos.
		mysqli_set_charset($db, 'utf8'); // Habilita a codificação Unicode UTF-8. 
	
	}
	
?>