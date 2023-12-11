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

                        <h2>PEDIDOS</h2>

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
                            $idPedido = $_GET['id'];
                            $idProveedor = secure_data($_GET['idProveedor']);
                            $idProducto = secure_data($_GET['idProducto']);
                            $idUsuario = secure_data($_GET['idUsuario']);
                            $cantidad = secure_data($_GET['cantidad']);
                            $precioProducto = secure_data($_GET['precioProducto']);
                            $fechaPedido = secure_data($_GET['fechaPedido']);
                            $servido = secure_data($_GET['servido']);

                            // Validar que todos los campos estén llenos
                            if (empty($idProveedor) || empty($idProducto) || empty($idUsuario) || empty($cantidad) || empty($precioProducto) || empty($fechaPedido) || empty($servido)) {
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
                                // Validar campos con expresiones regulares
                                if (!preg_match('/^[01]$/', $servido)) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'El campo \"servido\" solo puede ser 0 o 1.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                } elseif (!is_numeric($cantidad) || $cantidad < 0) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'El campo \"cantidad\" debe ser un número positivo.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                } elseif (!is_numeric($precioProducto) || $precioProducto < 0) {
                                    echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error de validación',
                                                text: 'El campo \"precioProducto\" debe ser un número positivo.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        </script>";
                                } else {
                                    // Construir la consulta SQL
                                    $sql = 'UPDATE pedido SET 
                                            idProveedor = COALESCE(:idProveedor, idProveedor),
                                            idProducto = COALESCE(:idProducto, idProducto),
                                            idUsuario = COALESCE(:idUsuario, idUsuario),
                                            cantidad = COALESCE(:cantidad, cantidad),
                                            precioProducto = COALESCE(:precioProducto, precioProducto),
                                            fechaPedido = COALESCE(:fechaPedido, fechaPedido),
                                            servido = COALESCE(:servido, servido)
                                            WHERE idPedido = :idPedido';

                                    $stmt = $connectDB->prepare($sql);

                                    $stmt->bindParam(':idPedido', $idPedido);
                                    $stmt->bindParam(':idProveedor', $idProveedor);
                                    $stmt->bindParam(':idProducto', $idProducto);
                                    $stmt->bindParam(':idUsuario', $idUsuario);
                                    $stmt->bindParam(':cantidad', $cantidad);
                                    $stmt->bindParam(':precioProducto', $precioProducto);
                                    $stmt->bindParam(':fechaPedido', $fechaPedido);
                                    $stmt->bindParam(':servido', $servido);

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

                        $idPedido = $_GET['id'];

                        $stmt = $connectDB->prepare('SELECT * FROM pedido WHERE idPedido = :idPedido');
                        $stmt->bindParam(':idPedido', $idPedido);
                        $stmt->execute();
                        $pedidoActual = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (!$pedidoActual) {
                            echo "Pedido no encontrado.";
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
                        <h4 class="mt-4">Editar pedido</h4>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pedido a modificar
                                <br>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idPedido</th>
                                            <th>idProveedor</th>
                                            <th>idProducto</th>
                                            <th>idUsuario</th>
                                            <th>cantidad</th>
                                            <th>precioProducto</th>
                                            <th>fechaPedido</th>
                                            <th>servido</th>
                                            <th>ACCIONESS</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    <tr>
                                        <td><?php echo $pedidoActual['idPedido']; ?></td>
                                        <td><?php echo $pedidoActual['idProveedor']; ?></td>
                                        <td><?php echo $pedidoActual['idProducto']; ?></td>
                                        <td><?php echo $pedidoActual['idUsuario']; ?></td>
                                        <td><?php echo $pedidoActual['cantidad']; ?></td>
                                        <td><?php echo $pedidoActual['precioProducto']; ?></td>
                                        <td><?php echo $pedidoActual['fechaPedido']; ?></td>
                                        <td><?php echo $pedidoActual['servido']; ?></td>

                                        <td>
                                            <?php
                                            echo '<a href="editarPedido.php?id=' . $pedidoActual['idPedido'] . '">';
                                            echo '<i class="fa-solid fa-pen-to-square"></i>';
                                            echo '</a>';
                                            echo ' | ';
                                            echo '<a href="deletePedido.php?id=' . $pedidoActual['idPedido'] . '">';
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
                                
                            

                            <h2>Formulario de Edición de Pedido</h2>

                                <form action="" method="get">

                                    <div class="mb-3">
                                        <label for="idPedido" class="form-label">ID Pedido</label>
                                        <input class="form-control col-4" type="text" name="id" value="<?php echo $pedidoActual['idPedido']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="idProveedor" class="form-label">ID PROVEEDOR</label>
                                        <select class="form-select" name="idProveedor" id="idProveedor" aria-describedby="helpId">
                                            <?php
                                                // Consultar todas las idProveedor de la tabla proveedor
                                                $stmtProveedores = $connectDB->query('SELECT idProveedor FROM proveedor');
                                                $proveedores = $stmtProveedores->fetchAll(PDO::FETCH_COLUMN);

                                                // Iterar sobre los resultados y crear opciones para el select
                                                foreach ($proveedores as $proveedor) {
                                                    echo "<option value=\"$proveedor\">$proveedor</option>";
                                                }
                                            ?>
                                        </select>
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
                                        <label for="cantidad">Cantidad:</label>
                                        <input class="form-control col-4" type="text" id="cantidad" name="cantidad" value="<?php echo $pedidoActual['cantidad']; ?>" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="precioProducto">Precio del Producto:</label>
                                        <input class="form-control col-4" type="text" id="precioProducto" name="precioProducto" value="<?php echo $pedidoActual['precioProducto']; ?>" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="fechaPedido">Fecha de Pedido:</label>
                                        <input class="form-control col-4" type="date" id="fechaPedido" name="fechaPedido" value="<?php echo $pedidoActual['fechaPedido']; ?>" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="servido" class="form-label">SERVIDO</label>
                                        <select class="form-select" name="servido" id="servido" aria-describedby="helpId">
                                            <option value="1">1</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                

                                    <input type="submit" class="btn btn-success" name="Enviar" value="Actualizar">
                                    <a href="indexPedido.php"><button class="btn btn-primary" type="button">Volver</button></a>

                                    
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
