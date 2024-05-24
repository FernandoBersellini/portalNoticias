<?php
    require('conexao.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM noticias WHERE idNoticia = $id";

    if (mysqli_query($conexao, $sql)) { 
        echo "Excluido com sucesso";
        header("Refresh: 2; URL=editarNoticia.php");
    } else {
        echo "Errrado";
    }