<?php
include "conect.php";



$nome = $_POST['nome'];
$email = $_POST['email'];
$repemail = $_POST['rep_email'];
$senha = $_POST['senha'];
$repsenha = $_POST['rep_senha'];
$cep = $_POST['cep'];
$apelido = $_POST['apelido'];
$data_nasc = $_POST['datanasc'];
$tipo = $_POST['usuario'];



$conn -> query("INSERT INTO usuario(id, nome, apelido, email, senha, cep, datanasc, tipo)
VALUES(NULL, '$nome', '$apelido', '$email',  '$senha', '$cep', '$data_nasc', '$tipo')");

header('Location: ../indexo.html');