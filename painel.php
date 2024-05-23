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
           <nav>
            <<a href="painel.php">Menu</a>
            <ul>
                <ul>
                    <h1>Cadastrar</h1>
                    <li>
                        <a href="cadastrar.php">Adm</a>
                    </li>
                    <li>
                        <a href="cadastrarAutor.php">Autor</a>
                    </li>
                    <li>
                        <a href="cadastrarNoticia.php">Notícia</a>
                    </li>
                </ul>
                <ul>
                    <h1>Gerenciar</h1>
                    <li>
                        <a href="editarAutor.php">Autores</a>
                    </li>
                    <li>
                        <a href="editarNoticia.php">Notícias</a>
                    </li>
                </ul>
                <li>
                    <a href="alterarSenha.php">Alterar senha</a>
                </li>
            </ul>
           </nav>
    <?php    
        echo "<a href='logout.php'>Sair</a>";
    } else {
        header("location:login.php");
    }?>
            
        </body>
        </html>
    