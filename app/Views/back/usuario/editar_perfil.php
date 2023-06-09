<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5 card">
    <form enctype="multipart/form-data" method="post" id="createProduct" action="<?= site_url('/usuario/update') ?>">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label>direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $domicilio['direccion']; ?>">
            </div>
            <div class="form-group">
                <label>codigo postal</label>
                <input type="number" name="cod_postal" class="form-control" value="<?php echo $domicilio['cod_postal']; ?>">
            </div>
            <div class="form-group">
                <label>telefono</label>
                <textarea type="text" name="tel" class="form-control"><?php echo $usuario['tel']; ?></textarea>
            </div>
            

            

          <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
          </div>

    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#createProduct").length > 0) {
      $("#createProduct").validate({
        rules: {
          direccion: {
              required: "direccion es requerido.",
          },
          cod_postal: {
              required: "cod postal es requerido.",
          },
          tel: {
              required: "telefono es requerido.",
          },
          
          
        },
      })
    }
  </script>
</body>

</html>