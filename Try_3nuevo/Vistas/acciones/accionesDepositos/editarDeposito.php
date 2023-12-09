../<?php 

 

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

                        <h2>DEPOSITOS</h2>

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
                            $idDeposito = $_GET['id'];
                            $descripcion = secure_data($_GET['descripcion']);
                            $limiteOcupacion = secure_data($_GET['limiteOcupacion']);
                            $cantidadOcupada = secure_data($_GET['cantidadOcupada']);
                            $porcentajeOcupacion = secure_data($_GET['porcentajeOcupacion']);
                            $ubicacion = secure_data($_GET['ubicacion']);

                            // Validar que todos los campos estén llenos
                            if (empty($descripcion) || empty($limiteOcupacion) || empty($cantidadOcupada) || empty($porcentajeOcupacion) || empty($ubicacion)) {
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
                                // Validación adicional para cantidadOcupada y porcentajeOcupacion
                                if ($cantidadOcupada > $limiteOcupacion) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'La cantidad ocupada no puede superar el límite de ocupación.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                } else if ($porcentajeOcupacion < 0 || $porcentajeOcupacion > 100) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'El porcentaje de ocupación debe ser un número entre 0 y 100.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                } else {
                                    // Realizar la actualización en la base de datos
                                    $sql = 'UPDATE deposito SET 
                                            descripcion = COALESCE(:descripcion, descripcion),
                                            limiteOcupacion = COALESCE(:limiteOcupacion, limiteOcupacion),
                                            cantidadOcupada = COALESCE(:cantidadOcupada, cantidadOcupada),
                                            porcentajeOcupacion = COALESCE(:porcentajeOcupacion, porcentajeOcupacion),
                                            ubicacion = COALESCE(:ubicacion, ubicacion)
                                            WHERE idDeposito = :idDeposito';

                                    $stmt = $connectDB->prepare($sql);

                                    $stmt->bindParam(':idDeposito', $idDeposito);
                                    $stmt->bindParam(':descripcion', $descripcion);
                                    $stmt->bindParam(':limiteOcupacion', $limiteOcupacion);
                                    $stmt->bindParam(':cantidadOcupada', $cantidadOcupada);
                                    $stmt->bindParam(':porcentajeOcupacion', $porcentajeOcupacion);
                                    $stmt->bindParam(':ubicacion', $ubicacion);

                                    $stmt->execute();

                                    // Mostrar SweetAlert2 solo cuando se presiona "Enviar"
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: '¡Actualizado con éxito!',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                }
                            }
                        }

                        // Obtener el ID del depósito
                        $idDeposito = $_GET['id'];

                        // Consultar el depósito actual
                        $stmt = $connectDB->prepare('SELECT * FROM deposito WHERE idDeposito = :idDeposito');
                        $stmt->bindParam(':idDeposito', $idDeposito);
                        $stmt->execute();
                        $depositoActual = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Verificar si el depósito no existe
                        if (!$depositoActual) {
                            echo "Depósito no encontrado.";
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
                        <h4 class="mt-4">Editar Deposito</h4>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Deposito a modificar
                                <br>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idDeposito</th>
                                            
                                            <th>descripcion</th>
                                            <th>limiteOcupacion</th>
                                            <th>cantidadOcupada</th>
                                            <th>procentajeOcupacion</th>
                                            <th>ubicacion</th>
                                            <th>ACCIONESS</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    <tr>
                                        <td><?php echo $depositoActual['idDeposito']; ?></td>
                                        <td><?php echo $depositoActual['descripcion']; ?></td>
                                        <td><?php echo $depositoActual['limiteOcupacion']; ?></td>
                                        <td><?php echo $depositoActual['cantidadOcupada']; ?></td>
                                        <td><?php echo $depositoActual['porcentajeOcupacion']; ?></td>
                                        <td><?php echo $depositoActual['ubicacion']; ?></td>

                                        <td>
                                            <?php
                                            echo '<a href="editarDeposito.php?id=' . $depositoActual['idDeposito'] . '">';
                                            echo '<i class="fa-solid fa-pen-to-square"></i>';
                                            echo '</a>';
                                            echo ' | ';
                                            echo '<a href="deleteDeposito.php?id=' . $depositoActual['idDeposito'] . '">';
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
                                
                            <h2>Formulario de Edición de Depósito</h2>

                                <form action="" method="get">

                                    <div class="mb-3">
                                        <label for="idDeposito" class="form-label">ID DEPÓSITO</label>
                                        <input class="form-control col-4" type="text" name="id" value="<?php echo $depositoActual['idDeposito']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descripcion">Descripción:</label>
                                        <input class="form-control col-4" type="text" id="descripcion" name="descripcion" value="<?php echo $depositoActual['descripcion']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="limiteOcupacion">Límite de Ocupación:</label>
                                        <input class="form-control col-4" type="text" id="limiteOcupacion" name="limiteOcupacion" value="<?php echo $depositoActual['limiteOcupacion']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cantidadOcupada">Cantidad Ocupada:</label>
                                        <input class="form-control col-4" type="text" id="cantidadOcupada" name="cantidadOcupada" value="<?php echo $depositoActual['cantidadOcupada']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="porcentajeOcupacion">Porcentaje de Ocupación:</label>
                                        <input class="form-control col-4" type="text" id="porcentajeOcupacion" name="porcentajeOcupacion" value="<?php echo $depositoActual['porcentajeOcupacion']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="ubicacion">Ubicación:</label>
                                        <input class="form-control col-4" type="text" id="ubicacion" name="ubicacion" value="<?php echo $depositoActual['ubicacion']; ?>">
                                    </div>

                                    

                                    <input type="submit" class="btn btn-success" name="Enviar" value="Actualizar">
                                    <a href="indexDeposito.php"><button class="btn btn-primary" type="button">Volver</button></a>

                                    
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
