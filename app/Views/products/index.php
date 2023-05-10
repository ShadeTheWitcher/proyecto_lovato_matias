<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 CRUD App Example Tutorial - codingdriver.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products/create') ?>" class="btn btn-success mb-2">Add Product</a>
	</div>
    <?php
     if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="products-list">
       <thead>
          <tr>
             <th></th>
             <th>Name</th>
             <th>Price</th>
             <th>Description</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($products): ?>
          <?php foreach($products as $key => $product): ?>
          <tr>
             <td><?php echo $key+1; ?></td>
             <td><?php echo $product['name']; ?></td>
             <td><?php echo $product['price']; ?></td>
             <td><?php echo $product['description']; ?></td>
             <td>
              <a href="<?php echo base_url('products/edit/'.$product['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('products/delete/'.$product['id']);?>" class="btn btn-danger btn-sm">Delete</a>
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
</body>
</html>