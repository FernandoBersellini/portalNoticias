<?php
    require('conexao.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM noticias WHERE idNoticia = '$id'";

    $resultadoSql = mysqli_query($conexao,$sql);

    $row = mysqli_fetch_assoc($resultadoSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div class="wrapper-left">
            <a href="inde.php">
                <img src="imagens/BBC_logo_black_background-1.webp" alt="">
            </a>
            <div class="wrapper-login">
                <img src="imagens/user.png" alt="">
                <a href="login.php">Entrar</a>
            </div>
        </div>
    </header>
    <div class="sub-header">
        <h1>Bem vindo a BBC.com</h1>
        <h1>24 de maio de 2024</h1>
    </div>
    <main>
        <div class="selectedNewsWrapper">
            <div class="selectedNews">
                <img
                    src="<?php echo $row['imagem']; ?>"
                    alt=""
                >

                <h1 id="title">
                    <?php
                        echo $row['titulo'];
                    ?>
                </h1>

                <h2 id="subTitle">
                    <?php
                        echo $row['resumo'];
                    ?>
                </h2>

                <p style="text-align: center;">
                    <?php
                        echo $row['descricao'];
                    ?>
                </p>
            </div>
        </div>
    </main>
    <footer>
        <a href="inde.php">
            <img src="imagens/BBC_logo_black_background-1.webp" alt="">
        </a>
    </footer>
</body>
</html>