<?php
    session_start();
    include_once 'conexao.php';
    $_SESSION['teste'] = "teste";

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        $sql = "SELECT * from adm WHERE email ='$email'";

        $resultadoSql = mysqli_query($conexao,$sql);

        if(mysqli_num_rows($resultadoSql) > 0){
            $row = mysqli_fetch_assoc($resultadoSql);
            $_SESSION['name'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['senha'];
            $_SESSION['id'] = $row['idAdm'];
        }
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
                * {font-family: "Montserrat", sans-serif;}
                

            </style>
        </head>
        <body style="min-height: 100vh; display: flex; flex-direction: column;">
            <header>
                <?php include 'templates/header.php' ?>
            </header>
            <main class="mt-5">
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <h1>Seja bem vindo, <?php echo $_SESSION['name'] ?></h1>
                    <div class="container mt-5">
                        <div class="row mb-5 gap-5" style="color: #ffffff;">
                            <div class="d-flex flex-column align-items-center gap-3 p-5 col rounded-1" style="background-color: #433bff; height: 100%;  ">
                                <h3>Alterar senha</h3>
                                <a href="alterarSenha.php">
                                    <button class="btn btn-secondary btn-lg">Alterar</button>
                                </a>
                            </div>

                            <div class="d-flex flex-column align-items-center gap-3 p-5 col rounded-1" style="background-color: #433bff; height: 100%;  ">
                                <h3>Cadastrar administrador</h3>
                                <a href="alterarSenha.php">
                                    <button class="btn btn-secondary btn-lg">Cadastrar</button>
                                </a>
                            </div>
                        </div>

                        <div class="row mb-5 gap-5" style="color: #ffffff;">
                            <div class="d-flex flex-column align-items-center gap-3 p-5 col rounded-1" style="background-color: #433bff; height: 100%;  ">
                                <h3>Cadastrar autor</h3>
                                <a href="alterarSenha.php">
                                    <button class="btn btn-secondary btn-lg">Alterar</button>
                                </a>
                            </div>

                            <div class="d-flex flex-column align-items-center gap-3 p-5 col rounded-1" style="background-color: #433bff; height: 100%;  ">
                                <h3>Cadastrar notícia</h3>
                                <a href="alterarSenha.php">
                                    <button class="btn btn-secondary btn-lg">Cadastrar</button>
                                </a>
                            </div>
                        </div>

                        <div class="row mb-5 gap-5" style="color: #ffffff;">
                            <div class="d-flex flex-column align-items-center gap-3 p-5 col rounded-1" style="background-color: #433bff; height: 100%;  ">
                                <h3>Gerenciar usuários</h3>
                                <a href="alterarSenha.php">
                                    <button class="btn btn-secondary btn-lg">Alterar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <?php include 'templates/footer.php'?>
            </footer>
        </body>
    </html>
    <?php    
    } else {
        header("location:login.php");
    }?>
    