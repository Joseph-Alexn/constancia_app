<html>

<body>
    <?php
    include "model/cerrar_sesion.php"
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
            <div class="container-fluid">
                <div class="navbar-brand"><i class="fa-solid fa-user" style="color: #74C0FC;">&nbsp;&nbsp;</i>
                    <?php
                    echo " " . ucwords($_SESSION["nombre"]) . " " . ucwords($_SESSION["apellido"]);
                    ?>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        <div class="d-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="./fpdf/reporte_registros.php" target="_blank"> Reporte de registros <i class="fas fa-file-pdf" style="color:#74C0FC;"></i></a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link" href="./fpdf/reporte_usuarios.php" target="_blank"> Reporte de usuarios <i class="fas fa-file-pdf" style="color:#74C0FC;"></i></a>
                            </li>
                        </div>
                        <li class=" nav-item">
                            <a class="nav-link " href="../model/cerrar_sesion.php"> Cerrar Sesión <i class="fa-solid fa-right-from-bracket fa-lg" style="color:#74C0FC;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>