<!DOCTYPE html>
<html>

<head>
  
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
    <form enctype="multipart/form-data" method="post" id="createProduct" action="<?= site_url('/products/store') ?>">
      <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" name="nombre" class="form-control">
      </div>

      <div class="form-group">
        <label>Precio</label>
        <input type="number" name="precio" class="form-control">
      </div>

      <div class="form-group">
        <label>Descripcion</label>
        <textarea type="text" name="descripcion" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control"></input>
      </div>

      <div class="form-group">
        <label>Categoria</label>
        <select class="form-select mb-3" name="categorias" id="">
            <option value="">Selecciona una categoria</option>
            <option value="1">Accion</option>  
            <option value="2">Aventura</option>  
            <option value="3">Lucha</option>
            <option value="4">Carreras</option>
        </select>
        
      </div>

      <div>
        <label for="opcion">Es tendencia?</label>
        <div>
          <input type="radio" id="opcion_si" name="opcion_tendencia" value="SI">
          <label for="opcion_si">Sí</label>
        </div>
        <div>
          <input type="radio" id="opcion_no" name="opcion_tendencia" value="NO">
          <label for="opcion_no">No</label>
        </div>
      </div>



      <div class="form-group">
    <label>Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control" onchange="mostrarVistaPrevia(event)">
    <div id="vista-previa"></div>
</div> 



<div class="form-group">
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary btn-block">Agregar Producto</button>
        </div>
        <div class="col">
          <a href="<?= site_url('/products') ?>" class="btn btn-secondary btn-block">Cancelar</a>
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
            required: true,
          },
          price: {
            required: true,
          },
          description: {
            required: true,
          },
          cantidad: {
            required: true,
          },
          categorias: {
            required: true,
          },
          opcion_tendencia: {
            required: true,
          },
          imagen: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "nombre es requerido.",
          },
          price: {
            required: "Precio es requerido.",
          },
          description: {
            required: "Description es requerido.",
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
          imagen: {
            required: "imagen es requerido.",
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