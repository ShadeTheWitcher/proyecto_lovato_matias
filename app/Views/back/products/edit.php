<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Crud with Validation Demo</title>
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
    <form enctype="multipart/form-data" method="post" id="createProduct" action="<?= site_url('/products/update') ?>">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label>Nombre del producto</label>
                <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea type="text" name="description" class="form-control"><?php echo $product['description']; ?></textarea>
            </div>
            

            <div class="form-group">
                <label>Cantidad (stock)</label>
                <input type="number" name="cantidad" class="form-control" value="<?php echo $product['cantidad']; ?>"  ></input>
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
                <label>Imagen</label>
                <input type="file" name="imagen" placeholder="" class="form-control" />
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
          name: {
              required: "Name is required.",
          },
          price: {
              required: "Price is required.",
          },
          description: {
              required: "Description is required.",
          },
          cantidad: {
              required: "cantidad is required.",
          },
          categorias: {
              required: "categorias is required.",
          },
          opcion_tendencia: {
            required: "tendencia is required.",
          },
          
        },
      })
    }
  </script>
</body>

</html>