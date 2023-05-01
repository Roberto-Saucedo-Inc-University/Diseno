<?php
include 'Conexion.php';

try {
    $pdo = conectar(); 

    $id = $_POST['codigo'];
    $titulo = $_POST['Titulo'];
    $pagina = $_POST['Pagina'];
    $carrera = $_POST['Carrera'];

    // Actualizar los datos en la base de datos
    $stmt = $pdo->prepare("UPDATE materias SET titulo = :titulo, pagina = :pagina, idcarreras = :carrera WHERE idmaterias = :id");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':pagina', $pagina);
    $stmt->bindParam(':carrera', $carrera);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: listar.php');
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>