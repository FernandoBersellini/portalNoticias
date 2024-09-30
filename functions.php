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
    
    function createAdm($nome,$email,$senhaAdm) {
        require 'conexao.php';

        $sql = "INSERT INTO adm (nome,email,senha) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conexao);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Erro";
        } else {
            mysqli_stmt_bind_param($stmt,'sss',$nome,$email,$senhaAdm);

            mysqli_stmt_execute($stmt);

            $resultadoSql = mysqli_stmt_get_result($stmt);

            if (!$resultadoSql) {
                echo "Cadastrado com sucesso";
            } else {
                echo "Erro ao realizar o cadastro";
            }
        }
    }

    function createAuthor($nome,$sobrenome,$email,$telefone) {
        require 'conexao.php';

        $sql = "INSERT INTO autor(nome,sobrenome,email,telefone) VALUES (?,?,?,?)";

        $stmt = mysqli_stmt_init($conexao);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Erro";
        } else {
            mysqli_stmt_bind_param($stmt,'ssss',$nome,$sobrenome,$email,$telefone);

            mysqli_stmt_execute($stmt);

            $resultadoSql = mysqli_stmt_get_result($stmt);

            if (!$resultadoSql) {
                ?>
                    <script>
                        alert('Cadastrado com sucesso!');
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert('Erro ao realizar cadastro!');
                    </script>
                <?php
            }
        }
    }

    function selectAuthor() {
        require 'conexao.php';

        $sql = "SELECT * FROM autor";
        $queryResult = mysqli_query($conexao,$sql);

        if (!mysqli_num_rows($queryResult) > 0) {
            echo "Não há autores cadastrados";
        } else {
            while ($row = mysqli_fetch_assoc($queryResult)) { ?>
                <option value="<?php echo $row['idAutor']; ?>">
                    <?php echo $row['nome']; ?>
                </option>
        <?php }
        }
    }

    function verifyImage($foto) {
        $fotoFileType = pathinfo($foto, PATHINFO_EXTENSION);

        if ($fotoFileType != "jpg" && $fotoFileType != "jpeg" && $fotoFileType != "png" && $fotoFileType != "gif") {
            return false;
        } else {
            return true;
        }
    }

    function moveFile($foto) {
        $fotoFileType = pathinfo($foto, PATHINFO_EXTENSION);

        $pasta = "imagensBanco/";
        $idUnico = uniqid();
        $arquivoFoto = $pasta. "img". $idUnico.".". $fotoFileType;
        move_uploaded_file($_FILES["foto"]['tmp_name'],$arquivoFoto);

        return $arquivoFoto;
    }

    function createNews($titulo,$resumo,$descricao,$arquivoFoto,$autor) {
        require 'conexao.php';

        $sql = "INSERT INTO noticia (titulo,resumo,descricao,imagem,idAutor) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conexao);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Erro";
        } else {
            mysqli_stmt_bind_param($stmt,'ssssi',$titulo,$resumo,$descricao,$arquivoFoto,$autor);

            mysqli_stmt_execute($stmt);

            $resultadoSql = mysqli_stmt_get_result($stmt);

            if (!$resultadoSql) {
                ?>
                    <script>
                        alert('Cadastrado com sucesso!');
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert('Erro ao realizar cadastro!');
                    </script>
                <?php
            }
        }
    }
    
    function manageTables($table) {
        require 'conexao.php';
        switch ($table) {
            case 1:
                ?>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th colspan="2">Ações</th>
                    </tr>
                <?php

                $sql = "SELECT * FROM autor";

                $queryResult = mysqli_query($conexao,$sql);

                if (!mysqli_num_rows($queryResult) > 0) {
                    echo "Não há autores cadastrados";
                } else {
                    while ($row = mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                            <td>
                                <?php
                                    echo $row['nome'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row['sobrenome'];    
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row['email'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row['telefone'];    
                                ?>
                            </td>
                            <td>
                                <a href="excluirAutor.php?id=<?php echo $row['idAutor'];?>"onclick="return confirm('Você tem certeza que deseja excluir esse autor?')">
                                    <img src="imagens/excluir.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="alterarAutor.php?id=<?php echo $row['idAutor'];?>">
                                    <img src="imagens/editar.png" alt="">
                                </a>
                            </td>
                        </tr>
                   <?php }
                }
                break;
            
            case 2:
                ?>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Autor</th>
                    <th colspan="2">Ações</th>
                <?php

                $sql = "SELECT idNoticia,titulo,resumo,descricao,imagem,autor.nome FROM noticia INNER JOIN autor ON autor.idAutor = noticia.idAutor";
                
                $queryResult = mysqli_query($conexao,$sql);
                
                if (!mysqli_num_rows($queryResult) > 0) {
                    echo "Não há notícias cadastradas";
                } else {
                    while ($row = mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                            <td>
                                <?php
                                    echo $row['titulo'];
                                ?>  
                            </td>
                            <td>
                                <?php
                                    echo $row['resumo'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row['descricao'];
                                ?>
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo $row['imagem'] ?>">Imagem</a>
                            </td>
                            <td>
                                <?php
                                    echo $row['nome'];
                                ?>
                            </td>
                            <td>
                                <a href="excluirNoticia.php?id=<?php echo $row['idNoticia'];?>"onclick="return confirm('Você tem certeza que desja excluir?')">
                                <img src="imagens/excluir.png" alt="Excluir notícia">
                                </a>
                            </td>
                            <td>
                                <a href="alterarNoticia.php?id=<?php echo $row['idNoticia'];?>">
                                    <img src="imagens/editar.png" alt="">
                                </a>
                            </td>
                        </tr>
                    <?php }
                }
                break;
        }   
    }