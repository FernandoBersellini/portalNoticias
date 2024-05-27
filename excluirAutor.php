<?php
    require('conexao.php');

    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM autor WHERE idAutor = $id";
    
        if(mysqli_query($conexao,$sql)) {
            echo "Excluido com sucesso";
            header("Refresh: 1; URL=editarAutor.php");
        }
    }
    catch(Exception) {
        echo "Não é possível excluir esse autor porque ele está relacionado a uma notícia";
        header("Refresh: 1; URL=editarAutor.php");
    }

