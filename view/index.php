<?php
session_start();
if (empty($_SESSION["id_usuario"])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancias de trabajo</title>
    <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4230aeea9b.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include "../model/conexion.php";
    include "../controller/registro_persona.php";
    include "../controller/eliminar_persona.php";
    include "../controller/modificar_persona.php";


    include "header/header.php";

    ?>

    <!-- <div class="container-fluid row "> -->
    <div class=" m-4 ">
        <div class="d-flex align-items-center pb-3">
            <a href="registro.php" class="btn btn-success"><i class="fa-solid fa-file-excel fa-lg"></i></a>
            <h2 class="text-center text-secondary flex-grow-1">NÓMINA</h2>
            <form method="POST" action="buscar_empleado.php" class="d-flex" role="search">
  <input class="form-control me-2" type="text" name="cedula" placeholder="Buscar empleado" aria-label="Search">
  <button type="submit" class="btn btn-outline-success">Buscar</button>
</form>
        </div>
        <table class="table text-center">
            <thead class="bg-info-subtle">
                <tr>
                    <th class="bg-transparent" scope="col">NOMBRES</th>
                    <th class="bg-transparent" scope="col">APELLIDOS</th>
                    <th class="bg-transparent" scope="col">CEDULA</th>
                    <th class="bg-transparent" scope="col">CARGO</th>
                    <th class="bg-transparent" scope="col">GERENCIA</th>
                    <th class="bg-transparent" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $conexion->query(" select * from persona");
                while ($datos = $sql->fetch_object()) { ?>

                    <tr>
                        <td><?= $datos->nombre; ?></td>
                        <td><?= $datos->apellido; ?></td>
                        <td><?= $datos->cedula; ?></td>
                        <td><?= $datos->cargo; ?> </td>
                        <td><?= $datos->cargo; ?></td>
                        <td>


                            <a href="generar_constancia.php?id=<?=$datos->id_persona ?>" class='btn btn-small'><i class="fas fa-file-pdf" style="color:#74C0FC;"></i></a>
                            <a href="modificar.php?id=<?=$datos->id_persona ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #ffff;"></i>
                            <a onclick="return mensaje();" href="./index.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-danger" name="btneliminar"><i class="fa-solid fa-trash-can" style="color: #ffff;"></i></a>


                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    </div>

    <!-- Javascript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function mensaje() {
            var respuesta = confirm("¿Está seguro que desea eliminar el registro?");
            return respuesta
        }
    </script>

    <?php
    include "./footer/footer.php";
    ?>
</body>

</html>