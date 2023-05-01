<!DOCTYPE html>
<html>

<head>
    <title>Listado de usuarios</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.2/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.2/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../frontend/estilos/stylesForm.css">
    <meta charset="UTF-8">

</head>

<body>
    <div class="container-table">
        <table id="miTabla" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Titulo</th>
                    <th>Carrera</th>
                    <th>
                        <a href="agregar.php" style="color: white;"><i class="fas fa-plus-circle"></i> Acciones</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Conexion.php';

                $pdo = conectar();

                // Consulta SQL para obtener los datos de la tabla "usuarios"
                $sql = "SELECT materias.idmaterias as id, materias.titulo, carreras.descripcion as carrera FROM materias
                INNER JOIN carreras ON materias.idcarreras = carreras.idcarreras";

                // Ejecutar la consulta y obtener los resultados
                $resultado = $pdo->query($sql);

                // Mostrar los resultados en una tabla HTML
                foreach ($resultado as $fila) {
                    echo "<tr> <td>" . $fila['id'] . "</td> <td>";
                    if (mb_detect_encoding($fila['titulo'], 'UTF-8', true) !== 'UTF-8') {
                        echo utf8_encode($fila['titulo']);
                    } else {
                        echo $fila['titulo'];
                    }
                    echo "</td>
                            <td>" . $fila['carrera'] . "</td>
                            <td>
                                <a href='eliminar.php?id=" . $fila['id'] . "'><i class='fas fa-trash-alt'></i> Eliminar</a><br>
                                <a href='modificar.php?id=" . $fila['id'] . "'><i class='fas fa-edit'></i> Modificar</a><br>
                                <a href='mostrar.php?idmaterias=" . $fila['id'] . "'><i class='fas fa-file-alt'></i> Ver</a>
                            </td>
                         </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Inicialización de DataTables en la tabla
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
    </script>
</body>

</html>