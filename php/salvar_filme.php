<?php
include "conect.php";



$nome_filme = $_POST['nome_filme'];
$diretor = $_POST['diretor'];
$duracao = $_POST['duracao'];
$genero = $_POST['genero'];
$datalanca = $_POST['datalanca'];
$sinopse = $_POST['sinopse'];
$classificacao = $_POST['classificacao'];

$conn -> query("INSERT INTO filme(id_filme, nome_filme, diretor, duracao, genero, datalanca, sinopse, class_indicativa)
VALUES(NULL, '$nome_filme', '$diretor', '$duracao',  '$genero', '$datalanca','$sinopse', '$classificacao')");

header('Location: ../indexo.html');