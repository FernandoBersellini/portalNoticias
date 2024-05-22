<?php
    session_start();

    //destroi sessão
    session_destroy();

    header('location:login.php');

