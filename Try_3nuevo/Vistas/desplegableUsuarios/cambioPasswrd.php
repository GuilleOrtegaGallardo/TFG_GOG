<?php 

session_start();

if (empty($_SESSION["idUsuario"])) {
    
    header("Location: ../../vistas/logg/login.php");
}

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed" style="background:blue;">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../../index.php">Gestión de Laboratorio</a>
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
                        
                        
                        <li><a class="dropdown-item" href="../../Vistas/desplegableUsuarios/cambioPasswrd.php">Cambio de Passwrd</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logg/logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../../index.php">
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
                                    
                                        <a class="nav-link" href="../../Vistas/Manuales/panelAyuda.php"><i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i> &nbsp; Panel de Ayuda</a>
                                        
                                        
                                    


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
                                        <?php  if( $_SESSION["tipo"] == "admin") {  ?> 
                                            <a class="nav-link" href="../../Vistas/acciones/accionesUsuarios/indexUsuario.php"> <i class="fa-solid fa-user" style="color: #ffffff;"></i>&nbsp;Usuarios</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesReactores/indexReactor.php"><i class="fa-solid fa-industry" style="color: #ffffff;"></i>&nbsp; Reactores</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesProveedores/indexProveedor.php"> <i class="fa-solid fa-boxes-packing" style="color: #ffffff;"></i>&nbsp;Proveedores</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesLinea/indexLinea.php"><i class="fa-solid fa-l" style="color: #ffffff;"></i>&nbsp; Linea Pr </a>
                                            <?php  }  ?>

                                            <a class="nav-link" href="../../Vistas/acciones/accionesPedidos/indexPedido.php"><i class="fa-solid fa-truck-ramp-box" style="color: #ffffff;"></i>&nbsp;Pedidos</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesBolsas/indexBolsa.php"><i class="fa-solid fa-sack-xmark" style="color: #ffffff;"></i>&nbsp;Bolsas</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesProcesos/indexProceso.php"> <i class="fa-solid fa-spinner" style="color: #ffffff;"></i> &nbsp;Procesos</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesProductos/indexProducto.php"><i class="fa-brands fa-product-hunt" style="color: #ffffff;"></i>&nbsp;Productos</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesProductos/indexProducto.php"><i class="fa-brands fa-product-hunt" style="color: #ffffff;"></i>&nbsp;Productos</a>
                                            <a class="nav-link" href="../../Vistas/acciones/accionesDepositos/indexDeposito.php"><i class="fa-solid fa-prescription-bottle" style="color: #ffffff;"></i>&nbsp;Depositos</a>
                                            
                                            
                                        </nav>
                                    </div>
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>&nbsp; Etiquetas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../../Vistas/codigoBarras/views/index.php"><i class="fa-solid fa-sack-xmark" style="color: #ffffff;"></i>&nbsp; Bolsa</a>
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
            <div id="layoutSidenav_content">
                <main>
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">

                                    


                                    


                                    <?php

                                    // // Comparacion entre hash  compara el texto intorducido para crear 
                                    // //el hash que viene de bd y el texto introducido para crear el hash que introducimos manualmente en el campo contrasena
                                    //     require_once('../../Controlador/Conexion_DB/config.php');

                                    //     // Verificar si se ha enviado el formulario
                                    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    //         // Recoger los datos del formulario
                                    //         $nombreUsuario = secure_data($_POST['nombreUsuario']);
                                    //         $contrasenaAntigua = secure_data($_POST['contrasenaAntigua']);
                                    //         $contrasenaNueva = secure_data($_POST['contrasenaNueva']);

                                    //         // Validar que todos los campos estén llenos
                                    //         if (empty($nombreUsuario) || empty($contrasenaAntigua) || empty($contrasenaNueva)) {
                                    //             echo "Todos los campos son obligatorios";
                                    //         } else {
                                    //             // Obtener el usuario por nombre de usuario
                                    //             $stmtGetUser = $connectDB->prepare('SELECT * FROM usuarios WHERE nombreUsuario = :nombreUsuario');
                                    //             $stmtGetUser->bindParam(':nombreUsuario', $nombreUsuario);
                                    //             $stmtGetUser->execute();
                                    //             $userData = $stmtGetUser->fetch(PDO::FETCH_ASSOC);

                                    //             // Verificar si se encontró un usuario
                                    //             if (!$userData) {
                                    //                 echo "Nombre de usuario no encontrado";
                                    //             } else {
                                    //                 // Verificar la antigua contraseña antes de actualizar
                                    //                 // Comparar directamente con la contraseña almacenada, sin usar password_verify
                                    //                 if ($contrasenaAntigua === $userData['contrasena']) {
                                    //                     // Generar un nuevo hash para la contraseña nueva
                                    //                     $hashedPassword = password_hash($contrasenaNueva, PASSWORD_DEFAULT);

                                    //                     // Construir la consulta SQL
                                    //                     $sql = 'UPDATE usuarios SET 
                                    //                             contrasena = :contrasena
                                    //                             WHERE idUsuario = :idUsuario';

                                    //                     $stmt = $connectDB->prepare($sql);

                                    //                     $stmt->bindParam(':idUsuario', $userData['idUsuario']);
                                    //                     $stmt->bindParam(':contrasena', $hashedPassword);

                                    //                     if ($stmt->execute()) {
                                    //                         echo "Contraseña cambiada con éxito";
                                    //                     } else {
                                    //                         echo "Error al actualizar la contraseña";
                                    //                     }
                                    //                 } else {
                                    //                     echo "La antigua contraseña no es válida";
                                    //                 }
                                    //             }
                                    //         }
                                    //     }

                                    //     function secure_data($data)
                                    //     {
                                    //         $data = trim($data);
                                    //         $data = stripslashes($data);
                                    //         $data = htmlspecialchars($data);

                                    //         return $data;
                                    //     }
                                        ?>




                <?php

                // // ESTA ES LA BUENA CON PASSWORD CODIFICADA CON HASH
                // require_once('../../Controlador/Conexion_DB/config.php');

                // // Verificar si se ha enviado el formulario
                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     // Recoger los datos del formulario
                //     $nombreUsuario = secure_data($_POST['nombreUsuario']);
                //     $contrasenaAntigua = secure_data($_POST['contrasenaAntigua']);
                //     $contrasenaNueva = secure_data($_POST['contrasenaNueva']);

                //     // Validar que todos los campos estén llenos
                //     if (empty($nombreUsuario) || empty($contrasenaAntigua) || empty($contrasenaNueva)) {
                //         echo "Todos los campos son obligatorios";
                //     } else {
                //         // Obtener el usuario por nombre de usuario
                //         $stmtGetUser = $connectDB->prepare('SELECT * FROM usuarios WHERE nombreUsuario = :nombreUsuario');
                //         $stmtGetUser->bindParam(':nombreUsuario', $nombreUsuario);
                //         $stmtGetUser->execute();
                //         $userData = $stmtGetUser->fetch(PDO::FETCH_ASSOC);

                //         // Verificar si se encontró un usuario
                //         if (!$userData) {
                //             echo "Nombre de usuario no encontrado";
                //         } else {
                //             // Verificar la antigua contraseña antes de actualizar
                //             if ($contrasenaAntigua === $userData['contrasena']) {
                //                 // Construir la consulta SQL
                //                 $sql = 'UPDATE usuarios SET 
                //                         contrasena = :contrasena
                //                         WHERE idUsuario = :idUsuario';

                //                 $hashedPassword = password_hash($contrasenaNueva, PASSWORD_DEFAULT);

                //                 $stmt = $connectDB->prepare($sql);

                //                 $stmt->bindParam(':idUsuario', $userData['idUsuario']);
                //                 $stmt->bindParam(':contrasena', $hashedPassword);

                //                 $stmt->execute();

                //                 echo "Contraseña cambiada con éxito";
                //             } else {
                //                 echo "La antigua contraseña no es válida";
                //             }
                //         }
                //     }
                // }

                // function secure_data($data)
                // {
                //     $data = trim($data);
                //     $data = stripslashes($data);
                //     $data = htmlspecialchars($data);

                //     return $data;
                // }
                ?>


                <?php

                //SIN password_hash
                require_once('../../Controlador/Conexion_DB/config.php');

                // Verificar si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Recoger los datos del formulario
                    $nombreUsuario = secure_data($_POST['nombreUsuario']);
                    $contrasenaAntigua = secure_data($_POST['contrasenaAntigua']);
                    $contrasenaNueva = secure_data($_POST['contrasenaNueva']);

                    // Validar que todos los campos estén llenos
                    if (empty($nombreUsuario) || empty($contrasenaAntigua) || empty($contrasenaNueva)) {
                        echo "Todos los campos son obligatorios";
                    } else {
                        // Obtener el usuario por nombre de usuario
                        $stmtGetUser = $connectDB->prepare('SELECT * FROM usuarios WHERE nombreUsuario = :nombreUsuario');
                        $stmtGetUser->bindParam(':nombreUsuario', $nombreUsuario);
                        $stmtGetUser->execute();
                        $userData = $stmtGetUser->fetch(PDO::FETCH_ASSOC);

                        // Verificar si se encontró un usuario
                        if (!$userData) {
                            echo "Nombre de usuario no encontrado";
                        } else {
                            // Verificar la antigua contraseña antes de actualizar
                            if ($contrasenaAntigua === $userData['contrasena']) {
                                // Construir la consulta SQL
                                $sql = 'UPDATE usuarios SET 
                                        contrasena = :contrasena
                                        WHERE idUsuario = :idUsuario';

                                $stmt = $connectDB->prepare($sql);

                                $stmt->bindParam(':idUsuario', $userData['idUsuario']);
                                $stmt->bindParam(':contrasena', $contrasenaNueva);

                                $stmt->execute();

                                echo "Contraseña cambiada con éxito";
                            } else {
                                echo "La antigua contraseña no es válida";
                            }
                        }
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









                                        <div class="small mb-3 text-muted">Introduce tu NombreUsuario y Cambia tu contraseña.</div>
                                            <form action="cambioPasswrd.php" method="post">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputnombreUsuario" type="text" name="nombreUsuario" placeholder="Nombre Usuario" required />
                                                    <label for="inputnombreUsuario">Nombre Usuario</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputOldPasswrd" type="password" name="contrasenaAntigua" placeholder="Old Password" required />
                                                    <label for="inputOldPasswrd">Old Password</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputNewPasswrd" type="password" name="contrasenaNueva" placeholder="New Password" required />
                                                    <label for="inputNewPasswrd">New Password</label>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card-footer text-center py-3">
                                            <div class="small"></div>
                                        </div>
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
                                <a href="../../Vistas/Politicas/politicasPrivacidad.php">Privacy Policy</a>
                                &middot;
                                <a href="../../Vistas/Politicas/politicasUso.php">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/js/scripts.js"></script>
    </body>
</html>
