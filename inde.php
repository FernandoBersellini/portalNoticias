<?php
    require('conexao.php');

    $sql = "SELECT * from noticias";

    $resultadoSql = mysqli_query($conexao,$sql);
    $row = mysqli_fetch_assoc($resultadoSql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .gallery_product
    {
        margin-bottom: 30px;
    }

    .gallery_product .title
    {
        color:#fff;
        margin: 0;
        position:relative;
        bottom:50px;
        left:10px;
    }
    
    .gallery_product .title small
    {
        display:block;
    }
    </style>
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
        <div class="featuredNewsWrapper">
            <div class="featuredNews">
                <div class="mainNews"> 
                    <div class="row">
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe ">
                            <a data-toggle="modal" data-target="#exampleModal" href="#">
                                <img src="imagens/floresta.jpg" class="img-responsive">
                            </a>
                            <h4 class="title">Título <small>Sub título</small></h4>
                        </div>
                    </div>
                </div>
                <div class="importantNews">
                    <div id="news1">
                        aaa
                    </div>
                    <div id="news2">
                        aaa
                    </div>
                    <div id="news3">
                        aaa
                    </div>
                    <div id="news4">
                        aaa
                    </div>
                </div>
            </div>
        </div>
        <h1 style="margin-top: 100px; text-align: center;">Mais notícias</h1>
        <div class="newsRowWrapper">
            <div class="newsRow">
                <?php 
                    if (mysqli_num_rows($resultadoSql) > 0) {
                        while ($row = mysqli_fetch_assoc($resultadoSql)) { ?>
                            <div class="card " style="width: 18rem;">
                                <img 
                                    src="<?php echo $row['imagem']; ?>"
                                    class="card-img-top"
                                    alt="..."
                                >
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                            echo $row['titulo']; 
                                        ?>
                                    </h>
                                    <p class="card-text">
                                        <?php
                                            echo $row['resumo'];
                                        ?>
                                    </p>
                                    <a href="lerNoticia.php?id=<?php echo $row['idNoticia']; ?>" class="btn btn-primary">Ler mais</a>
                                </div>
                            </div>
                    <?php }
                    }
                ?>
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