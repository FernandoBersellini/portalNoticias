<?php
    session_start();
    require 'functions.php';
    $id = $_GET['id'];

    switch ($_SESSION['contentToDelete']) {
        case 'autor':
            deleteUser($id);
            break;
        case 'noticia':
            deleteNews($id);
            break;    
    }