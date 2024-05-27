<?php
    include('painel.php');
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
<body>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
            // include('conexao.php');

            $sql = "SELECT * from autor";

            $resultadoSql = mysqli_query($conexao,$sql);

            if (mysqli_num_rows($resultadoSql) > 0) {
                while ($row = mysqli_fetch_assoc($resultadoSql)) { ?>
                    <tr>
                        <td>
                            <?php
                                echo $row['nome'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['sobrenome'];    
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['email'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['telefone'];    
                            ?>
                        </td>
                        <td>
                            <a href="excluirAutor.php?id=<?php echo $row['idAutor'];?>"onclick="return confirm('Você tem certeza que deseja excluir esse autor?')">
                                <img src="imagens/excluir.png" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="alterarAutor.php?id=<?php echo $row['idAutor'];?>">
                                <img src="imagens/editar.png" alt="">
                            </a>
                        </td>
                    </tr>
               <?php }
            } else {
                echo "Não há autores cadastrados";
            }
        ?>
    </table>
</body>
</html>