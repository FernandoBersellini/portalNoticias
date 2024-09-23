<?php
    session_start();
    require 'functions.php';
    require 'conexao.php';
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
            * {
                font-family: "Montserrat", sans-serif;
            }
        </style>
    </head>
    <body>
        <?php include 'templates/header.php';?>
        <main>
            <div class="container d-flex flex-column align-items-center p-5 mt-5 gap-3" style="background-color: #433bff; width: fit-content;">
                <h1>Mudar senha</h1>
                <form class="d-flex flex-column" action="" method="post" onsubmit="return validarAlteracaoForm()" id="mudar-Senha">
                    <div class="mb-3">
                        <label class="form-label" for="">Nova senha</label><br>
                        <input class="form-control" type="text" name="novaSenha1" id="novaSenha1" onkeyup="validarAlteracao()"><br>                        
                        <span id="statusNovaSenha1"></span><br>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Confirmar senha</label><br>
                        <input class="form-control" type="text" name="novaSenha2" id="novaSenha2" onkeyup="validarAlteracaoDiferente()"><br>                        
                        <span id="statusNovaSenha2"></span><br>
                    </div>
                    <button class="btn btn-primary" name="btn-mudar-senha">Mudar senha</button>
                </form>
            </div>
        </main>
        <script src="script.js"></script>
        <?php include 'templates/footer.php';?>
    </body>
    </html>

    <?php
        if(isset($_POST['btn-mudar-senha'])) {
            $novaSenha2 = $_POST['novaSenha2'];

            alterPassword($novaSenha2,$_SESSION['id']);
            // $novaSenha2 = password_hash($_POST['novaSenha2'],PASSWORD_DEFAULT);
        }
    ?>

