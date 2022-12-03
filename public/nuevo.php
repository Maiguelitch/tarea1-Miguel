<?php
    session_start();

    if(isset($_POST['enviar'])){
        $error=false;
        //procesamos el form
        require_once __DIR__."/../db/conexion.php";

        $id=trim($_POST['id']);
        $marca=trim($_POST['marca']);
        $modelo=trim($_POST['modelo']);
        $color=trim($_POST['color']);
        $kilometros=trim($_POST['kilometros']);



        //guardamos el coche
        $q="insert into coches(id, marca, modelo, color, kilometros) values(?, ?, ?, ?, ?)";
        $stmt=mysqli_stmt_init($llave);
        if(mysqli_stmt_prepare($stmt, $q)){
            mysqli_stmt_bind_param($stmt, 'isssi', $id, $marca, $modelo, $color, $kilometros);
            mysqli_stmt_execute($stmt);
        }else{
            die("Error al insertar");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($llave);
        $_SESSION['mensaje']="Coche agregado con éxito";
        header("Location:main.php");
        die();

    }
    else{
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Agregar coche</title>
</head>

<body style="background-color:black">
    <h5 class="text-center mt-2">Agregar coche</h5>
    <div class="container">
        <form name="aw" action="nuevo.php" method="POST" class="text-light">
            <div class="mb-3">
                <label for="n" class="form-label">id</label>
                <input type="text" class="form-control" id="id" placeholder="id" name="id">
            </div>

            <div class="mb-3">
                <label for="e" class="form-label">marca</label>
                <input type="text" class="form-control" id="marca" placeholder="marca" name="marca">
            </div>

            <div class="mb-3">
                <label for="e" class="form-label">modelo</label>
                <input type="text" class="form-control" id="modelo" placeholder="modelo" name="modelo">
            </div>

            <div class="mb-3">
                <label for="e" class="form-label">color</label>
                <input type="text" class="form-control" id="color" placeholder="color" name="color">
            </div>

            <div class="mb-3">
                <label for="e" class="form-label">kilometros</label>
                <input type="text" class="form-control" id="kilometros" placeholder="kilometros" name="kilometros">
            </div>




            </div>
            <div class="d-flex">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="enviar">Enviar</button>
            </button>&nbsp;
            <button type="delete" class="btn btn-secondary btn-lg btn-block" name="borrar">Borrar</button>
                </button>
            </div>

        </form>
    </div>

</body>

</html>
<?php } ?>