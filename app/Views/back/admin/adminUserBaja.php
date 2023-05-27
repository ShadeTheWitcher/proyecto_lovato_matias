<section >

<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif;?>

  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

<div class="container mt-4  seccion-tabla-usuario" >
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('usuario/admin') ?>" class="btn btn-success mb-2">volver</a>
        
	</div>
    <?php
     if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="usuarios-list">
       <thead>
          <tr class="text-center">
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
          <?php foreach($usuarios as $key => $usuario): ?>
                <?php if($usuario["baja"]=="SI"): ?>
          <tr class="text-center">
             <td><?php echo $key+1; ?></td>
             <td><?php echo $usuario['id']; ?></td>
             <td><?php echo $usuario['nombre']; ?></td>
             <td><?php echo $usuario['apellido']; ?></td>
             <td><?php echo $usuario['usuario']; ?></td>
             <td><?php echo $usuario['email']; ?></td>
            
             
                <td>
                    <a href="<?php echo base_url('usuario/alta/'.$usuario['id']);?>" class="btn btn-success btn-sm">Alta</a>
                </td>
             

          </tr>
          <?php endif; ?>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>


<style>
   .table{
        background-color: azure;
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