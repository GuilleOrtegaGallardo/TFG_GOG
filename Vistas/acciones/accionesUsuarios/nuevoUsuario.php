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

                        <h2>USUARIOS</h2>

                        <br/>
                        
                        <div class="container-fluid px-4">
                        <h4 class="mt-4">Crear Usuario</h4>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                

                                <?php
                                    require_once('../../../Controlador/Conexion_DB/config.php');

                                    // Verificar si el formulario ha sido enviado
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Verificar si todos los campos del formulario están configurados
                                        if (
                                            isset($_POST['idUsuario']) && isset($_POST['idLocalidad']) && isset($_POST['nombre']) &&
                                            isset($_POST['apellidos']) && isset($_POST['DNI']) && isset($_POST['nombreUsuario']) &&
                                            isset($_POST['contrasena']) && isset($_POST['tipo']) && isset($_POST['calle']) && isset($_POST['CP'])
                                        ) {
                                            // Recoger los datos del formulario
                                            $idUsuario = secure_data($_POST['idUsuario']);
                                            $idLocalidad = secure_data($_POST['idLocalidad']);
                                            $nombre = secure_data($_POST['nombre']);
                                            $apellidos = secure_data($_POST['apellidos']);
                                            $DNI = secure_data($_POST['DNI']);
                                            $nombreUsuario = secure_data($_POST['nombreUsuario']);
                                            $contrasena = secure_data($_POST['contrasena']);
                                            $tipo = secure_data($_POST['tipo']);
                                            
                                            $calle = secure_data($_POST['calle']);
                                            $CP = secure_data($_POST['CP']);

                                            // Verificar si el idUsuario ya existe en la base de datos
                                            $stmtCheck = $connectDB->prepare('SELECT idUsuario FROM usuarios WHERE idUsuario = :idUsuario');
                                            $stmtCheck->bindParam(':idUsuario', $idUsuario);
                                            $stmtCheck->execute();

                                            if ($stmtCheck->rowCount() > 0) {
                                                // Mostrar SweetAlert2 de error si el idUsuario ya existe
                                                echo "<script>
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error al insertar',
                                                            text: 'El ID de Usuario ya existe en la base de datos',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                    </script>";
                                            } else {
                                                // Construir la consulta SQL
                                                $sql = 'INSERT INTO usuarios (idUsuario, idLocalidad, nombre, apellidos, DNI, nombreUsuario, contrasena, tipo, calle, CP) 
                                                        VALUES (:idUsuario, :idLocalidad, :nombre, :apellidos, :DNI, :nombreUsuario, :contrasena, :tipo, :calle, :CP)';

                                                // Preparar la consulta
                                                $stmt = $connectDB->prepare($sql);

                                                // Bindear los parámetros
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
                                                            window.location.href = 'indexUsuario.php';
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



                                <h2>Formulario para Crear</h2>
                                    <form action="" method="post">

                                        <div class="mb-3">
                                            <label for="idUsuario">ID de Usuario:</label>
                                            <input class="form-control" type="text" id="idUsuario" name="idUsuario" value="<?php echo obtenerSiguienteIdUsuario(); ?>" required readonly>
                                        </div>

                                        

                                            <?php
                                            function obtenerSiguienteIdUsuario()
                                            {
                                                global $connectDB; // Acceder a la variable de conexión en el ámbito global

                                                try {
                                                    // Obtener el último idUsuario de la tabla usuarios
                                                    $consultaUltimoId = "SELECT MAX(idUsuario) as ultimoId FROM usuarios";
                                                    $resultadoUltimoId = $connectDB->query($consultaUltimoId);
                                                    $filaUltimoId = $resultadoUltimoId->fetch(PDO::FETCH_ASSOC);
                                                    $ultimoId = $filaUltimoId['ultimoId'];

                                                    // Extraer la parte numérica del último ID y sumar 1
                                                    preg_match_all('/\d+/', $ultimoId, $matches);
                                                    $parteNumerica = (int)end($matches[0]);
                                                    $siguienteIdUsuario = $parteNumerica + 1;

                                                    // Formatear el nuevo ID con ceros a la izquierda y el prefijo "USUARIO"
                                                    $nuevoIdUsuario = sprintf("USU%04d", $siguienteIdUsuario);

                                                    return $nuevoIdUsuario;
                                                } catch (PDOException $e) {
                                                    // Manejar errores de la conexión PDO
                                                    echo "Error de conexión: " . $e->getMessage();
                                                }
                                            }
                                            ?>




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
                                            <input class="form-control" type="text" id="nombre" name="nombre" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="apellidos">Apellidos:</label>
                                            <input class="form-control" type="text" id="apellidos" name="apellidos" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="DNI">DNI:</label>
                                            <input class="form-control" type="text" id="DNI" name="DNI" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nombreUsuario">Nombre de Usuario:</label>
                                            <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="contrasena">Contraseña:</label>
                                            <input class="form-control" type="password" id="contrasena" name="contrasena" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo:</label>
                                            <select class="form-select" name="tipo" id="tipo" aria-describedby="helpId">
                                                <option value="admin">admin</option>
                                                <option value="operario">operario</option>
                                            </select>
                                        </div>

                          
                                        <div class="mb-3">
                                            <label for="calle">Calle:</label>
                                            <input class="form-control" type="text" id="calle" name="calle" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="CP">Código Postal:</label>
                                            <input class="form-control" type="text" id="CP" name="CP" required>
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