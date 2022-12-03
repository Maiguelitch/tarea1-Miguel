<?php
session_start();

if(isset($_POST['borrar'])){
    $error=false;
    //procesamos el form
    require_once __DIR__."/../db/conexion.php";

    $id=trim($_POST['id']);

    //borramos el coche
    $q="delete from coches where id=?";
    $stmt=mysqli_stmt_init($llave);
    if(mysqli_stmt_prepare($stmt, $q)){
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
    }else{
        die("Error al borrar");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($llave);
    $_SESSION['mensaje']="Coche eliminado con éxito";
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

    <title>Borrar coche</title>
</head>

<body style="background-color:black">
    <h5 class="text-center mt-2">Borrar coche</h5>
    <div class="container">
        <form name="aw" action="borrar.php" method="POST" class="text-light">
            <div class="mb-3">
                <label for="n" class="form-label">id</label>
                <input type="text" class="form-control" id="id" placeholder="id" name="id">
            </div>

            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="borrar">Borrar</button>
                </button>
            </div>

        </form>
    </div>

</body>
</html>
<?php }; ?>