<section >

<div class="container mt-4  seccion-tabla-usuario" >
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/usuarios/eliminados') ?>" class="btn btn-success mb-2">Ver eliminados</a>
        
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
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Usuario</th>
             <th>email</th>
             <th>accion</th>
          </tr>
       </thead>
       <tbody>
          <?php if($usuarios): ?>
          <?php foreach($usuarios as $key => $usuarios): ?>
          <tr>
             <td><?php echo $key+1; ?></td>
             <td><?php echo $usuarios['id']; ?></td>
             <td><?php echo $usuarios['nombre']; ?></td>
             <td><?php echo $usuarios['apellido']; ?></td>
             <td><?php echo $usuarios['usuario']; ?></td>
             <td><?php echo $usuarios['email']; ?></td>
             <td>
              
              <a href="<?php echo base_url('usuario/baja/'.$usuarios['id']);?>" class="btn btn-danger btn-sm">BAJA</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#products-list').DataTable();
    });
</script>


</section>