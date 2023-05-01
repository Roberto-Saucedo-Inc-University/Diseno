<?php
include 'Conexion.php';
try {
    $pdo = conectar();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM materias WHERE idmaterias = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: listar.php');
    }
} catch (PDOException $e) {
    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
}
?>