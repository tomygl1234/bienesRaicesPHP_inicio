
<?php 

function conectarDb() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'OmShanti1324!', 'bienes_raices');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}