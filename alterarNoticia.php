<?php
    require('conexao.php');

    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylePainel.css">
</head>
<body class="formSozinho">
    <form action="" class="formPainel" method="post" enctype="multipart/form-data">
        <h1>Alterar notícia</h1>
        <label for="">Título</label><br><br>
        <input type="text" name="titulo" id="titulo"><br><br>
        <label for="">Resumo</label><br><br>
        <textarea name="resumo" id="resumo"></textarea><br><br>
        <label for="">Descrição</label><br><br>
        <textarea name="descricao" id="descricao"></textarea><br><br>
        <label for="">Foto</label>
        <br><br>
        <input type="file" name="foto">
        <br><br>
        <label for="">Autor da notícia</label>
        <select name="autor" id="autor">
            <?php
                require_once('conexao.php');
                $sqlAutor = "SELECT * FROM autor";
                $resultadoAutor = mysqli_query($conexao,$sqlAutor);
                if (mysqli_num_rows($resultadoAutor) > 0) {
                    while($rowAutor = mysqli_fetch_array($resultadoAutor)) { ?>
                        <option value="<?php echo $rowAutor['idAutor']?>">
                            <?php echo $rowAutor['nome']?>
                        </option>

                <?php }
                }
            ?>
        </select>
        <br><br>
        <br><br>
        <button name="btn-alterar-noticia">Cadastrar</button>
    </form>

<?php
    if(isset($_POST["btn-alterar-noticia"])){
        $titulo = $_POST['titulo'];
        $resumo = $_POST['resumo'];
        $descricao = $_POST['descricao'];
        $foto = $_FILES['foto']['name'];
        $fotoFileType = pathinfo($foto, PATHINFO_EXTENSION);
        $autor = $_POST['autor'];

        if($fotoFileType != "jpg" && $fotoFileType != "jpeg" && $fotoFileType != "png" && $fotoFileType != "gif") {
            echo "O arquivo não é uma foto";
        } else {
            $pasta = "imagensBanco/";
            $idUnico = uniqid();
            $arquivoFoto = $pasta. "img". $idUnico.".". $fotoFileType;
            move_uploaded_file($_FILES["foto"]['tmp_name'],$arquivoFoto);

            $sql = "UPDATE noticias 
                    SET titulo ='$titulo', resumo ='$resumo', descricao ='$descricao', imagem ='$arquivoFoto', idAutor ='$autor'
                    WHERE idNoticia = $id";
                    
            if (mysqli_query($conexao,$sql)) {
                echo "Atualizado com sucesso";
                header("Refresh: 2; URL=editarNoticia.php");
            }
        }
    }

