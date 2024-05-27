<?php
    include('painel.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylePainel.css">
</head>
<body>
    <form action="" method="post" class="formPainel">
            <h1>Cadastrar autor</h1>
            <label for="">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome">
            <label for="">Email</label>
            <input type="text" name="email" id="email">
            <label for="">Telefone</label>
            <input type="text" name="telefone" id="telefoneAutor">
            <button name="btn-cadastrar-autor">Cadastrar</button>
            </form>
            <script src="script.js"></script>
            <?php
                if(isset($_POST['btn-cadastrar-autor'])){
                    $nome = $_POST['nome'];
                    $sobrenome = $_POST['sobrenome'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];

                    $sql = "INSERT INTO autor (nome,sobrenome,email,telefone) VALUES ('$nome','$sobrenome','$email','$telefone')";

                    if (mysqli_query($conexao,$sql)) {
                        echo "<br> Cadastro realizado com sucesso";
                    } else {
                        echo "<br>Erro ao realizar o cadastro" .mysqli_error( $conexao );
                    }
                }
            ?>    
</body>
</html>