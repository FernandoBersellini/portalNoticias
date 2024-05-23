<?php
    require('conexao.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM noticias WHERE idNoticia = $id";

    if (mysqli_query($conexao, $sql)) { 
        echo "Certo";
    } else {
        echo "Errrado";
    }