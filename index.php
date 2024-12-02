<?php
    session_start();
    require 'functions.php';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <main class="d-flex flex-column gap-5">
        <div class="container">
            <div class="row mb-5 justify-content-around">
                <div class="col-6 d-flex flex-column gap-3"> 
                   <?php showMainNews() ?>
                </div>

                <div class="col-6 d-flex flex-column gap-3"> 
                   <?php showMainNews() ?>
                </div>
            </div> 
        </div>
    </main>
    <?php include 'templates/footer.php' ?>
</body>
</html>