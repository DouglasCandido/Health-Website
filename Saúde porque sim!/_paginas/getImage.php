<?php

	include "conexao.php";
	require("conexao.php");

	$id = $_GET['codigoPostagem']; 

	$sql = "SELECT imagem FROM paginacao WHERE id=$id";
	$result = mysqli_query($db, $sql);
	$row = mysql_fetch_assoc($result);

	header("Content-type: image/jpeg");
	echo $row['imagem'];
  
?>