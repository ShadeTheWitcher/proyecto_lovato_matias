<section >

<?php


// Verificar si el usuario es el administrador
if (!isset($_SESSION['id_perfil']) || $_SESSION['id_perfil'] != 1) {
   // Mostrar un mensaje de error o redirigir al usuario a otra página
   echo "<div style='text-align: center; margin-top: 100px;'>
          <h2>Acceso Restringido</h2>
          <p>Lo sentimos, pero no tienes acceso a esta página.</p>
          <p>Si crees que esto es un error, por favor, ponte en contacto con el administrador del sitio.</p>
        </div>";
   exit();
 }
?>





<div class="container mt-4  seccion-tabla-usuario" >
    
   <h2>Historial de ventas</h2>

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
             <th>fecha</th>
             <th>id usuario</th>
             <th>total venta</th>
             
             <th>acciones</th>
          </tr>
       </thead>
       <tbody>
          <?php if($ventas): ?>
          <?php foreach($ventas as $key => $venta): ?>
          <tr>
             <td><?php echo $key+1; ?></td>
             <td><?php echo $venta['id']; ?></td>
             <td><?php echo $venta['fecha']; ?></td>
             <td><?php echo $venta['usuario_id']; ?></td>
             <td><?php echo $venta['total_venta']; ?></td>
             <td>
              
              <a href="<?php echo base_url('usuario/baja/'.$venta['id']);?>" class="btn btn-danger btn-sm">Ver detalle</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>

<style>
   .table{
      color: azure;
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