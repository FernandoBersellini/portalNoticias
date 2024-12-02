<?php
    session_start();
    require 'functions.php';
    $id = $_GET['id'];
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
<body>
    <?php include 'templates/header.php' ?>
    <main>
        <div class="container d-flex flex-column align-items-center gap-5">
            <form action="" method="post" class="d-flex flex-column gap-3" id="updateAutor">
                <h1 class="text-center">Editar autor</h1>
                <div>
                    <label for="" class="form-label">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome">
                </div>

                <div>
                    <label class="form-label" for="">Sobrenome</label>
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome">
                </div>

                <div>
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>

                <div>
                    <label class="form-label" for="">Telefone</label><br>
                    <input class="form-control" type="text" name="telefone" id="updateTelefoneAutor">
                </div>
                <button class="btn btn-primary" name="btn-alterar-autor">Alterar</button>
            </form>
            <a href="gerenciarUsuarios.php">
                <button class="btn btn-primary">Retornar para o gerenciamento</button>
            </a>
        </div>
    </main>
    <script src="script.js"></script>
    <?php include 'templates/footer.php' ?>
</body>
</html>

<?php
    if(isset($_POST['btn-alterar-autor'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        updateAutor($nome,$sobrenome,$email,$telefone,$id);
    }   
