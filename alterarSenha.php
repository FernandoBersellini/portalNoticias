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
        <h1>Mudar senha</h1>
        <form action="" method="post" onsubmit="return validarAlteracaoForm()">
            <label for="">Nova senha</label><br>
            <input type="text" name="novaSenha1" id="novaSenha1" onkeyup="validarAlteracao()"><br>
            <span id="statusNovaSenha1"></span><br>
            <label for="">Confirmar senha</label><br>
            <input type="text" name="novaSenha2" id="novaSenha2" onkeyup="validarAlteracaoDiferente()"><br>
            <span id="statusNovaSenha2"></span><br>
            <button name="btn-mudar-senha">Mudar senha</button>
        </form>
        <script src="script.js"></script>
    </body>
    </html>

    <?php
        if(isset($_POST['btn-mudar-senha'])) {
            $novaSenha1 = $_POST['novaSenha1'];
            $novaSenha2 = password_hash($_POST['novaSenha2'],PASSWORD_DEFAULT);
            $sql1 = "UPDATE adm SET senha='$novaSenha2' WHERE email = '$emailBanco'";
                        
            if(mysqli_query($conexao,$sql1)) {
                echo "<h1>Senha alterada com sucesso</h1>";
            } else {
                echo "<h1>Erro ao realizar alteração".mysqli_error($conexao)."</h1>";
            }
        }
    ?>

