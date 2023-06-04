<section >

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
   <h3>Consultas</h3>
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/admin/consultas-ver-leidos') ?>" class="btn btn-success mb-2">Ver Leidos</a>
        
	</div>
    <?php
     if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="usuarios-list">
       <thead>
          <tr>
             <th></th>
             <th>id</th>
             <th>Nombre y Apellido</th>
             <th>email</th>
             <th>area</th>
             <th>razon</th>
             <th>mensaje</th>
             <th>accion</th>
          </tr>
       </thead>
       <tbody>
          <?php if($consultas): ?>
          <?php foreach($consultas as $key => $consulta): ?>
          <tr>
          <?php if($consulta["leido"]=="NO" && $consulta["tipo_usuario"]=="2"){ ?>
             <td><?php echo $key+1; ?></td>
             <td><?php echo $consulta['id']; ?></td>
             <td><?php echo $consulta['nombre_apellido']; ?></td>
             <td><?php echo $consulta['email']; ?></td>
             <td><?php echo $consulta['area']; ?></td>
             <td><?php echo $consulta['razon']; ?></td>
             <td><?php echo $consulta['mensaje']; ?></td>
             <td>
             

              <a href="<?php echo base_url('/marcar-leido/'.$consulta['id']);?>" class="btn btn-danger btn-sm">Marcar como Leido</a>

              <?php }?>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
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