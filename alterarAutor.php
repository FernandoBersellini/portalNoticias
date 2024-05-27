<?php
    require('conexao.php');

    $id = $_GET['id'];
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
            <h1>Editar autor</h1>
            <label for="">Nome</label><br>
            <input type="text" name="nome" id="nome"><br><br>
            <label for="">Sobrenome</label><br>
            <input type="text" name="sobrenome" id="sobrenome"><br><br>
            <label for="">Email</label><br>
            <input type="text" name="email" id="email"><br><br>
            <label for="">Telefone</label><br>
            <input type="text" name="telefone" id="telefoneAutor"><br><br>
            <button name="btn-alterar-autor">Alterar</button>
            </form>
            <script src="script.js"></script>
</body>
</html>

<?php
    if(isset($_POST['btn-alterar-autor'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE autor
                SET nome='$nome', sobrenome='$sobrenome', email='$email', telefone='$telefone'
                WHERE idAutor = $id";

        if(mysqli_query($conexao,$sql)) {
            echo "Alterado com sucesso";
            header("Refresh: 2; URL=editarAutor.php");
        }
    }   
