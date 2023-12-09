
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
                        
                        <!-- <li><a class="dropdown-item" href="http://localhost/Try_3nuevo/Vistas/desplegableUsuarios/configuracionUsuario.php">Configuración</a></li> -->
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
                            <!-- <div class="sb-sidenav-menu-heading"><i class="fa-solid fa-diagram-project" style="color: #ffffff;"></i> &nbsp;MAIN-MENU&nbsp;<i class="fa-solid fa-diagram-project" style="color: #ffffff;"></i></div> -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i></div>
                                AYUDA
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                        <a class="nav-link" href="../../../Vistas/Manuales/panelAyuda.php"><i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i> &nbsp; Panel de Ayuda</a>
                                        
                                        
                                    


                                    <!-- <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> -->
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
                                            <!-- Si el tipo = 1 osea admin que lo vea sino nada -->
                                            <!-- <?php /* if($tipoUsuarioLogin == 1) { */ ?> -->
                                            
                                            <?php /** } */ ?>
                                            
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>

                            

                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div> -->
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
                            <li class="breadcrumb-item active">PROYECTO LODOS <img style="width: 35px !important; height: 35px !important; padding:0px !important;" src="../../../assets/img/logoLODOS.PNG" alt="ss2"></li>
                        </ol>

                        <h2>LINEAS DE PRODUCCION</h2>

                        <br/>
                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Crear Linea</h4>
                        
                        <div class="card mb-4">
                            <div class="card-body">


                            <?php
                            require_once('../../../Controlador/Conexion_DB/config.php');

                            // Verificar si el formulario ha sido enviado
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Verificar si todos los campos del formulario están configurados
                                if (
                                    isset($_POST['idLineaProduccion']) && isset($_POST['nombre']) &&
                                    isset($_POST['abreviatura']) && isset($_POST['descripcion']) &&
                                    isset($_POST['ubicacion'])
                                ) {
                                    // Recoger los datos del formulario
                                    $idLineaProduccion = secure_data($_POST['idLineaProduccion']);
                                    $nombre = secure_data($_POST['nombre']);
                                    $abreviatura = secure_data($_POST['abreviatura']);
                                    $descripcion = secure_data($_POST['descripcion']);
                                    $ubicacion = secure_data($_POST['ubicacion']);

                                    // Verificar si el idLineaProduccion ya existe en la base de datos
                                    $stmtCheck = $connectDB->prepare('SELECT idLineaProduccion FROM lineaproduccion WHERE idLineaProduccion = :idLineaProduccion');
                                    $stmtCheck->bindParam(':idLineaProduccion', $idLineaProduccion);
                                    $stmtCheck->execute();

                                    if ($stmtCheck->rowCount() > 0) {
                                        // Mostrar SweetAlert2 de error si el idLineaProduccion ya existe
                                        echo "<script>
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error al insertar',
                                                    text: 'El ID de Línea de Producción ya existe en la base de datos',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });
                                            </script>";
                                    } else {
                                        // Construir la consulta SQL
                                        $sql = 'INSERT INTO lineaproduccion (idLineaProduccion, nombre, abreviatura, descripcion, ubicacion) 
                                                VALUES (:idLineaProduccion, :nombre, :abreviatura, :descripcion, :ubicacion)';

                                        // Preparar la consulta
                                        $stmt = $connectDB->prepare($sql);

                                        // Bindear los parámetros
                                        $stmt->bindParam(':idLineaProduccion', $idLineaProduccion);
                                        $stmt->bindParam(':nombre', $nombre);
                                        $stmt->bindParam(':abreviatura', $abreviatura);
                                        $stmt->bindParam(':descripcion', $descripcion);
                                        $stmt->bindParam(':ubicacion', $ubicacion);

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
                                                    window.location.href = 'indexLinea.php';
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



                                <form action="nuevaLinea.php" method="post" onsubmit="return validarFormularioLineaProduccion();">

                                <!-- <div class="mb-3">
                                    <label for="idLineaProduccion" class="form-label">ID LÍNEA DE PRODUCCIÓN</label>
                                    <input type="text" class="form-control" name="idLineaProduccion" id="idLineaProduccion" aria-describedby="helpId" placeholder="ID LÍNEA DE PRODUCCIÓN">
                                </div> -->

                                <div class="mb-3">
                                    <label for="idLineaProduccion" class="form-label">ID LÍNEA DE PRODUCCIÓN</label>
                                    <input type="text" class="form-control" name="idLineaProduccion" id="idLineaProduccion" aria-describedby="helpId" placeholder="ID LÍNEA DE PRODUCCIÓN"
                                        value="<?php echo obtenerSiguienteIdLineaProduccion(); ?>" readonly>
                                </div>

                                <?php
                                function obtenerSiguienteIdLineaProduccion()
                                {
                                    global $connectDB;

                                    try {
                                        // Obtener el último idLineaProduccion de la tabla lineaproduccion
                                        $consultaUltimoId = "SELECT MAX(idLineaProduccion) as ultimoId FROM lineaproduccion";
                                        $resultadoUltimoId = $connectDB->query($consultaUltimoId);
                                        $filaUltimoId = $resultadoUltimoId->fetch(PDO::FETCH_ASSOC);
                                        $ultimoId = $filaUltimoId['ultimoId'];

                                        // Extraer la parte numérica del último ID y sumar 1
                                        preg_match_all('/\d+/', $ultimoId, $matches);
                                        $parteNumerica = (int)end($matches[0]);
                                        $siguienteIdLineaProduccion = $parteNumerica + 1;

                                        // Formatear el nuevo ID con ceros a la izquierda y el prefijo "LINEA"
                                        $nuevoIdLineaProduccion = sprintf("LINEA%04d", $siguienteIdLineaProduccion);

                                        return $nuevoIdLineaProduccion;
                                    } catch (PDOException $e) {
                                        // Manejar errores de la conexión PDO
                                        echo "Error de conexión: " . $e->getMessage();
                                    }
                                }
                                ?>




                                <div class="mb-3">
                                    <label for="nombre" class="form-label">NOMBRE</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="NOMBRE" required>
                                </div>

                                <div class="mb-3">
                                    <label for="abreviatura" class="form-label">ABREVIATURA</label>
                                    <input type="text" class="form-control" name="abreviatura" id="abreviatura" aria-describedby="helpId" placeholder="ABREVIATURA">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">DESCRIPCIÓN</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="DESCRIPCIÓN" required>
                                </div>

                                <div class="mb-3">
                                    <label for="ubicacion" class="form-label">UBICACIÓN</label>
                                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" aria-describedby="helpId" placeholder="UBICACIÓN" required>
                                </div>

                                <button type="submit" class="btn btn-success">Agregar Línea de Producción</button>
                                <a name="" id="" class="btn btn-primary" href="indexLineaProduccion.php" role="button">Cancelar</a>

                                <script>
                                    function validarFormularioLineaProduccion() {
                                        // Obtener los valores de los campos
                                        var idLineaProduccion = document.getElementById('idLineaProduccion').value;
                                        var abreviatura = document.getElementById('abreviatura').value;

                                        // Expresiones regulares para validar los formatos
                                        var formatoLineaProduccion = /^LINEA\d{4}$/.test(idLineaProduccion);
                                        var formatoAbreviatura = /^L\d{1,2}$/.test(abreviatura);

                                        // Verificar si los formatos son válidos
                                        if (!formatoLineaProduccion) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'El ID de Línea de Producción debe seguir el formato LINEA seguido de cuatro números (ej: LINEA0000)'
                                            });
                                            return false;
                                        }

                                        if (!formatoAbreviatura) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'La Abreviatura debe seguir el formato L seguido de uno o dos números (ej: L1, L20)'
                                            });
                                            return false;
                                        }

                                        // Permitir que el formulario se envíe si todas las validaciones son exitosas
                                        return true;
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
