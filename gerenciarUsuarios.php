<?php
    session_start();
    require 'conexao.php';
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
</head>
<body>
    <?php include 'templates/header.php' ?>
    <main>
        <div class="container d-flex flex-column align-items-center gap-5 mt-5">
            <div>
                <form action="" method="post" class="d-flex flex-column gap-3">
                    <h1 class="text-center">Selecione uma opção</h1>
                    <select class="form-select" name="tables" id="">
                        <option selected>Selecionar</option>
                        <option value="1">Autores</option>
                        <option value="2">Notícas</option>
                    </select>
                    <button class="btn btn-primary align-self-center" name="btn-dados">Mostrar dados</button>
                </form>
            </div>
    
            <div>
                <table class="table table-dark table-striped">
                    <?php
                        if(isset($_POST['btn-dados'])) {
                            $table = $_POST['tables'];
                            manageTables($table);
                        }
                    ?>  
                </table>
            </div>
        </div>
    </main>
    <?php include 'templates/footer.php' ?>
</body>
</html>

