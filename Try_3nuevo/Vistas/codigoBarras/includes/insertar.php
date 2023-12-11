


<?php
$conexion = mysqli_connect('localhost', 'root', '', 'labprueba2');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrar'])) {

    if (isset($_POST['nombre']) && isset($_POST['codigoBarras']) && isset($_POST['idBolsa']) && isset($_POST['idCodigoBarras'])) {
        $nombre = trim($_POST['nombre']);
        $codigo = trim($_POST['codigoBarras']);
        $idBolsa = trim($_POST['idBolsa']);
        $idCodigoBarras = trim($_POST['idCodigoBarras']);

        // Validar que idCodigoBarras sea un número consecutivo al último registro
        $consultaUltimoRegistro = "SELECT MAX(idCodigoBarras) as ultimoRegistro FROM codigobarras";
        $resultadoUltimoRegistro = mysqli_query($conexion, $consultaUltimoRegistro);
        $filaUltimoRegistro = mysqli_fetch_assoc($resultadoUltimoRegistro);
        $ultimoRegistro = (int)$filaUltimoRegistro['ultimoRegistro'];

        if ($idCodigoBarras != $ultimoRegistro + 1) {
            echo '<script>';
            echo 'Swal.fire("Error", "El idCodigoBarras debe ser un número consecutivo al último registro", "error");';
            echo '</script>';
            exit(); // Sale del script si la validación falla
        }

        // Resto del código de validación y operaciones
        $verificarBolsa = "SELECT * FROM bolsa WHERE idBolsa = '$idBolsa'";
        $resultadoBolsa = mysqli_query($conexion, $verificarBolsa);

        if (mysqli_num_rows($resultadoBolsa) == 0) {
            echo '<script>';
            echo 'Swal.fire("Error", "El idBolsa no existe en la tabla bolsa", "error");';
            echo '</script>';
        } else {
            $verificarBolsaEnCodigobarras = "SELECT * FROM codigobarras WHERE idBolsa = '$idBolsa'";
            $resultadoBolsaEnCodigobarras = mysqli_query($conexion, $verificarBolsaEnCodigobarras);

            if (mysqli_num_rows($resultadoBolsaEnCodigobarras) > 0) {
                echo '<script>';
                echo 'Swal.fire("Error", "El idBolsa ya existe en la tabla codigobarras", "error");';
                echo '</script>';
            } else {
                $verificarCodigoBarras = "SELECT * FROM codigobarras WHERE idCodigoBarras = '$idCodigoBarras'";
                $resultadoCodigoBarras = mysqli_query($conexion, $verificarCodigoBarras);

                if (mysqli_num_rows($resultadoCodigoBarras) > 0) {
                    echo '<script>';
                    echo 'Swal.fire("Error", "El idCodigoBarras ya existe en la tabla codigobarras", "error");';
                    echo '</script>';
                } else {
                    $verificarCodigo = "SELECT * FROM codigobarras WHERE codigoBarras = '$codigo'";
                    $resultadoCodigo = mysqli_query($conexion, $verificarCodigo);

                    if (mysqli_num_rows($resultadoCodigo) > 0) {
                        echo '<script>';
                        echo 'Swal.fire("Error", "El código de barras ya existe en la tabla codigobarras", "error");';
                        echo '</script>';
                    } else {
                        $consulta = "INSERT INTO codigobarras (idCodigoBarras, idBolsa, nombre, codigoBarras) VALUES ('$idCodigoBarras' ,'$idBolsa', '$nombre', '$codigo')";
                        $resultado = mysqli_query($conexion, $consulta);

                        if ($resultado) {
                            echo '<script>';
                            echo 'Swal.fire({
                                title: "Éxito",
                                text: "El registro fue guardado correctamente",
                                icon: "success"
                            }).then(() => {
                                window.location.href = window.location.href;
                            });';
                            echo '</script>';
                        } else {
                            echo '<script>';
                            echo 'Swal.fire("Error", "Error al guardar los datos", "error");';
                            echo '</script>';
                        }
                    }
                }
            }
        }

    } else {
        echo '<script>';
        echo 'Swal.fire("Error", "No hay datos para procesar", "error");';
        echo '</script>';
    }
}

?>




