

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

                        <h2>USUARIOS</h2>

                        <br/>
                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Buscar Usuario</h4>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Resultado de la busqueda
                                <br>
                                
                            </div>
                            <div class="card-body">
                                <?php
                                        require_once('../../../Controlador/Conexion_DB/config.php');

                                        /**
                                        * PARA BUSCAR SEGÚN LOS CAMPOS INTRODUCIDOS
                                        */
                                        // Recoger los datos del formulario


                                        $idUsuario = $_POST['idUsuario'] ?? '';
                                        $idLocalidad = $_POST['idLocalidad'] ?? '';
                                        $nombre = $_POST['nombre'] ?? '';
                                        $apellidos = $_POST['apellidos'] ?? '';
                                        $DNI = $_POST['DNI'] ?? '';
                                        $nombreUsuario = $_POST['nombreUsuario'] ?? '';
                                        $contrasena = $_POST['contrasena'] ?? '';
                                        $tipo = $_POST['tipo'] ?? '';

                                        $calle = $_POST['calle'] ?? '';
                                        $CP = $_POST['CP'] ?? '';

                                        // Verificar si al menos un campo del formulario ha sido llenado
                                        if (!empty($idUsuario) || !empty($idLocalidad) || !empty($nombre) || !empty($apellidos) ||
                                            !empty($DNI) || !empty($nombreUsuario) || !empty($contrasena) || !empty($tipo)  || !empty($calle) || !empty($CP)) {

                                            // Construir la consulta SQL base
                                            $sql = 'SELECT * FROM usuarios WHERE 1=1';

                                            // Añadir condiciones según los campos que hayan sido llenados en el formulario
                                            if (!empty($idUsuario)) {
                                                $sql .= ' AND idUsuario = :idUsuario';
                                            }

                                            if (!empty($idLocalidad)) {
                                                $sql .= ' AND idLocalidad = :idLocalidad';
                                            }

                                            if (!empty($nombre)) {
                                                $sql .= ' AND nombre = :nombre';
                                            }

                                            if (!empty($apellidos)) {
                                                $sql .= ' AND apellidos = :apellidos';
                                            }

                                            if (!empty($DNI)) {
                                                $sql .= ' AND DNI = :DNI';
                                            }

                                            if (!empty($nombreUsuario)) {
                                                $sql .= ' AND nombreUsuario = :nombreUsuario';
                                            }

                                            if (!empty($contrasena)) {
                                                $sql .= ' AND contrasena = :contrasena';
                                            }

                                            if (!empty($tipo)) {
                                                $sql .= ' AND tipo = :tipo';
                                            }

                                        

                                            if (!empty($calle)) {
                                                $sql .= ' AND calle = :calle';
                                            }

                                            if (!empty($CP)) {
                                                $sql .= ' AND CP = :CP';
                                            }

                                            // Preparar la consulta
                                            $stmt = $connectDB->prepare($sql);

                                            // Bindear los parámetros según las condiciones establecidas
                                            if (!empty($idUsuario)) {
                                                $stmt->bindParam(':idUsuario', $idUsuario);
                                            }

                                            if (!empty($idLocalidad)) {
                                                $stmt->bindParam(':idLocalidad', $idLocalidad);
                                            }

                                            if (!empty($nombre)) {
                                                $stmt->bindParam(':nombre', $nombre);
                                            }

                                            if (!empty($apellidos)) {
                                                $stmt->bindParam(':apellidos', $apellidos);
                                            }

                                            if (!empty($DNI)) {
                                                $stmt->bindParam(':DNI', $DNI);
                                            }

                                            if (!empty($nombreUsuario)) {
                                                $stmt->bindParam(':nombreUsuario', $nombreUsuario);
                                            }

                                            if (!empty($contrasena)) {
                                                $stmt->bindParam(':contrasena', $contrasena);
                                            }

                                            if (!empty($tipo)) {
                                                $stmt->bindParam(':tipo', $tipo);
                                            }

                                            

                                            if (!empty($calle)) {
                                                $stmt->bindParam(':calle', $calle);
                                            }

                                            if (!empty($CP)) {
                                                $stmt->bindParam(':CP', $CP);
                                            }

                                            // Ejecutar la consulta
                                            $stmt->execute();

                                            // Obtener los resultados
                                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if (!empty($resultados)) {
                                                // Imprimir la cabecera de la tabla
                                                echo '<table id="datatablesSimple">
                                                        <thead>
                                                            <tr>
                                                                <th>idUsuario</th>
                                                                <th>idLocalidad</th>
                                                                <th>nombre</th>
                                                                <th>apellidos</th>
                                                                <th>DNI</th>
                                                                <th>nombreUsuario</th>
                                                                <th>contrasena</th>
                                                                <th>tipo</th>
                                                                
                                                                <th>calle</th>
                                                                <th>CP</th>
                                                                <th>ACCIONES</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                            
                                                // Iterar sobre los resultados y construir las filas de la tabla
                                                foreach ($resultados as $fila) {
                                                    echo '<tr>
                                                            <td>' . $fila['idUsuario'] . '</td>
                                                            <td>' . $fila['idLocalidad'] . '</td>
                                                            <td>' . $fila['nombre'] . '</td>
                                                            <td>' . $fila['apellidos'] . '</td>
                                                            <td>' . $fila['DNI'] . '</td>
                                                            <td>' . $fila['nombreUsuario'] . '</td>
                                                            <td>' . $fila['contrasena'] . '</td>
                                                            <td>' . $fila['tipo'] . '</td>
                                                            
                                                            <td>' . $fila['calle'] . '</td>
                                                            <td>' . $fila['CP'] . '</td>
                                                            <td>
                                                                <a name="editar" id=""  href="editarUsuario.php?id=' . $fila['idUsuario'] . '"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                <a name="eliminar" id=""  href="deleteUsuario.php?id=' . $fila['idUsuario'] . '"><i class="fa-solid fa-trash"></i></a>
                                                            </td>
                                                        </tr>';
                                                }
                                            
                                                // Cerrar la etiqueta de la tabla
                                                echo '</tbody></table>';
                                            } else {
                                                // Mostrar un mensaje si no hay resultados
                                                echo '<div class="alert alert-danger col-2" role="alert">
                                                No se encontraron resultados
                                            </div>';
                                            }
                                        }



                                ?>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                


                                <h2>Formulario de Usuario</h2>

                                    <form action="" method="post">

                                        <div class="mb-3">
                                        <label for="idUsuario">ID de Usuario:</label>
                                        <input class="form-control" type="text" id="idUsuario" name="idUsuario">
                                        </div>
                                        
                                        <div class="mb-3">
                                        <label for="idLocalidad">ID de Localidad:</label>
                                        <input class="form-control" type="text" id="idLocalidad" name="idLocalidad">
                                        </div>

                                        <div class="mb-3">
                                        <label for="nombre">Nombre:</label>
                                        <input class="form-control" type="text" id="nombre" name="nombre">
                                        </div>

                                        <div class="mb-3">
                                        <label for="apellidos">Apellidos:</label>
                                        <input class="form-control" type="text" id="apellidos" name="apellidos">
                                        </div>

                                        <div class="mb-3">
                                        <label for="DNI">DNI:</label>
                                        <input class="form-control" type="text" id="DNI" name="DNI">
                                        </div>


                                        <div class="mb-3">
                                        <label for="nombreUsuario">Nombre de Usuario:</label>
                                        <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario">
                                        </div>


                                        <div class="mb-3">
                                        <label for="contrasena">Contraseña:</label>
                                        <input class="form-control" type="password" id="contrasena" name="contrasena">
                                        </div>


                                        <div class="mb-3">
                                        <label for="tipo">Tipo:</label>
                                        <input class="form-control" type="text" id="tipo" name="tipo">
                                        </div>

                                        

                                        <div class="mb-3">
                                        <label for="calle">Calle:</label>
                                        <input class="form-control" type="text" id="calle" name="calle">
                                        </div>

                                        <div class="mb-3">
                                        <label for="CP">Código Postal:</label>
                                        <input class="form-control" type="text" id="CP" name="CP">
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Enviar">
                                        <a name="" id="" class="btn btn-primary" href="indexUsuario.php" role="button">Cancelar</a>
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
