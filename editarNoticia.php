<?php
    include('painel.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Resumo</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Autor</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php 
            $sql = "SELECT idNoticia,titulo,resumo,descricao,imagem,autor.nome FROM noticias INNER JOIN autor ON autor.idAutor = noticias.idAutor";
        
            $resultadoSql = mysqli_query($conexao,$sql);

            if(mysqli_num_rows($resultadoSql) > 0) {
                while ($row = mysqli_fetch_assoc($resultadoSql)) { ?>
                    <tr>
                        <td>
                            <?php
                                echo $row['titulo'];
                            ?>  
                        </td>
                        <td>
                            <?php
                                echo $row['resumo'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['descricao'];
                            ?>
                        </td>
                        <td>
                            <img src="<?php echo $row['imagem']; ?>" alt="Imagem da notícia">
                        </td>
                        <td>
                            <?php
                                echo $row['nome'];
                            ?>
                        </td>
                        <td>
                            <a href="excluirNoticia.php?id=<?php echo $row['idNoticia'];?>"onclick="return confirm('Você tem certeza que desja excluir?')">
                            <img src="imagens/excluir.png" alt="Excluir notícia">
                            </a>
                        </td>
                        <td>
                            <a href="alterarNoticia.php?id=<?php echo $row['idNoticia'];?>">
                                <img src="imagens/editar.png" alt="">
                            </a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "Não existem notícias cadastradas";
            }
        ?>    
    </table>
</body>
</html>
