<?php
    require('conexao.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM autor WHERE idAutor = $id";

    if(mysqli_query($conexao,$sql)) {
        echo "Excluido com sucesso";
        header("Refresh: 1; URL=editarAutor.php");
    } else {
        echo "Algo deu errado";
    }