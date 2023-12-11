<?php 

session_start();

if (empty($_SESSION["idUsuario"])) {
    
    header("Location: ../../logg/login.php");
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestión de Laboratorio</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../../assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../../../index.php">Gestión de Laboratorio</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: #ffffff;"></i></button>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php  echo $_SESSION["nombreUsuario"]. " | ".  $_SESSION["tipo"];  ?>    
                        <i class="fas fa-user fa-fw" style="color: #ffffff;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        
                        <li><a class="dropdown-item" href="../../../Vistas/desplegableUsuarios/cambioPasswrd.php">Cambio de Passwrd</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../../logg/logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../../../index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
                                INICIO
                            </a>
                            <!-- Si el tipo = 1 osea admin que lo vea sino nada -->
                            <?php  if( $_SESSION["tipo"] == "admin") {  ?> 
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i></div>
                                AYUDA
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                        <a class="nav-link" href="../../../Vistas/Manuales/panelAyuda.php"><i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i> &nbsp; Panel de Ayuda</a>

                                </nav>
                            </div>
                            <?php  }  ?>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: #ffffff;"></i></div>
                                ACCIONES
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <i class="fa-solid fa-table" style="color: #ffffff;"></i>&nbsp; Tablas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <!-- Si el tipo = 1 osea admin que lo vea sino nada -->
                                            <?php  if( $_SESSION["tipo"] == "admin") {  ?> 
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesUsuarios/indexUsuario.php"> <i class="fa-solid fa-user" style="color: #ffffff;"></i>&nbsp;Usuarios</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesReactores/indexReactor.php"><i class="fa-solid fa-industry" style="color: #ffffff;"></i>&nbsp; Reactores</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesProveedores/indexProveedor.php"> <i class="fa-solid fa-boxes-packing" style="color: #ffffff;"></i>&nbsp;Proveedores</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesLinea/indexLinea.php"><i class="fa-solid fa-l" style="color: #ffffff;"></i>&nbsp; Linea Pr </a>
                                            <?php  }  ?>

                                            <a class="nav-link" href="../../../Vistas/acciones/accionesPedidos/indexPedido.php"><i class="fa-solid fa-truck-ramp-box" style="color: #ffffff;"></i>&nbsp;Pedidos</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesBolsas/indexBolsa.php"><i class="fa-solid fa-sack-xmark" style="color: #ffffff;"></i>&nbsp;Bolsas</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesProcesos/indexProceso.php"> <i class="fa-solid fa-spinner" style="color: #ffffff;"></i> &nbsp;Procesos</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesProductos/indexProducto.php"><i class="fa-brands fa-product-hunt" style="color: #ffffff;"></i>&nbsp;Productos</a>
                                            <a class="nav-link" href="../../../Vistas/acciones/accionesDepositos/indexDeposito.php"><i class="fa-solid fa-prescription-bottle" style="color: #ffffff;"></i>&nbsp;Depositos</a>
                                            
                                            
                                        </nav>
                                    </div>
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>&nbsp; Etiquetas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../../../Vistas/codigoBarras/views/index.php"><i class="fa-solid fa-sack-xmark" style="color: #ffffff;"></i>&nbsp; Bolsa</a>
   
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?php  echo $_SESSION["nombreUsuario"]. " | ".  $_SESSION["tipo"];  ?></div>
                        Sistema de Control y Gestión de Laboratorio
                    </div>
                </nav>
            </div>

            <!--FIN DEL MENU IZQUIERDA --->

            <!--FIN DEL MENU IZQUIERDA --->
            <!--INICIO CONTENIDO PAGINA --->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">SISTEMA DE CONTROL Y GESTIÓN DE LABORATORIO</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">PROYECTO LODOS<img style="width: 35px !important; height: 35px !important; padding:0px !important;" src="../../../assets/img/logoLODOS.PNG" alt="ss2"></li>
                        </ol>

                        <h2>PROCESOS</h2>

                        <br/>
                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Crear Proceso</h4>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                

                                <?php
                                    require_once('../../../Controlador/Conexion_DB/config.php');

                                    // Verificar si el formulario ha sido enviado
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Verificar si todos los campos del formulario están configurados
                                        if (
                                            isset($_POST['idProceso']) && isset($_POST['idProducto']) &&
                                            isset($_POST['idReactor']) && isset($_POST['idUsuario']) &&
                                            isset($_POST['idLineaProduccion']) && isset($_POST['fechaProceso']) &&
                                            isset($_POST['horaInicio']) && isset($_POST['horaFin']) &&
                                            isset($_POST['temperaturaMax']) && isset($_POST['temperaturaMin'])
                                        ) {
                                            // Recoger los datos del formulario
                                            $idProceso = secure_data($_POST['idProceso']);
                                            $idProducto = secure_data($_POST['idProducto']);
                                            $idReactor = secure_data($_POST['idReactor']);
                                            $idUsuario = secure_data($_POST['idUsuario']);
                                            $idLineaProduccion = secure_data($_POST['idLineaProduccion']);
                                            $fechaProceso = secure_data($_POST['fechaProceso']);
                                            $horaInicio = secure_data($_POST['horaInicio']);
                                            $horaFin = secure_data($_POST['horaFin']);
                                            $temperaturaMax = secure_data($_POST['temperaturaMax']);
                                            $temperaturaMin = secure_data($_POST['temperaturaMin']);

                                            // Verificar si el idProceso ya existe en la base de datos
                                            $stmtCheck = $connectDB->prepare('SELECT idProceso FROM proceso WHERE idProceso = :idProceso');
                                            $stmtCheck->bindParam(':idProceso', $idProceso);
                                            $stmtCheck->execute();

                                            if ($stmtCheck->rowCount() > 0) {
                                                // Mostrar SweetAlert2 de error si el idProceso ya existe
                                                echo "<script>
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error al insertar',
                                                            text: 'El ID de Proceso ya existe en la base de datos',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                    </script>";
                                            } else {
                                                // Construir la consulta SQL
                                                $sql = 'INSERT INTO proceso (idProceso, idProducto, idReactor, idUsuario, idLineaProduccion, fechaProceso, horaInicio, horaFin, temperaturaMax, temperaturaMin) 
                                                        VALUES (:idProceso, :idProducto, :idReactor, :idUsuario, :idLineaProduccion, :fechaProceso, :horaInicio, :horaFin, :temperaturaMax, :temperaturaMin)';

                                                // Preparar la consulta
                                                $stmt = $connectDB->prepare($sql);

                                                // Bindear los parámetros
                                                $stmt->bindParam(':idProceso', $idProceso);
                                                $stmt->bindParam(':idProducto', $idProducto);
                                                $stmt->bindParam(':idReactor', $idReactor);
                                                $stmt->bindParam(':idUsuario', $idUsuario);
                                                $stmt->bindParam(':idLineaProduccion', $idLineaProduccion);
                                                $stmt->bindParam(':fechaProceso', $fechaProceso);
                                                $stmt->bindParam(':horaInicio', $horaInicio);
                                                $stmt->bindParam(':horaFin', $horaFin);
                                                $stmt->bindParam(':temperaturaMax', $temperaturaMax);
                                                $stmt->bindParam(':temperaturaMin', $temperaturaMin);

                                                // Ejecutar la consulta
                                                $stmt->execute();

                                                // Mostrar SweetAlert2 de éxito después de ejecutar el INSERT
                                                echo "<script>
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: '¡Registro exitoso!',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        }).then(function() {
                                                            window.location.href = 'indexProceso.php';
                                                        });
                                                    </script>";
                                            }
                                        } else {
                                            // Mostrar SweetAlert2 de error si no todos los campos están configurados
                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error al insertar',
                                                        text: 'Todos los campos son obligatorios',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                </script>";
                                        }
                                    }

                                    function secure_data($data)
                                    {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);

                                        return $data;
                                    }
                                ?>

                                <form action="nuevoProceso.php" method="post" enctype="multipart/form-data"  onsubmit="return validarFormularioProceso();">

                                    <div class="mb-3">
                                        <label for="idProceso" class="form-label">ID PROCESO</label>
                                        <input type="text" class="form-control" name="idProceso" id="idProceso" aria-describedby="helpId" placeholder="ID PROCESO"
                                            value="<?php echo obtenerSiguienteIdProceso(); ?>" readonly>
                                    </div>

                                    <?php
                                        function obtenerSiguienteIdProceso()
                                        {
                                            global $connectDB;

                                            try {
                                                // Obtener el último idProceso de la tabla proceso
                                                $consultaUltimoId = "SELECT MAX(idProceso) as ultimoId FROM proceso";
                                                $resultadoUltimoId = $connectDB->query($consultaUltimoId);
                                                $filaUltimoId = $resultadoUltimoId->fetch(PDO::FETCH_ASSOC);
                                                $ultimoId = $filaUltimoId['ultimoId'];

                                                // Extraer la parte numérica del último ID y sumar 1
                                                preg_match_all('/\d+/', $ultimoId, $matches);
                                                $parteNumerica = (int)end($matches[0]);
                                                $siguienteIdProceso = $parteNumerica + 1;

                                                // Formatear el nuevo ID con ceros a la izquierda y el prefijo "PROC"
                                                $nuevoIdProceso = sprintf("PROC%04d", $siguienteIdProceso);

                                                return $nuevoIdProceso;
                                            } catch (PDOException $e) {
                                                // Manejar errores de la conexión PDO
                                                echo "Error de conexión: " . $e->getMessage();
                                            }
                                        }
                                        ?>



                                    <div class="mb-3">
                                        <label for="idProducto" class="form-label">ID PRODUCTO</label>
                                        <select class="form-select" name="idProducto" id="idProducto" aria-describedby="helpId">
                                            <?php
                                                // Consultar todas las idProducto de la tabla producto
                                                $stmtProductos = $connectDB->query('SELECT idProducto FROM producto');
                                                $productos = $stmtProductos->fetchAll(PDO::FETCH_COLUMN);

                                                // Iterar sobre los resultados y crear opciones para el select
                                                foreach ($productos as $producto) {
                                                    echo "<option value=\"$producto\">$producto</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label for="idReactor" class="form-label">ID REACTOR</label>
                                        <select class="form-select" name="idReactor" id="idReactor" aria-describedby="helpId">
                                            <?php
                                                // Consultar todas las idReactor de la tabla reactor
                                                $stmtReactores = $connectDB->query('SELECT idReactor FROM reactor');
                                                $reactores = $stmtReactores->fetchAll(PDO::FETCH_COLUMN);

                                                // Iterar sobre los resultados y crear opciones para el select
                                                foreach ($reactores as $reactor) {
                                                    echo "<option value=\"$reactor\">$reactor</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label for="idUsuario" class="form-label">ID USUARIO</label>
                                        <select class="form-select" name="idUsuario" id="idUsuario" aria-describedby="helpId">
                                            <?php
                                                // Consultar todas las idUsuario de la tabla usuarios
                                                $stmtUsuarios = $connectDB->query('SELECT idUsuario FROM usuarios');
                                                $usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_COLUMN);

                                                // Iterar sobre los resultados y crear opciones para el select
                                                foreach ($usuarios as $usuario) {
                                                    echo "<option value=\"$usuario\">$usuario</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label for="idLineaProduccion" class="form-label">ID LÍNEA DE PRODUCCIÓN</label>
                                        <select class="form-select" name="idLineaProduccion" id="idLineaProduccion" aria-describedby="helpId">
                                            <?php
                                                // Consultar todas las idLineaProduccion de la tabla lineaproduccion
                                                $stmtLineasProduccion = $connectDB->query('SELECT idLineaProduccion FROM lineaproduccion');
                                                $lineasProduccion = $stmtLineasProduccion->fetchAll(PDO::FETCH_COLUMN);

                                                // Iterar sobre los resultados y crear opciones para el select
                                                foreach ($lineasProduccion as $lineaProduccion) {
                                                    echo "<option value=\"$lineaProduccion\">$lineaProduccion</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fechaProceso" class="form-label">FECHA PROCESO</label>
                                        <input type="date" class="form-control" name="fechaProceso" id="fechaProceso" aria-describedby="helpId" placeholder="FECHA PROCESO" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="horaInicio" class="form-label">HORA INICIO</label>
                                        <input type="time" class="form-control" name="horaInicio" id="horaInicio" aria-describedby="helpId" placeholder="HORA INICIO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="horaFin" class="form-label">HORA FIN</label>
                                        <input type="time" class="form-control" name="horaFin" id="horaFin" aria-describedby="helpId" placeholder="HORA FIN">
                                    </div>

                                    <div class="mb-3">
                                        <label for="temperaturaMax" class="form-label">TEMPERATURA MÁXIMA</label>
                                        <input type="text" class="form-control" name="temperaturaMax" id="temperaturaMax" aria-describedby="helpId" placeholder="TEMPERATURA MÁXIMA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="temperaturaMin" class="form-label">TEMPERATURA MÍNIMA</label>
                                        <input type="text" class="form-control" name="temperaturaMin" id="temperaturaMin" aria-describedby="helpId" placeholder="TEMPERATURA MÍNIMA">
                                    </div>

                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    <a name="" id="" class="btn btn-primary" href="indexProceso.php" role="button">Cancelar</a>

                                    <script>
                                        function validarFormularioProceso() {
                                            // Obtener los valores de los campos
                                            var idProceso = document.getElementById('idProceso').value;
                                            var idProducto = document.getElementById('idProducto').value;
                                            var idReactor = document.getElementById('idReactor').value;
                                            var idUsuario = document.getElementById('idUsuario').value;
                                            var idLineaProduccion = document.getElementById('idLineaProduccion').value;
                                            var fechaProceso = document.getElementById('fechaProceso').value;
                                            var horaInicio = document.getElementById('horaInicio').value;
                                            var horaFin = document.getElementById('horaFin').value;
                                            var temperaturaMax = document.getElementById('temperaturaMax').value;
                                            var temperaturaMin = document.getElementById('temperaturaMin').value;

                                            // Expresiones regulares
                                            var formatoProceso = /^PROC\d{4}$/.test(idProceso);
                                            var formatoProducto = /^PROD\d{4}$/.test(idProducto);
                                            var formatoReactor = /^REACT\d{4}$/.test(idReactor);
                                            var formatoUsuario = /^USU\d{4}$/.test(idUsuario);
                                            var formatoLineaProduccion = /^LINEA\d{4}$/.test(idLineaProduccion);

                                            // Verificar si los formatos son válidos
                                            if (!formatoProceso) {
                                                mostrarError('El ID de Proceso debe seguir el formato PROC seguido de cuatro números (ej: PROC0000)');
                                                return false;
                                            }

                                            if (!formatoProducto) {
                                                mostrarError('El ID de Producto debe seguir el formato PROD seguido de cuatro números (ej: PROD0000)');
                                                return false;
                                            }

                                            if (!formatoReactor) {
                                                mostrarError('El ID de Reactor debe seguir el formato REACT seguido de cuatro números (ej: REACT0000)');
                                                return false;
                                            }

                                            if (!formatoUsuario) {
                                                mostrarError('El ID de Usuario debe seguir el formato USU seguido de cuatro números (ej: USU0000)');
                                                return false;
                                            }

                                            if (!formatoLineaProduccion) {
                                                mostrarError('El ID de Línea de Producción debe seguir el formato LINEA seguido de cuatro números (ej: LINEA0000)');
                                                return false;
                                            }

                                            // Validar la relación de horas
                                            if (horaInicio >= horaFin) {
                                                mostrarError('La hora de inicio debe ser anterior a la hora de fin');
                                                return false;
                                            }

                                            // Validar la relación de temperaturas
                                            if (temperaturaMax <= temperaturaMin) {
                                                mostrarError('La temperatura máxima debe ser superior a la temperatura mínima');
                                                return false;
                                            }

                                            // Permitir que el formulario se envíe si todas las validaciones son exitosas
                                            return true;
                                        }

                                        function mostrarError(mensaje) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: mensaje
                                            });
                                        }
                                    </script>

                                </form>

                            </div>
                            
                        </div>

                        

                        
                    </div>

                        
                    </div> 
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="../../../Vistas/Politicas/politicasPrivacidad.php">Privacy Policy</a>
                                &middot;
                                <a href="../../../Vistas/Politicas/politicasUso.php">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../../assets/demo/chart-area-demo.js"></script>
        <script src="../../../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../../assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
