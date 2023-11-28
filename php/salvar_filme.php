<?php
include "conect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome_filme = $_POST['nome_filme'];
    $diretor = $_POST['diretor'];
    $duracao = $_POST['duracao'];
    $genero = $_POST['genero'];
    $datalanca = $_POST['datalanca'];
    $sinopse = $_POST['sinopse'];
    $classificacao = $_POST['classificacao'];
    $capa = $_FILES['capa']['name'];

    $dados2 = $conn -> query("SELECT * FROM filme WHERE nome_filme = '$nome_filme' AND diretor = '$diretor' AND datalanca = '$datalanca'");
    $check = mysqli_num_rows($dados2);


    $uploaddir = "../img_capa/";

    $separa = explode(".", $capa);
    $separa = array_reverse($separa);
    $ext = $separa[0];

    $capaf = $nome_filme . "." . $ext;

    if($check < 1){

        if($nome_filme != "" &&  $diretor != "" && $duracao != "" && $genero != ""){
            if(file_exists("../img_capa/$capaf") == false){
                move_uploaded_file($_FILES['capa']['tmp_name'], $uploaddir.$capaf);
                $uploadfile = $uploaddir . $capaf;

                $conn -> query("INSERT INTO filme(id_filme, nome_filme, diretor, duracao, genero, datalanca, sinopse, class_indicativa, capa)
                VALUES(NULL, '$nome_filme', '$diretor', '$duracao',  '$genero', '$datalanca','$sinopse', '$classificacao', '$uploadfile')");
                echo "<script language='javascript'>";
                echo "alert('Cadastrado com suscesso');";
                echo 'window.location.assign("../indexo.html");';
                echo "</script>";

            } else{
                echo "<script language='javascript'>";
                echo "alert('Imagem não cadastrada');";
                echo "</script>";
            }

        }else{

            echo "<script language='javascript'>";
            echo "alert('Dados faltando');";
            echo "</script>";
        }
        
    }else{

        echo "<script language='javascript'>";
        echo "alert('Filme já cadastrado');";
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
    <link rel="stylesheet" href="../css/cadfilme_2.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="imagem">
            <img src="../img/pipoca.png" alt="" id="Img">
        </div>
        <div class="coisas">
            <form action="../php/salvar_filme.php" method="post" enctype="multipart/form-data">
                <div class="titulo"><h1>Cadastro de Filme</h1></div>
                <div class="inputs">
                    <div class="metade1">
                        <div class="input">
                            <label for="nome_filme">Nome do Filme: </label> <br>
                            <input type="text" name="nome_filme" id="nome"  max="50">
                        </div>
                        <div class="input">
                            <label for="diretor">Diretor: </label> <br>
                            <input type="text" name="diretor" id="diretor" max="20" >
                        </div>
                        <div class="input">
                            <label for="duracao">Duranção: </label> <br>
                            <input type="time" id="duracao" max="04:00" name="duracao">
                        </div>
                        
                        <div class="input">
                            <label for="genero">Gênero: </label> <br>
                            <select name="genero" id="genero">
                                <option value="acao">Ação</option>
                                <option value="terror">Terror</option>
                                <option value="comedia">Comédia</option>
                                <option value="Suspense">Suspense</option>
                                <option value="Romance">Romance</option>
                            </select>
                        </div>
                        <div class="input">
                            <label for="datalanca">Data de Lançamento: </label> <br>
                            <input type="date" name="datalanca" id="datanasc" min="1920-01-01">
                        </div>
                    </div>
                    <div class="metade2">
                        
                        <div class="input">
                            <label for="sinopse">Sinopse: </label> <br>
                            <textarea name="sinopse" id="" cols="40" rows="10"></textarea>
                        </div>
                        <div class="input">
                            <label for="classificacao">Classificação Indicativa: </label> <br>
                            <select name="classificacao" id="classificacao">
                                <option value="livre">Livre</option>
                                <option value="10 anos">10 anos</option>
                                <option value="14 anos">14 anos</option>
                                <option value="16 anos">16 anos</option>
                                <option value="18 anos">18 anos</option>
                            </select>
                        </div>
                        <div class="input" style="width: 100%; padding-left: 3vw;">
                            <label for="capa">Capa do Filme: </label> <br>
                            <input type="file" name="capa" id="capa" class="capa" accept="image/*" required style="background-color: aliceblue; color: black; height: 29px; width: 100%;"><br>
                        </div>
                    </div>
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