<?php 

 

    session_start();
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                        <h2>Procesos</h2>

                        <br/>
                        

                            <?php 



                                if (empty($_SESSION["idUsuario"])) {
                                    
                                    header("Location: ../../logg/login.php");
                                }

                                ?>

                                <?php
                                require_once('../../../Controlador/Conexion_DB/config.php');

                                // Verificar si se ha enviado el formulario
                                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Enviar'])) {
                                    // Recoger los datos del formulario
                                    $idProceso = $_GET['id'];
                                    $idProducto = secure_data($_GET['idProducto']);
                                    $idReactor = secure_data($_GET['idReactor']);
                                    $idUsuario = secure_data($_GET['idUsuario']);
                                    $idLineaProduccion = secure_data($_GET['idLineaProduccion']);
                                    $fechaProceso = secure_data($_GET['fechaProceso']);
                                    $horaInicio = secure_data($_GET['horaInicio']);
                                    $horaFin = secure_data($_GET['horaFin']);
                                    $temperaturaMax = secure_data($_GET['temperaturaMax']);
                                    $temperaturaMin = secure_data($_GET['temperaturaMin']);

                                    // Validar que todos los campos estén llenos
                                    if (empty($idProducto) || empty($idReactor) || empty($idUsuario) || empty($idLineaProduccion) || empty($fechaProceso) || empty($horaInicio) || empty($horaFin) || empty($temperaturaMax) || empty($temperaturaMin)) {
                                        echo "<script>
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error de validación',
                                                    text: 'Todos los campos son obligatorios',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });
                                            </script>";
                                    } else {
                                        // Validar expresiones regulares
                                        if (!preg_match('/^\d{2}:\d{2}$/', $horaInicio) || !preg_match('/^\d{2}:\d{2}$/', $horaFin)) {
                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error de validación',
                                                        text: 'El formato de las horas debe ser HH:MM',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                </script>";
                                        } elseif ($horaInicio >= $horaFin) {
                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error de validación',
                                                        text: 'La hora de inicio debe ser anterior a la hora de fin',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                </script>";
                                        } elseif (!is_numeric($temperaturaMax) || !is_numeric($temperaturaMin) || $temperaturaMax <= $temperaturaMin) {
                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error de validación',
                                                        text: 'La temperatura máxima debe ser superior a la temperatura mínima',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                </script>";
                                        } else {
                                            // Construir la consulta SQL
                                            $sql = 'UPDATE proceso SET 
                                                    idProducto = COALESCE(:idProducto, idProducto),
                                                    idReactor = COALESCE(:idReactor, idReactor),
                                                    idUsuario = COALESCE(:idUsuario, idUsuario),
                                                    idLineaProduccion = COALESCE(:idLineaProduccion, idLineaProduccion),
                                                    fechaProceso = COALESCE(:fechaProceso, fechaProceso),
                                                    horaInicio = COALESCE(:horaInicio, horaInicio),
                                                    horaFin = COALESCE(:horaFin, horaFin),
                                                    temperaturaMax = COALESCE(:temperaturaMax, temperaturaMax),
                                                    temperaturaMin = COALESCE(:temperaturaMin, temperaturaMin)
                                                    WHERE idProceso = :idProceso';

                                            $stmt = $connectDB->prepare($sql);

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

                                            $stmt->execute();

                                            // Mostrar SweetAlert2 solo cuando se presiona "Enviar"
                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: '¡Actualizado con éxito!',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });

                                                    // Desactivar el envío del formulario al recargar la página
                                                    window.onload = function() {
                                                        if (window.history.replaceState) {
                                                            window.history.replaceState(null, null, window.location.href);
                                                        }
                                                    };
                                                </script>";
                                        }
                                    }
                                }

                                $idProceso = $_GET['id'];

                                $stmt = $connectDB->prepare('SELECT * FROM proceso WHERE idProceso = :idProceso');
                                $stmt->bindParam(':idProceso', $idProceso);
                                $stmt->execute();
                                $procesoActual = $stmt->fetch(PDO::FETCH_ASSOC);

                                if (!$procesoActual) {
                                    echo "Proceso no encontrado.";
                                    exit();
                                }

                                function secure_data($data) {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);

                                    return $data;
                                }
                            ?>


                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Editar proceso</h4>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Proceso a modificar
                                <br>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idProceso</th>
                                            <th>idProducto</th>
                                            <th>idReactor</th>
                                            <th>idUsuario</th>
                                            <th>idLinea</th>
                                            <th>fechaProceso</th>
                                            <th>horaInicio</th>
                                            <th>horaFin</th>
                                            <th>tempMax</th>
                                            <th>TempMin</th>
                                            
                                            <th>ACCIONESS</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    <tr>
                                        <td><?php echo $procesoActual['idProceso']; ?></td>
                                        <td><?php echo $procesoActual['idProducto']; ?></td>
                                        <td><?php echo $procesoActual['idReactor']; ?></td>
                                        <td><?php echo $procesoActual['idUsuario']; ?></td>
                                        <td><?php echo $procesoActual['idLineaProduccion']; ?></td>
                                        <td><?php echo $procesoActual['fechaProceso']; ?></td>
                                        <td><?php echo $procesoActual['horaInicio']; ?></td>
                                        <td><?php echo $procesoActual['horaFin']; ?></td>
                                        <td><?php echo $procesoActual['temperaturaMax']; ?></td>
                                        <td><?php echo $procesoActual['temperaturaMin']; ?></td>

                                        <td>
                                            <?php
                                            echo '<a href="editarProceso.php?id=' . $procesoActual['idProceso'] . '">';
                                            echo '<i class="fa-solid fa-pen-to-square"></i>';
                                            echo '</a>';
                                            echo ' | ';
                                            echo '<a href="deleteProceso.php?id=' . $procesoActual['idProceso'] . '">';
                                            echo '<i class="fa-solid fa-trash"></i>';
                                            echo '</a>';
                                            ?>
                                        </td>
                                    </tr>

                                            

                                       
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                
                            <h2>Formulario de Edición de Proceso</h2>

                                <form action="" method="get">

                                    <div class="mb-3">
                                        <label for="idProceso" class="form-label">ID PROCESO</label>
                                        <input class="form-control col-4" type="text" name="id" value="<?php echo $procesoActual['idProceso']; ?>" readonly>
                                    </div>

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
                                        <label for="fechaProceso">Fecha de Proceso:</label>
                                        <input class="form-control col-4" type="date" id="fechaProceso" name="fechaProceso" value="<?php echo $procesoActual['fechaProceso']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="horaInicio">Hora de Inicio:</label>
                                        <input class="form-control col-4" type="time" id="horaInicio" name="horaInicio" value="<?php echo $procesoActual['horaInicio']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="horaFin">Hora de Fin:</label>
                                        <input class="form-control col-4" type="time" id="horaFin" name="horaFin" value="<?php echo $procesoActual['horaFin']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="temperaturaMax">Temperatura Máxima:</label>
                                        <input class="form-control col-4" type="text" id="temperaturaMax" name="temperaturaMax" value="<?php echo $procesoActual['temperaturaMax']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="temperaturaMin">Temperatura Mínima:</label>
                                        <input class="form-control col-4" type="text" id="temperaturaMin" name="temperaturaMin" value="<?php echo $procesoActual['temperaturaMin']; ?>">
                                    </div>

                                

                                    <input type="submit" class="btn btn-success" name="Enviar" value="Actualizar">
                                    <a href="indexProceso.php"><button class="btn btn-primary" type="button">Volver</button></a>

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
