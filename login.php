<?php
    require_once 'conexao.php';
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
    <link rel="stylesheet" href="style.css">
    <style>
        * {font-family: "Montserrat", sans-serif;}
    </style>
</head>
<body>
    <?php include 'templates/header.php'?>
    <main class="container mt-5">
        <div class="container-md bg-dark text-white p-3 rounded-3 w-50">
            <form action="" method="post">
                <h1 class="text-center mt-4">Logar</h1>
                <div class="mt-5">
                    <label class="form-label" for="email">Digite seu email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Email"><br><br>
                    <label class="form-label" for="senha">Digite sua senha</label>
                    <input class="form-control" type="text" name="senha" id="senha" placeholder="Senha"><br><br>
                </div>
                <div class="d-grid gap-3">
                    <button class="btn btn-primary btn-block" name="btn-entrar">Entrar</button>
                    <button class="btn btn-primary btn-block" name="btn-voltar"><a href="inde.php">Voltar a página inicial</a></button>
                </div>
            </form>
        </div>
    </main>
    <?php include 'templates/footer.php'?>
</body>
</html>

<?php
    if(isset($_POST["btn-entrar"])) {
        $email = mysqli_real_escape_string($conexao,$_POST['email']);
        $senha = mysqli_real_escape_string($conexao,$_POST['senha']);
        
        loginUser($email,$senha);
    }
?>