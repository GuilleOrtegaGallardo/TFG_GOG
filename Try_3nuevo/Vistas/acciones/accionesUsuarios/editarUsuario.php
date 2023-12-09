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

                        <h2>USUARIOS</h2>

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
                                    $idUsuario = $_GET['id'];
                                    $idLocalidad = secure_data($_GET['idLocalidad']);
                                    $nombre = secure_data($_GET['nombre']);
                                    $apellidos = secure_data($_GET['apellidos']);
                                    $DNI = secure_data($_GET['DNI']);
                                    $nombreUsuario = secure_data($_GET['nombreUsuario']);
                                    $contrasena = secure_data($_GET['contrasena']);
                                    $tipo = secure_data($_GET['tipo']);
                                    
                                    $calle = secure_data($_GET['calle']);
                                    $CP = secure_data($_GET['CP']);

                                    // Validar el formato del DNI con una expresión regular
                                    if (!preg_match('/^[0-9]{8}[A-Za-z]$/', $DNI)) {
                                        echo "<script>
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error de validación',
                                                    text: 'El formato del DNI no es válido. Ejemplo válido: 12345678A',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });
                                            </script>";
                                    } elseif ($tipo !== 'admin' && $tipo !== 'operario') {
                                        // Validar que el tipo sea 'admin' o 'operario'
                                        echo "<script>
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error de validación',
                                                    text: 'El tipo debe ser \"admin\" o \"operario\"',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });
                                            </script>";
                                    } elseif (empty($nombre) || empty($apellidos) || empty($DNI) || empty($nombreUsuario) || empty($contrasena) || empty($tipo)  || empty($calle) || empty($CP)) {
                                        // Validar que todos los campos estén llenos
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
                                        // Construir la consulta SQL
                                        $sql = 'UPDATE usuarios SET 
                                                idLocalidad = COALESCE(:idLocalidad, idLocalidad),
                                                nombre = COALESCE(:nombre, nombre),
                                                apellidos = COALESCE(:apellidos, apellidos),
                                                DNI = COALESCE(:DNI, DNI),
                                                nombreUsuario = COALESCE(:nombreUsuario, nombreUsuario),
                                                contrasena = COALESCE(:contrasena, contrasena),
                                                tipo = COALESCE(:tipo, tipo),
                                                
                                                calle = COALESCE(:calle, calle),
                                                CP = COALESCE(:CP, CP)
                                                WHERE idUsuario = :idUsuario';

                                        $stmt = $connectDB->prepare($sql);

                                        $stmt->bindParam(':idUsuario', $idUsuario);
                                        $stmt->bindParam(':idLocalidad', $idLocalidad);
                                        $stmt->bindParam(':nombre', $nombre);
                                        $stmt->bindParam(':apellidos', $apellidos);
                                        $stmt->bindParam(':DNI', $DNI);
                                        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
                                        $stmt->bindParam(':contrasena', $contrasena);
                                        $stmt->bindParam(':tipo', $tipo);
                                        
                                        $stmt->bindParam(':calle', $calle);
                                        $stmt->bindParam(':CP', $CP);

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

                                $idUsuario = $_GET['id'];

                                $stmt = $connectDB->prepare('SELECT * FROM usuarios WHERE idUsuario = :idUsuario');
                                $stmt->bindParam(':idUsuario', $idUsuario);
                                $stmt->execute();
                                $usuarioActual = $stmt->fetch(PDO::FETCH_ASSOC);

                                if (!$usuarioActual) {
                                    echo "Usuario no encontrado.";
                                    exit();
                                }

                                function secure_data($data){
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);

                                    return $data;
                                }
                            ?>


                                <?php
                                // require_once('../../../Controlador/Conexion_DB/config.php');

                                // // Verificar si se ha enviado el formulario
                                // if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Enviar'])) {
                                //     // Recoger los datos del formulario
                                //     $idUsuario = $_GET['id'];
                                //     $idLocalidad = secure_data($_GET['idLocalidad']);
                                //     $nombre = secure_data($_GET['nombre']);
                                //     $apellidos = secure_data($_GET['apellidos']);
                                //     $DNI = secure_data($_GET['DNI']);
                                //     $nombreUsuario = secure_data($_GET['nombreUsuario']);
                                //     $contrasena = secure_data($_GET['contrasena']);
                                //     $tipo = secure_data($_GET['tipo']);
                                //     $localidad = secure_data($_GET['localidad']);
                                //     $provincia = secure_data($_GET['provincia']);
                                //     $calle = secure_data($_GET['calle']);
                                //     $CP = secure_data($_GET['CP']);

                                //     // Validar el formato del DNI con una expresión regular
                                //     if (!preg_match('/^[0-9]{8}[A-Za-z]$/', $DNI)) {
                                //         echo "<script>
                                //                 Swal.fire({
                                //                     icon: 'error',
                                //                     title: 'Error de validación',
                                //                     text: 'El formato del DNI no es válido. Ejemplo válido: 12345678A',
                                //                     showConfirmButton: false,
                                //                     timer: 1500
                                //                 });
                                //               </script>";
                                //     } elseif ($tipo !== 'admin' && $tipo !== 'operario') {
                                //         // Validar que el tipo sea 'admin' o 'operario'
                                //         echo "<script>
                                //                 Swal.fire({
                                //                     icon: 'error',
                                //                     title: 'Error de validación',
                                //                     text: 'El tipo debe ser \"admin\" o \"operario\"',
                                //                     showConfirmButton: false,
                                //                     timer: 1500
                                //                 });
                                //               </script>";
                                //     } elseif (empty($nombre) || empty($apellidos) || empty($DNI) || empty($nombreUsuario) || empty($contrasena) || empty($tipo) || empty($localidad) || empty($provincia) || empty($calle) || empty($CP)) {
                                //         // Validar que todos los campos estén llenos
                                //         echo "<script>
                                //                 Swal.fire({
                                //                     icon: 'error',
                                //                     title: 'Error de validación',
                                //                     text: 'Todos los campos son obligatorios',
                                //                     showConfirmButton: false,
                                //                     timer: 1500
                                //                 });
                                //               </script>";
                                //     } else {
                                //         // Consultar la localidad correspondiente
                                //         $stmtLocalidad = $connectDB->prepare('SELECT nombre FROM localidad WHERE idLocalidad = :idLocalidad');
                                //         $stmtLocalidad->bindParam(':idLocalidad', $idLocalidad);
                                //         $stmtLocalidad->execute();
                                //         $localidadDB = $stmtLocalidad->fetch(PDO::FETCH_ASSOC);

                                //         // Consultar la provincia correspondiente
                                //         $stmtProvincia = $connectDB->prepare('SELECT nombre FROM provincia WHERE idProvincia = :idProvincia');
                                //         $stmtProvincia->bindParam(':idProvincia', $idProvincia);
                                //         $stmtProvincia->execute();
                                //         $provinciaDB = $stmtProvincia->fetch(PDO::FETCH_ASSOC);

                                //         // Validar que localidad coincida
                                //         if ($localidad !== $localidadDB['nombre']) {
                                //             echo "<script>
                                //                     Swal.fire({
                                //                         icon: 'error',
                                //                         title: 'Error de validación',
                                //                         text: 'La localidad no coincide con el registro correspondiente',
                                //                         showConfirmButton: false,
                                //                         timer: 1500
                                //                     });
                                //                   </script>";
                                //         } elseif ($provincia !== $provinciaDB['nombre']) {
                                //             // Validar que provincia coincida
                                //             echo "<script>
                                //                     Swal.fire({
                                //                         icon: 'error',
                                //                         title: 'Error de validación',
                                //                         text: 'La provincia no coincide con el registro correspondiente',
                                //                         showConfirmButton: false,
                                //                         timer: 1500
                                //                     });
                                //                   </script>";
                                //         } else {
                                //             // Construir la consulta SQL
                                //             $sql = 'UPDATE usuarios SET 
                                //                     idLocalidad = COALESCE(:idLocalidad, idLocalidad),
                                //                     nombre = COALESCE(:nombre, nombre),
                                //                     apellidos = COALESCE(:apellidos, apellidos),
                                //                     DNI = COALESCE(:DNI, DNI),
                                //                     nombreUsuario = COALESCE(:nombreUsuario, nombreUsuario),
                                //                     contrasena = COALESCE(:contrasena, contrasena),
                                //                     tipo = COALESCE(:tipo, tipo),
                                //                     localidad = COALESCE(:localidad, localidad),
                                //                     provincia = COALESCE(:provincia, provincia),
                                //                     calle = COALESCE(:calle, calle),
                                //                     CP = COALESCE(:CP, CP)
                                //                     WHERE idUsuario = :idUsuario';

                                //             $stmt = $connectDB->prepare($sql);

                                //             $stmt->bindParam(':idUsuario', $idUsuario);
                                //             $stmt->bindParam(':idLocalidad', $idLocalidad);
                                //             $stmt->bindParam(':nombre', $nombre);
                                //             $stmt->bindParam(':apellidos', $apellidos);
                                //             $stmt->bindParam(':DNI', $DNI);
                                //             $stmt->bindParam(':nombreUsuario', $nombreUsuario);
                                //             $stmt->bindParam(':contrasena', $contrasena);
                                //             $stmt->bindParam(':tipo', $tipo);
                                //             $stmt->bindParam(':localidad', $localidad);
                                //             $stmt->bindParam(':provincia', $provincia);
                                //             $stmt->bindParam(':calle', $calle);
                                //             $stmt->bindParam(':CP', $CP);

                                //             $stmt->execute();

                                //             // Mostrar SweetAlert2 solo cuando se presiona "Enviar"
                                //             echo "<script>
                                //                     Swal.fire({
                                //                         icon: 'success',
                                //                         title: '¡Actualizado con éxito!',
                                //                         showConfirmButton: false,
                                //                         timer: 1500
                                //                     });

                                //                     // Desactivar el envío del formulario al recargar la página
                                //                     window.onload = function() {
                                //                         if (window.history.replaceState) {
                                //                             window.history.replaceState(null, null, window.location.href);
                                //                         }
                                //                     };
                                //                 </script>";
                                //         }
                                //     }
                                // }

                                // $idUsuario = $_GET['id'];

                                // $stmt = $connectDB->prepare('SELECT * FROM usuarios WHERE idUsuario = :idUsuario');
                                // $stmt->bindParam(':idUsuario', $idUsuario);
                                // $stmt->execute();
                                // $usuarioActual = $stmt->fetch(PDO::FETCH_ASSOC);

                                // if (!$usuarioActual) {
                                //     echo "Usuario no encontrado.";
                                //     exit();
                                // }

                                // function secure_data($data){
                                //     $data = trim($data);
                                //     $data = stripslashes($data);
                                //     $data = htmlspecialchars($data);

                                //     return $data;
                                // }
                                ?>

                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Editar Usuario</h4>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Usuario a modificar
                                <br>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idUsuario</th>
                                            <th>idLocalidad</th>
                                            <th>nombre</th>
                                            <th>apellidos</th>
                                            <th>DNI</th>
                                            <th>nombreUsuario</th>
                                            <th>password</th>
                                            <th>tipo</th>
                                            
                                            <th>calle</th>
                                            <th>CP</th>
                                            <th>ACCIONES</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    

                                        <tr>
                                            <td>
                                                <?php echo $usuarioActual['idUsuario']; ?> </td>
                                                <td><?php  echo $usuarioActual['idLocalidad']; ?> </td>
                                                <td><?php  echo $usuarioActual['nombre']; ?> </td>
                                                <td><?php  echo $usuarioActual['apellidos']; ?> </td>
                                                <td><?php  echo $usuarioActual['DNI']; ?> </td>
                                                <td><?php  echo $usuarioActual['nombreUsuario']; ?> </td>
                                                <td><?php  echo $usuarioActual['contrasena']; ?> </td>
                                                <td><?php  echo $usuarioActual['tipo']; ?> </td>
                                                
                                                <td><?php  echo $usuarioActual['calle']; ?> </td>
                                                <td><?php  echo $usuarioActual['CP']; ?> </td>
                                                
                                                <td>
                                                <?php
                                                echo '<a href="editarUsuario.php?id='.$usuarioActual['idUsuario'].'">' ;
                                                echo '<i class="fa-solid fa-pen-to-square"></i>';
                                                echo '</a>';
                                                echo ' | ';
                                                echo '<a href="deleteUsuario.php?id='.$usuarioActual['idUsuario'].'">' ;
                                                echo '<i class="fa-solid fa-trash"></i>';
                                                echo '</a>';

                                                ?>
                                                <!-- <a name="editar" id="" class="btn btn-primary" href="editarUsuario.php" role="button">Editar</a>
                                                <a name="eliminar" id="" class="btn btn-danger " href="indexUsuario.php" role="button">Eliminar</a> -->
                                            </td>
                                        </tr>

                                    

                                       
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>               
                        
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                



                            <h2>Formulario de Edición de Usuario</h2>



                            

                            <form action="" method="get" >



                            <div class="mb-3">
                                    <label for="idUsuario" class="form-label">ID USUARIO</label>
                                    <input class="form-control col-4" type="text" name="id" value="<?php echo $usuarioActual['idUsuario']; ?>" readonly>
                            </div>

                                
                            <div class="mb-3">
                                <label for="idLocalidad" class="form-label">ID LOCALIDAD</label>
                                <select class="form-select" name="idLocalidad" id="idLocalidad" aria-describedby="helpId">
                                    <?php
                                        // Consultar todas las idLocalidad de la tabla localidad
                                        $stmtLocalidades = $connectDB->query('SELECT idLocalidad FROM localidad');
                                        $localidades = $stmtLocalidades->fetchAll(PDO::FETCH_COLUMN);

                                        // Iterar sobre los resultados y crear opciones para el select
                                        foreach ($localidades as $localidad) {
                                            // Verificar si es la opción seleccionada (puedes comparar con el valor del registro)
                                            $selected = ($localidad == $valorDelRegistro) ? "selected" : "";

                                            echo "<option value=\"$localidad\" $selected>$localidad</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control col-4" type="text" id="nombre" name="nombre" value="<?php echo $usuarioActual['nombre']; ?>">
                            </div>

                            <div class="mb-3">
                            <label for="apellidos">Apellidos:</label>
                                <input class="form-control col-4" type="text" id="apellidos" name="apellidos" value="<?php echo $usuarioActual['apellidos']; ?>">
                            </div>
                            <div class="mb-3">
                            <label for="DNI">DNI:</label>
                                <input class="form-control col-4" type="text" id="DNI" name="DNI" value="<?php echo $usuarioActual['DNI']; ?>">
                            </div>
                            <div class="mb-3">
                            <label for="nombreUsuario">Nombre de Usuario:</label>
                                <input class="form-control col-4" type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo $usuarioActual['nombreUsuario']; ?>">
                            </div>
                            <div class="mb-3">
                            <label for="contrasena">Contraseña:</label>
                                <input class="form-control col-4" type="password" id="contrasena" name="contrasena" value="<?php echo $usuarioActual['contrasena']; ?>">
                            </div>


                            <div class="mb-3">
                            <label for="tipo">Tipo:</label>
                                <input class="form-control col-4" type="text" id="tipo" name="tipo" value="<?php echo $usuarioActual['tipo']; ?>">
                            </div>

                           

                    
                            <div class="mb-3">
                            <label for="calle">Calle:</label>
                                <input class="form-control col-4" type="text" id="calle" name="calle" value="<?php echo $usuarioActual['calle']; ?>">
                            </div>
                            <div class="mb-3">
                            <label for="CP">Código Postal:</label>
                                <input class="form-control col-4" type="text" id="CP" name="CP" value="<?php echo $usuarioActual['CP']; ?>">
                            </div>
                            
                               

                              


                               


                                <input type="submit" class="btn btn-success" name="Enviar" value="Actualizar">
                                <a href="indexUsuario.php"><button class="btn btn-primary" type="button">Volver</button></a>

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
