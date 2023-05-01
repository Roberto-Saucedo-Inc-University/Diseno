<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contenido con formato de Word</title>
    <link rel="stylesheet" href="../frontend/estilos/word.css">
</head>

<body>
    <?php
    include 'Conexion.php';

    $conn = conectar();
    // Obtener la idmaterias de la URL
    $idmaterias = $_GET["idmaterias"];

    // Consulta SQL para recuperar el contenido de la página correspondiente
    $post = $conn->prepare("SELECT * FROM materias WHERE idmaterias = :idmaterias");
    $post->bindParam(':idmaterias', $idmaterias);
    $post->execute();
    $pagina = $post->fetch()["pagina"];


    if (mb_detect_encoding($pagina, 'UTF-8', true) !== 'UTF-8') {
        $pagina = utf8_encode($pagina);
    }
    

    // Mostrar el contenido de la página en un contenedor
    echo  '<div class="container">
                <div class="container-img">
                    <img src="../frontend/imagenes/logo1.png" alt="Descripción de la imagen izquierda">
                    <p>UNIVERSIDAD NACIONAL DE CAAGUAZU<br>
                    Con sede en Coronel Oviedo<br>
                    FACULTAD DE CIENCIAS Y TECNOLOGÍAS<br>
                    CARRERA DE INGENIERIA EN INFORMÁTICA<br>
                    PLAN CURRICULAR 2010<br>
                    <b>PROGRAMA DE ESTUDIOS</b>
                    </p>                    
                    <img src="../frontend/imagenes/logo2.jpg" alt="Descripción de la imagen derecha">
                </div>
                <hr>
        '
        . $pagina . '</div>';

    ?>
</body>

</html>