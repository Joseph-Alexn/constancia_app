<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PHP</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4230aeea9b.js" crossorigin="anonymous"></script>
</head>

<body>



    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="col-4 p-3 needs-validation" novalidate method="POST">
            <h3 class="text-center text-secondary">Registro de Usuario</h3>
            <?php
            include "../model/conexion_usuario.php";
            include "../controller/registro_usuario.php";

            ?>

            <div class="mb-3">
                <label for="validationServer03" class="form-label"> Nombre</label>
                <input type="text" class="form-control" name="nombre" id="validationServer03">
                <div class="invalid-feedback">
                    El campo no puede estar vacio
                </div>
            </div>
            <div class="mb-3">
                <label for="validationServer04" class="form-label"> Apellido </label>
                <input type="text" class="form-control" name="apellido" id="validationServer04">
                <div class="invalid-feedback">
                    El campo no puede estar vacio
                </div>
            </div>
            <div class="mb-3">
                <label for="validationServer05" class="form-label"> Usuario </label>
                <input type="text" class="form-control" name="usuario" id="validationServer05">
                <div class="invalid-feedback">
                    El campo no puede estar vacio
                </div>
            </div>
            <div class="mb-3">
                <label for="validationServer06" class="form-label"> Password</label>
                <input type="password" class="form-control" name="clave" id="validationServer06">
                <div class="invalid-feedback">
                    El campo no puede estar vacio
                </div>
            </div>
            <div class="d-grid gap-2 col-6 d-md-block mx-auto">
                <button type="submit" class="btn btn-primary" name="btnRegistrarUsuario" value="ok">Registrar</button>
                <a href="../login.php" class="btn btn-dark">Regresar</a>
            </div>

        </form>

    </div>

    <?php
    include "./footer/footer.php";
    ?>

    <!-- Javascript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>