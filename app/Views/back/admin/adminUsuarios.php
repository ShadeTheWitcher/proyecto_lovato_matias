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





<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif;?>

  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  
<div class="container mt-4  seccion-tabla-usuario" >
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/usuarios/eliminados') ?>" class="btn btn-success mb-2">Ver eliminados</a>
        
	</div>
    <?php
     if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3 card">
    <h4>Usuarios registrados</h4>
    <div class="table-responsive">
     <table class="table table-bordered" id="usuarios-list">
       <thead>
          <tr class="text-center">
             
             <th>id</th>
             <th class="d-none d-sm-table-cell">Nombre</th>
             <th class="d-none d-sm-table-cell">Apellido</th>
             <th>Usuario</th>
             <th>email</th>
             <th>accion</th>
          </tr>
       </thead>
       <tbody>
          <?php if($usuarios): ?>
          <?php foreach($usuarios as $key => $usuario): ?>
            <?php if($usuario["baja"]=="NO"): ?>
          <tr class="text-center">
             
             <td><?php echo $usuario['id']; ?></td>
             <td class="d-none d-sm-table-cell"><?php echo $usuario['nombre']; ?></td>
             <td class="d-none d-sm-table-cell"><?php echo $usuario['apellido']; ?></td>
             <td><?php echo $usuario['usuario']; ?></td>
             <td><?php echo $usuario['email']; ?></td>

             <?php if($usuario["perfil_id"]=="1"){ ?>
                <td >
                  <?php echo "Administrador"; ?>
                </td>
             <?php }else{ ?>
                <td >
                    <a href="<?php echo base_url('usuario/baja/'.$usuario['id']);?>" class="btn btn-danger btn-sm">Baja</a>
                </td>
             <?php } ?>

          </tr>
          <?php endif; ?>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
     </div>
  </div>
</div>

<style>
   .table{
        
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