
<div class="modal fade" id="cod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Generar Codigo de Barras</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
	<form method="post" action="">

	

		<label for="codigoBarras">Código de barras:</label>
		<input class="form-control" name="codigoBarras" required type="text" id="codigoBarras" placeholder="Introduce el codigo de barras">

		<label for="nombre">Nombre:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre">

	

        <div class="mb-3">
    <label for="idBolsa" class="form-label">ID Bolsa asociada:</label>
    <select class="form-select" name="idBolsa" id="idBolsa" required>
        <?php
        // Establecer conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'labprueba2');

        // Verificar la conexión
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consultar todas las idBolsa de la tabla bolsa que no existen en la tabla codigobarras
        $consultaBolsas = "SELECT b.idBolsa FROM bolsa b LEFT JOIN codigobarras c ON b.idBolsa = c.idBolsa WHERE c.idBolsa IS NULL";
        $resultadoBolsas = mysqli_query($conexion, $consultaBolsas);

        // Verificar si se obtuvieron resultados
        if ($resultadoBolsas && mysqli_num_rows($resultadoBolsas) > 0) {
            // Iterar sobre los resultados y crear opciones para el select
            while ($filaBolsa = mysqli_fetch_assoc($resultadoBolsas)) {
                $idBolsa = $filaBolsa['idBolsa'];
                echo "<option value=\"$idBolsa\">$idBolsa</option>";
            }
        } else {
            echo "<option value=\"\">No hay bolsas disponibles</option>";
        }

        // Cerrar conexión a la base de datos
        mysqli_close($conexion);
        ?>
    </select>
</div>



        
		
		<label for="idCodigoBarras">idCodigoBarras:</label>
		<input class="form-control" name="idCodigoBarras" required type="number" id="idCodigoBarras" placeholder="Introduce el id del codigoBarras">

        <?php require("../includes/insertar.php");  ?>
    	
</body>
</html>


		<br>
		<input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="registrar">
		<a class="btn btn-danger" href="index.php">Cancelar</a>
	</form>
</div>
<!-- Asegúrate de tener jQuery cargado en tu página -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script src="../js/sweetalert2.all.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>