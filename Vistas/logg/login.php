<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/estilosInicio.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">


                                    <?php 
                                    
                                    include("../../Controlador/Conexion_DB/config.php");
                                    include("../../Controlador/controladorLoggin.php");
                                    // include("controladorLoggin.php");

                                     ?>

                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nombreUsuario" id="inputNombreUsuario" type="text" placeholder="" />
                                            <label for="inputEmail">Nombre de Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="passwordUsuario" id="inputPasswordUsuario" type="password" placeholder="" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="btn btn-success" name="Enviar" id="inputEnviar" type="submit" placeholder="" />
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                           
                                        </div>
                                        
                                    </form>


                                </div>
                                <div class="card-footer text-center py-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Gestión de Laboratorio</div>
                        <div>
                            <a href="../../Vistas/Politicas/politicasPrivacidad.php">Privacy Policy</a> &middot;
                            <a href="../../Vistas/Politicas/politicasUso.php">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>