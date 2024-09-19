<?php
    function weatherIcon($icon) {
        switch($icon) {
            case '01d':
                ?>
                    <img src="imagens/sun-solid-24(1).png" alt="">
                <?php
                break;
            case '02d':
                ?>
                    <img src="imagens/sun-and-cloud.png" alt="">
                <?php
                break;   
            case '03d':
                ?>
                    <img src="imagens/clouds-and-sun.png" alt="">
                <?php
                break;
                
            case '04d':
                ?>
                    <img src="imagens/cloudy.png" alt="">
                <?php
                break;
            case '09d':
                ?>
                    <img src="imagens/cloud.png" alt="">
                <?php
                break;  
            case '10d':
                ?>
                    <img src="imagens/heavy-rain.png" alt="">
                <?php
                break;         
            case '11d':
                ?>
                    <img src="imagens/heavy-rain.png" alt="">
                <?php
                break;         
            case '13d':
                ?>
                    <img src="imagens/snowflake.png" alt="">
                <?php
                break;    
            case '50d':
                ?>
                    <img src="imagens/haze.png" alt="">
                <?php
                break;    

        }
        
    }