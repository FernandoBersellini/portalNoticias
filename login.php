<?php
    require_once('conexao.php');
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
<body class="formSozinho">
    <form action="" method="post" class="formPainel">
        <h1>Logar</h1>
        <input type="text" name="email" id="email" placeholder="Email"><br><br>
        <input type="text" name="senha" id="senha" placeholder="Senha"><br><br>
        <button name="btn-entrar">Entrar</button>
        <button name="btn-voltar"><a href="inde.php">Voltar a página inicial</a></button>
    </form>
</body>
</html>

<?php
    if(isset($_POST["btn-entrar"])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM adm WHERE email='$email'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
                $senhaBanco = $row['senha'];
                $emailBanco = $row['email'];

                echo " $emailBanco e $senhaBanco";

                if (password_verify($senha,$senhaBanco)) {
                    session_start();

                    $_SESSION['email'] = $emailBanco;

                    header('location:painel.php');
    
                } else {
                    echo "Email ou senha incorreta";
                }
            }
        } else {
            echo "Erro ao realizar a consulta: " . mysqli_error($conexao);
        }
    }
?>