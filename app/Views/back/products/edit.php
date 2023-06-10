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

    .image-container {
        margin-bottom: 10px;
        text-align: center;
    }

    #preview-image {
        max-width: 100%;
        height: auto;
    }


  </style>
</head>

<body>
  <div class="container mt-5 card">
    <form enctype="multipart/form-data" method="post" id="createProduct" action="<?= site_url('/products/update') ?>">
      <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
      <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $product['nombre_producto']; ?>">
      </div>
      <div class="form-group">
        <label>Precio</label>
        <input type="number" name="precio" class="form-control" value="<?php echo $product['precio_producto']; ?>">
      </div>
      <div class="form-group">
        <label>Descripcion</label>
        <textarea type="text" name="descripcion" class="form-control"><?php echo $product['descripcion']; ?></textarea>
      </div>


      <div class="form-group">
        <label>Cantidad (stock)</label>
        <input type="number" name="cantidad" class="form-control" value="<?php echo $product['cantidad']; ?>"></input>
      </div>

      <div class="form-group">
        <?php $categoria = $product['categoria_id']; ?>
        <label>Categoria</label>
        <select class="form-select mb-3" name="categorias" id="">
          <option value="">Selecciona una categoria</option>
          <option value="1" <?php echo ($categoria == 1) ? 'selected' : ''; ?>>Accion</option>
          <option value="2" <?php echo ($categoria == 2) ? 'selected' : ''; ?>>Aventura</option>
          <option value="3" <?php echo ($categoria == 3) ? 'selected' : ''; ?>>Lucha</option>
          <option value="4" <?php echo ($categoria == 4) ? 'selected' : ''; ?>>Carreras</option>
        </select>
      </div>

      <div>
        <label for="opcion">Es tendencia?</label>
        <?php $opcion_es_tendencia = $product['es_tendencia']; ?>
        <div>
          <input type="radio" id="opcion_si" name="opcion_tendencia" value="SI" <?php echo ($opcion_es_tendencia == 'SI') ? 'checked' : ''; ?>>
          <label for="opcion_si">Sí</label>
        </div>
        <div>
          <input type="radio" id="opcion_no" name="opcion_tendencia" value="NO" <?php echo ($opcion_es_tendencia == 'NO') ? 'checked' : ''; ?>>
          <label for="opcion_no">No</label>
        </div>
      </div>


      <div class="form-group">
        <label for="imagen">Imagen actual:</label>
        <div class="image-container">
          <img src="<?= base_url() ?>/assets/uploads/<?= $product['imagen']; ?>" width="300" alt="">
        </div>


        <div class="form-group">
            <label>Actualizar Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" onchange="mostrarVistaPrevia(event)">
            <div id="vista-previa"></div>
        </div> 

        <div class="form-group">
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
        </div>
        <div class="col">
          <a href="<?= site_url('/products') ?>" class="btn btn-secondary btn-block">Cancelar cambios</a>
        </div>
      </div>
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
          name: {
            required: "Nombre es requerido.",
          },
          price: {
            required: "precio es requerido.",
          },
          description: {
            required: "Descripcion es requerido.",
          },
          cantidad: {
            required: "cantidad es requerido.",
          },
          categorias: {
            required: "categorias es requerido.",
          },
          opcion_tendencia: {
            required: "tendencia es requerido.",
          },

        },
      })
    }
  </script>

<script>
    function mostrarVistaPrevia(event) {
        var input = event.target;
        var vistaPrevia = document.getElementById('vista-previa');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                vistaPrevia.innerHTML = '<img src="' + e.target.result + '" width="300" alt="Vista previa de la imagen">';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            vistaPrevia.innerHTML = '';
        }
    }
</script>



</body>

</html>