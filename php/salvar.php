<?php
include "conect.php";



$nome = $_POST['nome'];
$email = $_POST['email'];
$repemail = $_POST['repemail'];
$senha = $_POST['senha'];
$repsenha = $_POST['repsenha'];
$cep = $_POST['cep'];
$apelido = $_POST['apelido'];
$data_nasc = $_POST['data_nasc'] 



$conn -> query("INSERT INTO usuario(id_usuario, nome, email, repemail, senha, repsenha, cep, apelido, data_nasc)
VALUES(NULL, '$nome', '$email', '$repemail', '$senha', '$repsenha', '$cep', '$apelido', '$data_nasc')");