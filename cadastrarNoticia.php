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
        <div class="mt-5 container d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" id="form-noticia" class="d-flex flex-column gap-3 p-5 rounded-3" style="background-color: #dddbff;">
                <h1 class="text-center">Cadastrar notícia</h1>
                <div>
                    <label class="form-label" for="">Título</label>
                    <input class="form-control" type="text" name="titulo" id="titulo">
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="resumo" id="resumo"></textarea>
                    <label class="form-label" for="">Resumo</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="descricao" id="descricao"></textarea>
                    <label class="form-label" for="">Descrição</label>
                </div>

                <div>
                    <label class="form-label" for="">Foto</label>
                    <input class="form-control" type="file" name="foto">
                </div>

                <div>
                    <label class="form-label" for="">Autor da notícia</label>
                    <select class="form-select" name="autor" id="autor">
                        <?php
                            selectAuthor();
                        ?>
                    </select>
                </div>
                <button class="btn align-self-center" style="background-color: #443dff; color: #eae9fc;" name="btn-cadastrar-noticia">Cadastrar</button>
            </form>
        </div>
    </main>
    <?php include 'templates/footer.php'; ?>
           
    <?php
        if(isset($_POST['btn-cadastrar-noticia'])){
            $titulo = $_POST['titulo'];
            $resumo = $_POST['resumo'];
            $descricao = $_POST['descricao'];
            $foto = $_FILES['foto']['name'];
            $autor = $_POST['autor'];

            if (!verifyImage($foto)) {
                ?>
                    <script>
                        alert('O formato de arquivo é incompatível')
                    </script>
                <?php
            } else {
                createNews($titulo,$resumo,$descricao,moveFile($foto),$autor);
            }
        }
    ?>
</body>
</html>