<?php
include "conect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $repemail = $_POST['rep_email'];
    $senha = $_POST['senha'];
    $repsenha = $_POST['rep_senha'];
    $cep = $_POST['cep'];
    $apelido = $_POST['apelido'];
    $data_nasc = $_POST['datanasc'];
    $tipo = 0;
    

    $dados2 = $conn -> query("SELECT * FROM usuario WHERE email = '$email'");
    $check = mysqli_num_rows($dados2);

    if($check < 1){
        if($email == $repemail &&  $senha == $repsenha){
            $conn -> query("INSERT INTO usuario(id, nome, apelido, email, senha, cep, datanasc, tipo)
            VALUES(NULL, '$nome', '$apelido', '$email',  '$senha', '$cep', '$data_nasc', '$tipo')");
            echo "<script language='javascript'>";
            echo "alert('Cadastrado com suscesso');";
            echo 'window.location.assign("../indexo.html");';
            echo "</script>";

        }else{
            echo "<script language='javascript'>";
            echo "alert('O emails ou senha não é iguais a sua repetições');";
            echo "</script>";
        }
        
        

        
    }else{
        echo "<script language='javascript'>";
        echo "alert('Email já cadastrado');";
        echo "</script>";
    }

}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineMagruga</title>
    <link rel="stylesheet" href="../css/cadastro_2.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="imagem">
            <img src="../img/pipoca.png" alt="" id="Img">
        </div>
        <div class="coisas">
            <form action="../php/salvar_usuario.php" method="post" enctype="multipart/form-data">
                <div class="titulo"><h1>Cadastro</h1></div>
                <div class="inputs">
                    <div class="metade1">
                        <div class="input">
                            <label for="nome">Nome: </label> <br>
                            <input type="text" name="nome" id="nome"  max="50">
                        </div>
                        <div class="input">
                            <label for="apelido">Apelido: </label> <br>
                            <input type="text" name="apelido" id="apelido" max="20" >
                        </div>
                        <div class="input">
                            <label for="email">Email: </label> <br>
                            <input type="email" name="email" id="email" max="60" >
                        </div>
                        <div class="input">
                            <label for="rep_email">Repita o email: </label> <br>
                            <input type="email" name="rep_email" id="rep_email" max="60" >
                            
                        </div>
                    </div>
                    <div class="metade2">
                        <div class="input">
                            <label for="cep">CEP: </label> <br>
                            <input type="text" name="cep" id="cep">
                        </div>
                        <div class="input">
                            <label for="senha">Senha: </label> <br>
                            <input type="text" name="senha" id="senha">
                        </div>
                        <div class="input">
                            <label for="rep_senha">Repita a senha: </label> <br>
                            <input type="text" name="rep_senha" id="rep_senha">
                        </div>
                        <div class="input">
                            <label for="datanasc">Data Nascimento: </label> <br>
                            <input type="date" name="datanasc" id="datanasc">
                        </div>
                        
                    </div>
                </div>
                <div class="login">
                    <a href="login_2.html">Entrar</a>
                </div>
                <div class="botoes">
                    <input type="submit" id="enviar" value="Enviar"> <br>
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>