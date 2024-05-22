<?php
    include_once('conexao.php');

    session_start();

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        $sql = "SELECT * from adm WHERE email ='$email'";

        $resultadoSql = mysqli_query($conexao,$sql);

        if(mysqli_num_rows($resultadoSql) > 0){
            $row = mysqli_fetch_assoc($resultadoSql);
            $nomeBanco = $row['nome'];
            $emailBanco = $row['email'];
            $senhaBanco = $row['senha'];
        }

        echo "<h1>Bem-vindo, $nomeBanco</h1>";
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
        </head>
        <body>
            <div id="mudarSenha">
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

                <?php
                    if(isset($_POST['btn-mudar-senha'])) {
                        $novaSenha1 = $_POST['novaSenha1'];
                        $novaSenha2 = $_POST['novaSenha2'];
                        $sql1 = "UPDATE adm SET senha='$novaSenha2' WHERE email = '$emailBanco'";
                        
                        if(mysqli_query($conexao,$sql1)) {
                            echo "<h1>Senha alterada com sucesso</h1>";
                        } else {
                            echo "<h1>Erro ao realizar alteração".mysqli_error($conexao)."</h1>";
                        }
                    }
                ?>
            </div>

            <div id="cadastro-autor">
                <h1>Cadastrar autor</h1>
                <form action="">
                    <label for="">Nome</label><br>
                    <input type="text" name="" id=""><br><br>
                    <label for="">Sobrenome</label><br>
                    <input type="text"><br><br>
                    <label for="">Email</label><br>
                    <input type="text" name="" id=""><br><br>
                    <label for="">Telefone</label><br>
                    <input type="text"><br><br>
                    <button name="btn-cadastrar-autor">Cadastrar</button>
                </form>
            </div>

            <div id="cadastro-noticia">
                <h1>Cadastrar notícia</h1>
            </div>

            <script src="script.js"></script>
        </body>
        </html>
    
    <?php    
        echo "<a href='logout.php'>Sair</a>";
    } else {
        header("location:login.php");
    }