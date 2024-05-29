<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de persona</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4230aeea9b.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php
                    include "../model/conexion.php";
                    include "../model/conexion_usuario.php";
                    include "../controller/registro_persona.php";
                    include "../controller/eliminar_persona.php";
                    
        include "./header/header.php"
    ?>
    
    <div class="d-flex justify-content-center align-items-center vh-70">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Persona</h3> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Apellido </label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Cedula </label>
                <input type="text" class="form-control" name="cedula">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Cargo </label>
                <input type="text" class="form-control" name="cargo">
            </div>
            
            <div class="d-flex gap-3 justify-content-center d-md-flex mx-auto">
                <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">Guardar</button>
                <a href="./index.php" class="btn btn-dark">Cancelar</a>
            </div>
            
        </form>

    </div>


<!-- Javascript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
        include "./footer/footer.php";
    ?>
</body>
</html>