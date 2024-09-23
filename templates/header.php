<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div class="wrapper-left">
        <a href="inde.php">
        <img src="imagens/BBC_logo_black_background-1.webp" alt="">
        </a>
        <div class="wrapper-login">
            <img src="imagens/user.png" alt="">
            <?php
                if (!isset($_SESSION['email'])){
                    ?>
                        <a href="login.php">Entrar</a>
                    <?php
                } else {
                    if ($_SERVER['PHP_SELF'] == '/fernando/portalNoticias/painel.php') {
                        ?>
                            <a href="logout.php">Sair</a>
                        <?php
                    } else {
                        ?>
                            <a href="painel.php">Ir para o painel administrativo</a>
                        <?php
                    }   
                }
            ?>
        </div>
    </div>
</header>