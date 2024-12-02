<?php
    session_start();
    include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: "Montserrat", sans-serif;
            color: #050316;
        }
    </style>
</head>
<body>
    <?php include 'templates/header.php';?>
    <main>
        <div class="container d-flex flex-column align-items-center mt-5 gap-3">
            <h1>Cadastrar novo ADM</h1>
            <form class="d-flex flex-column gap-3 p-5 rounded-3" style="background-color: #dddbff;" action="" method="post" id="my-form" onsubmit="return validarForm()">
                <div>
                    <label class="form-label" for="">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome">
                </div>

                <div>
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>

                <div>
                    <label class="form-label" for="">Senha</label>
                    <input class="form-control" type="text" name="senha1" id="senha1" onkeyup="validarSenha()">
                    <span id="statusSenha1"></span>
                </div>

                <div>
                    <label class="form-label" for="">Digite a sua senha novamente</label>
                    <input class="form-control" type="text" name="senha2" id="senha2" onkeyup="validarSenhaDiferente()">
                    <span id="statusSenha2"></span>
                </div>
                <button class="btn" style="background-color: #443dff;" name="btn-cadastrar">Cadastrar</button>
            </form>
        </div>
    </main>
    <script src="script.js"></script>
    <?php include 'templates/footer.php';?>
</body>
</html>

<?php
    if(isset($_POST["btn-cadastrar"])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senhaAdm = $_POST['senha2'];

        createAdm($nome,$email,$senhaAd);
    }
?>