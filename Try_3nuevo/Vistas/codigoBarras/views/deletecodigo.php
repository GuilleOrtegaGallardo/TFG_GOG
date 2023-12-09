


<!DOCTYPE html>
<html lang="en">
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="../js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/JsBarcode.all.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
require_once('../../../Controlador/Conexion_DB/config.php');

if (isset($_GET['id'])) {
    $id_codigo_barras = secure_data($_GET['id']);

    try {
        // Verifica la conexión a la base de datos
        if (!$connectDB) {
            throw new Exception("Error en la conexión a la base de datos.");
        }

        // Prepara y ejecuta la consulta de eliminación
        $stmt = $connectDB->prepare('DELETE FROM codigobarras WHERE idCodigoBarras=:id');
        $stmt->bindValue(':id', $id_codigo_barras);
        $stmt->execute();

        // Verifica si se eliminó correctamente algún registro
        if ($stmt->rowCount() > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Borrado exitoso',
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 1500);
            </script>";
        } else {
            throw new Exception("No se encontró ningún registro para borrar.");
        }
    } catch (Exception $e) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al borrar',
                text: '{$e->getMessage()}',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';  // Reemplaza 'index.php' con la página correcta
            });
        </script>";
    }
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error al borrar',
            text: 'Hubo un problema al intentar borrar el código de barras',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = 'index.php';  // Reemplaza 'index.php' con la página correcta
        });
    </script>";
}

function secure_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>
<h5>delete</h5>
</body>
</html>


