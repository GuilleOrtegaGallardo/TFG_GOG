<?php 

session_start();

if (!empty($_POST['Enviar'])) {
    if (!empty($_POST['nombreUsuario']) && !empty($_POST['passwordUsuario'])) {
        $nombreUsuario = $_POST['nombreUsuario'];
        $passwordUsuario = $_POST['passwordUsuario'];

        $sql = $connectDB->query("SELECT * FROM usuarios WHERE nombreUsuario='$nombreUsuario' AND contrasena='$passwordUsuario'");
        if ($datos = $sql->fetchObject()) {
            $_SESSION["idUsuario"] = $datos->idUsuario;
            $_SESSION["idLocalidad"] = $datos->idLocalidad;
            $_SESSION["nombre"] = $datos->nombre;
            $_SESSION["apellidos"] = $datos->apellidos;
            $_SESSION["nombreUsuario"] = $datos->nombreUsuario;
            $_SESSION["contrasena"] = $datos->contrasena;
            $_SESSION["tipo"] = $datos->tipo;
            $_SESSION["localidad"] = $datos->localidad;
            $_SESSION["provincia"] = $datos->provincia;
            $_SESSION["calle"] = $datos->calle;
            $_SESSION["CP"] = $datos->CP;

            header("Location: ../../index.php");
        } else {
            echo "<script>
                    Swal.fire({
                      icon: 'error',
                      title: 'Acceso Denegado',
                      text: 'Las credenciales ingresadas son incorrectas.'
                    });
                 </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Campos vacíos',
                  text: 'Por favor, completa todos los campos.'
                });
             </script>";
    }
}
?>
