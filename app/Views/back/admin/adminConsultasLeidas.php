<section>
<?php


// Verificar si el usuario es el administrador
if (!isset($_SESSION["logged_in"]) || $_SESSION['perfil_id'] != 1) {
   // Mostrar un mensaje de error o redirigir al usuario a otra página
   echo "<div style='text-align: center; margin-top: 100px;'>
          <h2>Acceso Restringido</h2>
          <p>Lo sentimos, pero no tienes acceso a esta página.</p>
          <p>Si crees que esto es un error, por favor, ponte en contacto con el administrador del sitio.</p>
        </div>";
   exit();
 }
?>




<div class="container mt-4  seccion-tabla-usuario card" >
   <h3>Consultas Leidas</h3>
    <div class="d-flex justify-content-end">
        <a href="<?= $previous_url ?>" class="btn btn-success mb-2">volver</a>
        
	</div>
    <?php
     if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
  <div class="table-responsive">
     <table class="table table-bordered" id="usuarios-list">
       <thead>
          <tr>
             
             <th>id</th>
             <th class="d-none d-sm-table-cell">Nombre y Apellido</th>
             <th>email</th>
             <th class="d-none d-sm-table-cell">area</th>
             <th>razon</th>
             <th>mensaje</th>
             
          </tr>
       </thead>
       <tbody>
          <?php if($consultas): ?>
          <?php foreach($consultas as $key => $consulta): ?>
          <tr>

            <?php if($consulta["leido"]=="SI"){ ?>
             
             <td><?php echo $consulta['id']; ?></td>
             <td class="d-none d-sm-table-cell"><?php echo $consulta['nombre_apellido']; ?></td>
             <td><?php echo $consulta['email']; ?></td>
             <td class="d-none d-sm-table-cell"><?php echo $consulta['area']; ?></td>
             <td><?php echo $consulta['razon']; ?></td>
             <td><?php echo $consulta['mensaje']; ?></td>
             <td>

             <?php } ?>
             
              
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
     </div>
  </div>
</div>

<style>
   .seccion-tabla-usuario table{
      
   }
</style>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#products-list').DataTable();
    });
</script>






</section>