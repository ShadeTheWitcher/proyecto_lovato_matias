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

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  
</head>
<body>

<div class="container-product mt-4">
  <div class="button-group d-flex justify-content-end mb-2">
    <a href="<?php echo site_url('/products/create') ?>">
      <button type="button" class="btn btn-success">Nuevo Producto</button>
    </a>
    <a href="<?php echo site_url('/products/eliminados') ?>">
      <button type="button" class="btn btn-warning ml-2">Ver productos eliminados</button>
    </a>
  </div>
  
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="alert alert-info"><?php echo $_SESSION['msg']; ?></div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-bordered" id="products-list">
      <thead class="thead-light">
        <tr>
          <th></th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th>Cantidad</th>
          <th>Categoría</th>
          <th>Es Tendencia</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($products): ?>
          <?php foreach ($products as $key => $product): ?>
            <?php if ($product["activo"] == "SI"): ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>
                  <img src="<?= base_url() ?>/assets/uploads/<?= $product['imagen']; ?>" width="100" alt="">
                </td>
                <td><?php echo $product['cantidad']; ?></td>
                <td><?php echo $product['categoria_id']; ?></td>
                <td><?php echo $product['es_tendencia']; ?></td>
                <td>
                  <a href="<?php echo base_url('products/edit/' . $product['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
                  <a href="<?php echo base_url('products/baja/' . $product['id']); ?>" class="btn btn-danger btn-sm">Baja</a>
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
  .container-product {
    margin: 10px;
    background-color: azure;
  }

  .table {
    background-color: azure;
  }

  .table-responsive {
    overflow-x: auto;
  }

  @media (max-width: 576px) {
    .table-responsive table {
      font-size: 12px;
    }
  
    .table-responsive th,
    .table-responsive td {
      padding: 4px;
    }
  }


</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#products-list').DataTable();
  });
</script>

</body>
</html>