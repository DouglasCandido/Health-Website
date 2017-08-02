<!Doctype html>
<html lang="pt-br">

	<head> 
	
		<title> Postagens </title> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="../_css/Postagem.css">
		<link rel="stylesheet" type="text/css" href="../_css/Container_Interface.css">
		<script type="text/javascript" src="_js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="_js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="_js/Slide_Efeito.js"></script>
		<script>
        function mudaFoto(foto){ // Função que recebe um parâmetro (foto).
            document.getElementById("icone").src = foto; // Irá substituir por um novo valor que será passado por parâmetro (foto).
        }
		</script>
	
	</head>
	
	<body>
	<div id="interface">
	
		<!-- INICIO CABECALHO DO SITE -->
		<header id="cabecalho">
			<img id="logomarca" src="../_img/logo.png" alt="Logomarca" title="Saúde Porque Sim!">
			<nav id="menu-topo"> <!-- Container nav, ou seja, menu de navegação -->
				<ul id="menu">
					<li onmouseover="mudaFoto('../_img/home-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="../index.html"> Início </a></li>
					<li id="qualidade-de-vida">
						<a href="#"> Qualidade de Vida </a>
						<ul id="sub-menu">
							<li class="sub-menu" onmouseover="mudaFoto('../_img/Alimentacao-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Alimentacao_Saudavel.html"> Alimentação Saudável </a></li>
							<li class="sub-menu" onmouseover="mudaFoto('../_img/Esportes-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Exercicios_Saudaveis.html"> Exercicios Saudáveis </a></li>
							<li class="sub-menu" onmouseover="mudaFoto('../_img/acupuntura-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Acupuntura.html"> Acupuntura </a></li>
						</ul>
					</li>
					<li>
						<a href="#" onmouseover="mudaFoto('../_img/vida.jpg')" onmouseout="mudaFoto('../_img/postagens.png')"> Sua vida </a>
						<ul id="sub-menu-sua-vida">
							<li class="sub-menu"  onmouseover="mudaFoto('../_img/imagem_imc_.gif')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="IMC.html"> IMC </a></li>
							<li class="sub-menu" onmouseover="mudaFoto('../_img/postar.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Postar.html"> Postar </a></li>
							<li class="sub-menu" onmouseover="mudaFoto('../_img/postagens.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Postagens.php"> Postagens </a></li>
						</ul>
					</li>

					<li onmouseover="mudaFoto('../_img/Corpo-humano-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Corpo_Humano.html"> O Corpo Humano </a></li>
					<li onmouseover="mudaFoto('../_img/Sobre-menu.png')" onmouseout="mudaFoto('../_img/postagens.png')"><a href="Sobre.html"> Sobre </a></li>
				</ul>
			</nav>
			<img id="icone" src="../_img/postagens.png">
		</header>
	<!-- FIM CABECALHO DO SITE -->
		
		<div id="divPrincipal">
		
			<div id="divTopo">
		
				<h1> Ultimas postagens </h1>
		
			</div>
		
			<?php 
		
				include "conexao.php"; // Usará a conexão que já foi realizada com o banco de dados MySQL, o arquivo conexao.php é responsável por estabilizar essa conexão.
				/* include "getImage.php"; */
			
				global $titulo; // Declara a variável global titulo.
				global $conteudo; // Declara a variável global conteudo.
				/* global $imagem; */ 
				global $q; // Declara a variável global q (query).
			
				$limite = 5; // A variável limite será usada para fins de exibição (há um limite de tuplas que são selecionadas do banco de dados).
			
				if(isset($_GET['pg'])) { // isset é uma função que verifica se o parâmetro existe ou é nulo (retorna true se existir, e false se for nulo).
			
					$pg = $_GET['pg'];
					$inicio = ($pg * $limite) - $limite;
					$q = mysqli_query($db, "select titulo, conteudo from paginacao limit $inicio, $limite"); // Faz uma consulta no banco de dados e seleciona o título e conteúdo de uma postagem (de acordo com o limit de tuplas estabelecido).
					/* $q2 = mysqli_query($db, "select imagem from paginacao limit $inicio, $limite"); */
				
					while($linha = mysqli_fetch_array($q) /* and $imagem = mysqli_fetch_object($q2)*/) { // Enquanto houver postagens...
					
						$titulo = $linha['titulo']; // A variável titulo recebe o título da postagem (de acordo com o valor armazenado na tupla do banco de dados).
						$conteudo = $linha['conteudo']; // A variável conteudo recebe o conteúdo da postagem (de acordo com o valor armazenado na tupla do banco de dados).
				
			?>
			
			<div class="divPostagem" style="text-align: center"> <!-- Para cada postagem armazenada no banco de dados a divPostagem será criada. -->
																 <!-- A divPostagem exibirá o título e conteúdo das postagens (enquanto o while estiver rodando).
				<h2> <?php echo $titulo; ?> </h2>
				<p> <?php echo $conteudo; ?> </p> <br />
				<?php /* Header("Content-type: image/jpg"); $gera_imagem = $imagem->imagem; */ ?> 
				<?php /* echo '<img width="500" height="500" src="' . $gera_imagem .'"/>'; */ ?>
				<!-- <img src="getImage.php?codigoPostagem=2" width="500" height="500"> -->
				<?php /* echo "<tr><td>".'<img src="data:image/jpeg;base64,'.base64_encode($photo).'" alt="photo">'."</td><td>" */ ?>
				
			</div>
			
			<?php 
			
				}}else { // O else é um caso especial onde só existirá uma postagem armazenada no banco de dados, porém terá a mesma utilidade do if.
				
					$pg = 1;
					$inicio = ($pg * $limite) - $limite;
					$q = mysqli_query($db, "select titulo, conteudo from paginacao limit $inicio, $limite");
					/* $q2 = mysqli_query($db, "select imagem from paginacao limit $inicio, $limite"); */
				
					while($linha = mysqli_fetch_array($q) /* and $imagem = mysqli_fetch_object($q2)*/) {
					
						$titulo = $linha['titulo'];
						$conteudo = $linha['conteudo'];
				
			?>
			
			<div class="divPostagem" style="text-align: center">
		
				<h2> <?php echo $titulo; ?> </h2>
				<p> <?php echo $conteudo; ?> </p> <br />
				<?php /* Header("Content-type: image/jpg"); $gera_imagem = $imagem->imagem; */ ?>	
				<?php /* echo '<img width="500" height="500" src="' . $gera_imagem .'"/>'; */ ?>
				<!-- <img src="getImage.php?codigoPostagem=2" width="500" height="500"> -->
				<?php /* echo "<tr><td>".'<img src="data:image/jpeg;base64,'.base64_encode($photo).'" alt="photo">'."</td><td>" */ ?>

			</div>
			
			<?php
			
				}}
	
			?>
			
		</div>
	
			<!-- INICIO RODAPE -->
			<footer> <!-- Rodape -->
				Copyright &copy; 2015 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte
			</footer>
			<!-- FIM RODAPE -->
		
		</div>
	
	</body>
</html>