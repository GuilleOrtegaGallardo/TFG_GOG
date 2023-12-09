
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="../js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/JsBarcode.all.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  
    <title></title>
</head>

<div class="container is-fluid">



<br>
<div class="col-xs-12">
		<h1>Lista de etiquetas (Tabla codigobarras)</h1>
    <br>
		<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cod">
				<span class="glyphicon glyphicon-plus"></span> Agregar producto  <i class="fa fa-user-plus"></i> </a></button>

        
        <a href="print.php" class="btn btn-secondary">Imprimir</a>
        <a href="../../../index.php" class="btn btn-secondary">Volver</a> <!-- enlazar a inicio -->
    </div>
		<br>
		<style>
  

  a { text-decoration: none; 
	  } 
	table.dataTable thead th, table.dataTable tfoot th {
        font-weight: bold;
        color: white;
    }
  </style>
        
        <table class="table table-striped"  id= "table_id">

                   
                         <thead>    
                          <tr >
                            <th>idCodigoBarras</th>
                            <th>idBolsa</th> 
                            <th>nombre</th>
                            <th>codigoBarras</th>
          
                          </tr>
                        </thead>
                        <tbody>

                              <?php 
                              $conexion=mysqli_connect('localhost','root','','labprueba2');
                              $sql="SELECT * FROM codigoBarras";
                              $resultado=mysqli_query($conexion,$sql);

                              //declaramos arreglo para guardar codigos
                              $codbarra=array();
                              ?>
                              <?php 
                              while($fila=mysqli_fetch_assoc($resultado)):
                              $codbarra[]=(string)$fila['codigoBarras']; 
                                      ?>
                              <tr>
                              <td><?php echo $fila['idCodigoBarras'] ?></td>
                              <td><?php echo $fila['idBolsa'] ?></td>
                              <td><?php echo $fila['nombre'] ?></td>                        
                              <td><svg id='<?php echo "barcode".$fila['codigoBarras']; ?>'></td>
                              <td>
            <!-- Agrega un enlace para eliminar -->
            <a href="deletecodigo.php?id=<?php echo $fila['idCodigoBarras']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">
                <i class="fa-solid fa-trash"></i> Eliminar
            </a>
        </td>
                              </tr>


                              <?php endwhile;?>
                              

                             


        </body>
        <style>


      </style>
          </table>
  
	
  <script type="text/javascript">

      function arrayjsonbarcode(j){
        json=JSON.parse(j);
        arr=[];
        for (var x in json) {
          arr.push(json[x]);
        }
        return arr;
      }

      jsonvalor='<?php echo json_encode($codbarra) ?>';
      valores=arrayjsonbarcode(jsonvalor);

      for (var i = 0; i < valores.length; i++) {

        JsBarcode("#barcode" + valores[i], valores[i].toString(), {
          format: "CODE128",
          lineColor: "#000",
          width: 2,
          height: 30,
          displayValue: true
        });
      }

  </script>
   

  <?php include "form.php"?>

</html>
