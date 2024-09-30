<?php
    session_start();
    require 'functions.php';    
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
        <?php include 'templates/header.php'; ?>
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
                   <?php showMainNews() ?>
                </div>

                <div class="mainNews1"> 
                   <?php showMainNews() ?>
                </div>
            </div> 
        </div>
        <div style="margin: auto" class="w-75 d-flex flex-column align-items-center gap-3">
            <h1>Previsão do tempo</h1>
            <div class="d-flex flex-column align-items-center p-5 rounded-2" style="background-color: #ECDFCC; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <h2>
                    <?php
                        echo $location['results'][0]['name'];
                    ?>
                </h2>
                <h4 style="font-family: Montserrat, sans-serif; font-weight: bold;">
                    <?php
                        echo $weather['hourly']['time'][0];
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
       <?php include 'templates/footer.php' ?>
    </footer>
</body>
</html>