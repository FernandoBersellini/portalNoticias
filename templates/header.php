<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div class="wrapper-left">
        <a href="index.php">
        <img src="imagens/night.png" alt="">
        </a>
        <div class="wrapper-login">
            <?php
                if (!isset($_SESSION['email'])){
                    ?>
                        <a href="login.php">
                            <img src="imagens/user.png" alt="">
                        </a>
                        <a href="login.php">Entrar</a>
                    <?php
                } else {
                    if ($_SERVER['PHP_SELF'] == '/fernando/portalNoticias/painel.php') {
                        ?>
                            <a href="painel.php">
                                <img src="imagens/user.png" alt="">
                            </a>
                            <a href="logout.php">Sair</a>
                        <?php
                    } else {
                        ?>
                            <a href="painel.php">
                                <img src="imagens/user.png" alt="">
                            </a>
                            <a href="painel.php">Ir para o painel administrativo</a>
                        <?php
                    }   
                }
            ?>
        </div>
    </div>
</header>
<div class="sub-header">
    <h4 style="font-weight: bold;">Bem vindo a inforadar.com!</h4>
    <h4 style="font-weight: bold;">
        <?php
            date_default_timezone_set("America/Sao_Paulo");
            echo date("d/m/Y");
        ?>
    </h4>
</div>