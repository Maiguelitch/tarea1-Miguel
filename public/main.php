<?php
session_start();
require_once __DIR__ . "/../db/conexion.php";
$q = "select * from coches";
$resultado = mysqli_query($llave, $q);
mysqli_close($llave);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Catalogo coches</title>
</head>

<body>
    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">marca</th>
                <th scope="col">modelo</th>
                <th scope="col">color</th>
                <th scope="col">kilometros</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filacoche = mysqli_fetch_assoc($resultado)) {
                echo <<<TXT
                <tr>
                    <td>{$filacoche['id']}</td>
                    <td>{$filacoche['marca']}</td>
                    <td>{$filacoche['modelo']}</td>
                    <td>{$filacoche['color']}</td>
                    <td>{$filacoche['kilometros']}</td>
                </tr>
                
                TXT;
            }

            ?>
        </tbody>
    </table>
    <a href="nuevo.php" class="btn btn-primary">Agregar coche</a>
<br>
<br>
    <a href="borrar.php" class="btn btn-danger">Borrar coche</a>
<br>
<br>
    <a href="actualizar.php" class="btn btn-secondary">Actualizar coche</a>
</body>

</html>