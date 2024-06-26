<?php
    require('painel.php');
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
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylePainel.css">
</head>
<body>
    <form action="" method="post" id="my-form" class="formPainel" onsubmit="return validarForm()">
        <h1>Cadastrar novo ADM</h1>
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome">
        <label for="">Email</label>
        <input type="text" name="email" id="email">
        <label for="">Senha</label>
        <input type="text" name="senha1" id="senha1" onkeyup="validarSenha()">
        <span id="statusSenha1"></span>
        <label for="">Digite a sua senha novamente</label>
        <input type="text" name="senha2" id="senha2" onkeyup="validarSenhaDiferente()">
        <span id="statusSenha2"></span>
        <button name="btn-cadastrar">Cadastrar</button>
    </form>
    <script src="script.js"></script>
</body>
</html>

<?php
    if(isset($_POST["btn-cadastrar"])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST["senha1"],PASSWORD_DEFAULT);

        $sql = "INSERT INTO adm (nome,email,senha) VALUES ('$nome','$email','$senha')";
    
        if (mysqli_query($conexao,$sql)) {
            echo "<br> Cadastro realizado com sucesso";
        } else {
            echo "<br>Erro ao realizar o cadastro" .mysqli_error( $conexao );
        }
    }
?>