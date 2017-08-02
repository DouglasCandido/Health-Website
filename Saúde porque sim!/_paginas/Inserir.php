<?php

	include "conexao.php"; // Inclui o arquivo conexao.php, ele será utilizado para estabelecer uma conexão com o banco de dados.
	require("conexao.php"); // require irá parar o script (caso a conexão com o banco de dados tenha falhado).

	$titulo = $_POST['inputTitulo']; // A variável titulo terá o seu valor de acordo com o valor que o usuário digitou no campo inputTitulo.
	$conteudo = $_POST['inputConteudo']; // A variável conteúdo terá o seu valor de acordo com o valor que o usuário digitou no campo inputConteudo.

	/*
	$imagem = $_FILES['inputImagem']['tmp_name'];
	$tamanho = $_FILES['inputImagem']['size'];
	$tipo = $_FILES['inputImagem']['type'];
	$nome = $_FILES['inputImagem']['name'];

	$fp = fopen($imagem, "rb");
	$conteudo_imagem = fread($fp, $tamanho);
	$conteudo_imagem = addslashes($conteudo_imagem);
	fclose($fp);

	*/

		$q = "insert into paginacao(titulo, conteudo) values ('$titulo', '$conteudo')"; // A variável q será responsável por inserir os valores das variáveis titulo e conteudo no banco de dados das postagens.

		mysqli_query($db, $q); // mysqli_query é responsável por executar a instrução sql presente na variável q.

		$result = mysqli_affected_rows($db); // A variável result retorna as linhas afetadas pela última instrução sql.

		if($result > 0) { // Se o número de linhas afetados forem maior do que zero, então os dados foram inseridos com sucesso.

			echo "Os dados foram salvos com sucesso.";

		}
		else { // Caso contrário, significará que os dados não foram inseridos com sucesso e mostrará o erro.

			echo "Nao foi possivel salvar os dados. " . mysqli_error($db);

		}

?>