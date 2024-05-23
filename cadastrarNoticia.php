<?php
    require('painel.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastrar notícia</h1>
    <form action="" method="post" enctype="multipart/form-data">
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
        <button name="btn-cadastrar-noticia">Cadastrar</button>
    </form>
    <?php
        if(isset($_POST['btn-cadastrar-noticia'])){
            $titulo = $_POST['titulo'];
            $resumo = $_POST['resumo'];
            $descricao = $_POST['descricao'];
            $foto = $_FILES['foto']['name'];
            $fotoFileType = pathinfo($foto, PATHINFO_EXTENSION);
            $autor = $_POST['autor'];

            if ($fotoFileType != "jpg" && $fotoFileType != "jpeg" && $fotoFileType != "png" && $fotoFileType != "gif") {
                echo "O arquivo não é uma foto";
            } else {
                $pasta = "imagensBanco/";
                $idUnico = uniqid();
                $arquivoFoto = $pasta. "img". $idUnico.".". $fotoFileType;
                move_uploaded_file($_FILES["foto"]['tmp_name'],$arquivoFoto);

                $sql = "INSERT INTO noticias (titulo,resumo,descricao,imagem,idAutor) VALUES ('$titulo','$resumo','$descricao','$arquivoFoto','$autor')";

                if (mysqli_query($conexao,$sql)) {
                    echo "<br>Cadastro realizado com sucesso";
                } else {
                    echo "<br>Erro ao realizar o cadastro" .mysqli_error( $conexao );
                }
            }
        }
    
    ?>


</body>
</html>