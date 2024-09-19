<?php
    require 'conexao.php';
    require 'functions.php';

    try {
        $api = "https://api.openweathermap.org/data/2.5/weather?q=londrina&appid=e6bc32524494ab803c4199b709a0af34&lang=pt_br&units=metric";
        $apiData = file_get_contents($api);
        $weather = json_decode($apiData,true);
        $icon = $weather['weather'][0]['icon'];
        $iconName = $icon.'_t.png';
    } catch(Exception $e) {
        echo 'Mensagem:' . $e->getMessage();
    }


   
    $rand = rand(1,2);    

    $sql = "SELECT * from noticia WHERE idNoticia = '$rand'";

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
        <h1>
            <?php
                date_default_timezone_set("America/Sao_Paulo");
                echo date("d/m/Y");
            ?>
        </h1>
    </div>
    <main class="d-flex flex-column gap-5">
        <div class="featuredNewsWrapper">
            <div class="featuredNews">
                <div class="mainNews1"> 
                   <img src="<?php echo $row['imagem']; ?>" alt="" style="height: 100%;">
                   <h1>
                        <?php
                            echo $row['titulo'];
                        ?>
                   </h1>
                   <p>
                        <?php
                            echo $row['resumo'];
                        ?>
                   </p>
                   <button class="btn btn-primary" style="width: 25%; margin: auto;"><a href="lerNoticia.php?id=<?php echo $row['idNoticia']; ?>">Ler mais</a></button>
                </div>

                <div class="mainNews1"> 
                   <img src="<?php echo $row['imagem']; ?>" alt="" style="height: 100%;">
                   <h1>
                        <?php
                            echo $row['titulo'];
                        ?>
                   </h1>
                   <p>
                        <?php
                            echo $row['resumo'];
                        ?>
                   </p>
                   <button class="btn btn-primary" style="width: 25%; margin: auto;"><a href="">Ler mais</a></button>
                </div>
            </div> 
        </div>
        <div style="margin: auto" class="w-75 d-flex flex-column align-items-center gap-3">
            <h1>Previsão do tempo</h1>
            <div class="d-flex flex-column align-items-center p-5 rounded-2" style="background-color: #ECDFCC; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <h2>
                    <?php
                        echo $weather['name'];
                    ?>
                </h2>
                <img src="https://rodrigokamada.github.io/openweathermap/images/<?php echo $iconName ?>" alt="">
                <h4 style="font-family: Montserrat, sans-serif; font-weight: bold;">
                    <?php
                        echo ucwords($weather['weather'][0]['description']);
                    ?>
                </h4>
                <h4 style="font-family: Montserrat, sans-serif; font-weight: bold;">
                    <?php
                        echo $weather['main']['temp'];
                    ?>
                </h4>
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