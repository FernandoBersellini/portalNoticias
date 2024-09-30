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
        }
    </style>
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <main>
        <div class="container d-flex justify-content-center mt-5">
            <form class="d-flex flex-column w-50 gap-3 p-4 rounded-3" style="background-color: #c8c8c8;" action="" method="post" class="formPainel" id="form-autor">
                <h1 class="text-center">Cadastrar autor</h1>
                <div>
                    <label class="form-label" for="">Nome</label>
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
                    <label class="form-label" for="">Telefone</label>
                    <input class="form-control" type="text" name="telefone" id="telefoneAutor">
                </div>
                <button class="btn btn-primary align-self-center" name="btn-cadastrar-autor">Cadastrar</button>
            </form>
            <script src="script.js"></script>
        </div>
    </main>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

<?php
    if(isset($_POST['btn-cadastrar-autor'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        createAuthor($nome,$sobrenome,$email,$telefone);
    }
?>    