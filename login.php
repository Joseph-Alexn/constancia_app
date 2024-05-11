<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PHP</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4230aeea9b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="col-3 p-3 needs-validation" novalidate method="POST">
            <h3 class="text-center text-secondary mb-5">BIENVENIDO</h3>
            <?php
            include "model/conexion_usuario.php";
            include "controller/login.php";

            ?>

                <div class="mb-3">
                    <label for="validationServer01" class="form-label"> Usuario </label>
                    <input type="text" class="form-control" id="validationServer01" name="usuario" required>
                    <div class="invalid-feedback">
                        El campo no puede estar vacio
                    </div>
                </div>
                <label for="validationServer02" class="form-label"> Password</label>
                <div class="mb-3  input-group has-validation">
                    <input type="password" id="validationServer02" class="form-control" name="clave" required>
                    <button type="button" class="btn btn-dark fas fa-eye verPassword" data-bs-toggle="button" onclick="vista()" id="verPassword"></button>
                    <div class="invalid-feedback">
                        El campo no puede estar vacio
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-center d-md-flex mx-auto">
                    <button type="submit" class="btn btn-primary " name="btningresar" value="ok">ingresar</button>
                    <a href="view/registro_usuario.php" class="btn btn-dark ">Registrarse</a>
                </div>


        </form>

    </div>

    <?php
    include "view/footer/footer.php";

    ?>
    <script>
        var contador = true;

        function vista() {
            var boton = document.getElementById("verPassword");
            var inputClave = document.getElementById("validationServer02");
            if (contador == true) {
                boton.classList.remove("fa-eye");
                boton.classList.add("fa-eye-slash");
                inputClave.type = "text";
                contador = false;
            } else {
                boton.classList.remove("fa-eye-slash");
                boton.classList.add("fa-eye");
                inputClave.type = "password";
                contador = true;
            }
        }
    </script>

    <!-- Javascript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>