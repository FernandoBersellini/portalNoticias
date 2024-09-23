<?php
    function loginUser($email,$senhaAdm) {
        require 'conexao.php';

        // Template de query
        $sql = "SELECT * FROM adm WHERE email=?";

        //Inicializa o statement
        $stmt = mysqli_stmt_init($conexao);

        // Preparação do statement
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Erro";
        } else {
            //Atribui valores ao placeholder de dados
            mysqli_stmt_bind_param($stmt, "s", $email);

            mysqli_stmt_execute($stmt);

            $resultadoSql = mysqli_stmt_get_result($stmt);

            if (!$resultadoSql) {
                echo "Erro ao realizar consulta";
            } else {
                if (!mysqli_num_rows($resultadoSql) > 0) {
                    echo "Sem dados cadastrados";
                } else {
                    $row = mysqli_fetch_assoc($resultadoSql);
                    $senhaBanco = $row['senha'];
                    $emailBanco = $row['email'];

                    if (!$senhaAdm == $senhaBanco) {
                        echo "Senha ou email incorretos";
                    } else {
                        session_start();

                        $_SESSION['email'] = $emailBanco;

                        header('location:painel.php');
                    }
                }
            }
        }
    }

    function showMainNews() {
        require 'conexao.php';

        $rand = rand(1,2);    

        $sql = "SELECT * from noticia WHERE idNoticia = '$rand'";

        $resultadoSql = mysqli_query($conexao,$sql);
        $row = mysqli_fetch_assoc($resultadoSql);

        ?>
            <img src="<?php echo $row['imagem']; ?>" alt="" style="height: 100%;">
                <h1>
                    <?php
                        echo $row['titulo'];
                     ?>
                </h1>
                <p>
                    <?php
                    echo $row['resumo'];
                     ?>
                </p>
                <button class="btn btn-primary" style="width: 25%; margin: auto;"><a href="lerNoticia.php?id=<?php echo $row['idNoticia']; ?>">Ler mais</a></button>
        <?php
    }

    function alterPassword($novaSenha2,$id) {
        require 'conexao.php';

        $sql = "UPDATE adm SET senha=? WHERE idAdm=?";

        $stmt = mysqli_stmt_init($conexao);

        if(!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Erro";
        } else {
            mysqli_stmt_bind_param($stmt,'si',$novaSenha2,$id);

            mysqli_stmt_execute($stmt);

            $resultadoSql = mysqli_stmt_get_result($stmt);

            if ($resultadoSql) {
                echo "Alterado com sucesso";
            } else {
                echo "Erro ao realizar a alteração";
            }
        }
    }
    