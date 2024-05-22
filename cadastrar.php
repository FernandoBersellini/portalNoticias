<?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nome</label><br>
        <input type="text" name="nome" required><br>
        <label for="">Email</label><br>
        <input type="text" name="email" required><br>
        <label for="">Senha</label><br>
        <input type="text" name="senha" required><br><br>
        <button name="btn-cadastrar">Cadastrar</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST["btn-cadastrar"])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

        $sql = "INSERT INTO adm (nome,email,senha) VALUES ('$nome','$email','$senha')";
    
        if (mysqli_query($conexao,$sql)) {
            echo "<br> Cadastro realizado com sucesso";
        } else {
            echo "<br>Erro ao realizar o cadastro" .mysqli_error( $conexao );
        }
    }
?>