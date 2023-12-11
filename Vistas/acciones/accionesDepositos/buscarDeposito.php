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
                        <li class="breadcrumb-item active">PROYECTO LODOS <img style="width: 35px !important; height: 35px !important; padding:0px !important;" src="../../../assets/img/logoLODOS.PNG" alt="ss2"></li>
                        </ol>

                        <h2>DEPOSITOS</h2>

                        <br/>
                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Buscar Deposito</h4>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Resultado de la Busqueda
                                <br>
                                
                            </div>
                            <div class="card-body">
                            <?php
                                require_once('../../../Controlador/Conexion_DB/config.php');

                                // Recoger los datos del formulario
                                $idDeposito = $_POST['idDeposito'] ?? '';
                                $descripcion = $_POST['descripcion'] ?? '';
                                $limiteOcupacion = $_POST['limiteOcupacion'] ?? '';
                                $cantidadOcupada = $_POST['cantidadOcupada'] ?? '';
                                $porcentajeOcupacion = $_POST['porcentajeOcupacion'] ?? '';
                                $ubicacion = $_POST['ubicacion'] ?? '';

                                // Verificar si al menos un campo del formulario ha sido llenado
                                if (!empty($idDeposito) || !empty($descripcion) || !empty($limiteOcupacion) || !empty($cantidadOcupada) || !empty($porcentajeOcupacion) || !empty($ubicacion)) {

                                    // Construir la consulta SQL base
                                    $sql = 'SELECT * FROM deposito WHERE 1=1';

                                    // Añadir condiciones según los campos que hayan sido llenados en el formulario
                                    if (!empty($idDeposito)) {
                                        $sql .= ' AND idDeposito = :idDeposito';
                                    }

                                    if (!empty($descripcion)) {
                                        $sql .= ' AND descripcion = :descripcion';
                                    }

                                    if (!empty($limiteOcupacion)) {
                                        $sql .= ' AND limiteOcupacion = :limiteOcupacion';
                                    }

                                    if (!empty($cantidadOcupada)) {
                                        $sql .= ' AND cantidadOcupada = :cantidadOcupada';
                                    }

                                    if (!empty($porcentajeOcupacion)) {
                                        $sql .= ' AND porcentajeOcupacion = :porcentajeOcupacion';
                                    }

                                    if (!empty($ubicacion)) {
                                        $sql .= ' AND ubicacion = :ubicacion';
                                    }

                                    // Preparar la consulta
                                    $stmt = $connectDB->prepare($sql);

                                    // Bindear los parámetros según las condiciones establecidas
                                    if (!empty($idDeposito)) {
                                        $stmt->bindParam(':idDeposito', $idDeposito);
                                    }

                                    if (!empty($descripcion)) {
                                        $stmt->bindParam(':descripcion', $descripcion);
                                    }

                                    if (!empty($limiteOcupacion)) {
                                        $stmt->bindParam(':limiteOcupacion', $limiteOcupacion);
                                    }

                                    if (!empty($cantidadOcupada)) {
                                        $stmt->bindParam(':cantidadOcupada', $cantidadOcupada);
                                    }

                                    if (!empty($porcentajeOcupacion)) {
                                        $stmt->bindParam(':porcentajeOcupacion', $porcentajeOcupacion);
                                    }

                                    if (!empty($ubicacion)) {
                                        $stmt->bindParam(':ubicacion', $ubicacion);
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
                                                        <th>idDeposito</th>
                                                        <th>descripcion</th>
                                                        <th>limiteOcupacion</th>
                                                        <th>cantidadOcupada</th>
                                                        <th>porcentajeOcupacion</th>
                                                        <th>ubicacion</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                    
                                        // Iterar sobre los resultados y construir las filas de la tabla
                                        foreach ($resultados as $fila) {
                                            echo '<tr>
                                                    <td>' . $fila['idDeposito'] . '</td>
                                                    <td>' . $fila['descripcion'] . '</td>
                                                    <td>' . $fila['limiteOcupacion'] . '</td>
                                                    <td>' . $fila['cantidadOcupada'] . '</td>
                                                    <td>' . $fila['porcentajeOcupacion'] . '</td>
                                                    <td>' . $fila['ubicacion'] . '</td>
                                                    <td>
                                                        <a name="editar" id=""  href="editarDeposito.php?id=' . $fila['idDeposito'] . '"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a name="eliminar" id=""  href="deleteDeposito.php?id=' . $fila['idDeposito'] . '"><i class="fa-solid fa-trash"></i></a>
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
                                
                                <form action="buscarDeposito.php" method="post" enctype="multipart/form-data">
                                    
                                
                                    <div class="mb-3">
                                    <label for="idDeposito" class="form-label">ID DEPOSITO</label>
                                    <input type="text"
                                        class="form-control" name="idDeposito" id="idDeposito" aria-describedby="helpId" placeholder="ID DEPOSITO">
                                    </div>

                                    <div class="mb-3">
                                    <label for="descripcion" class="form-label">DESCRIPCION</label>
                                    <input type="text"
                                        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="DESCRIPCION">
                                    </div>

                                    <div class="mb-3">
                                    <label for="limiteOcupacion" class="form-label">LIMITE DE OCUPACION</label>
                                    <input type="text"
                                        class="form-control" name="limiteOcupacion" id="limiteOcupacion" aria-describedby="helpId" placeholder="LIMITE DE OCUPACION">
                                    </div>

                                    <div class="mb-3">
                                    <label for="cantidadOcupada" class="form-label">CANTIDAD OCUPADA</label>
                                    <input type="text"
                                        class="form-control" name="cantidadOcupada" id="cantidadOcupada" aria-describedby="helpId" placeholder="CANTIDAD OCUPADA">
                                    </div>

                                    <div class="mb-3">
                                    <label for="porcentajeOcupacion" class="form-label">PORCENTAJE OCUPACION</label>
                                    <input type="text"
                                        class="form-control" name="porcentajeOcupacion" id="porcentajeOcupacion" aria-describedby="helpId" placeholder="PORCENTAJE OCUPACION">
                                    </div>

                                    <div class="mb-3">
                                    <label for="ubicacion" class="form-label">UBICACION</label>
                                    <input type="text"
                                        class="form-control" name="ubicacion" id="ubicacion" aria-describedby="helpId" placeholder="">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">Realizar Busqueda</button>
                                    <a name="" id="" class="btn btn-primary" href="indexDeposito.php" role="button">Cancelar</a>

                                

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