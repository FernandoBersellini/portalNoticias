<?php
    include('painel.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="cadastro-autor">
        <h1>Cadastrar autor</h1>
        <form action="" method="post" id="form-autor">
            <label for="">Nome</label><br>
            <input type="text" name="nome" id="nome"><br><br>
            <label for="">Sobrenome</label><br>
            <input type="text" name="sobrenome" id="sobrenome"><br><br>
            <label for="">Email</label><br>
            <input type="text" name="email" id="email"><br><br>
            <label for="">Telefone</label><br>
            <input type="text" name="telefone" id="telefoneAutor"><br><br>
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
    </div>
</body>
</html>