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
  <div class="container mt-5 ">
    <form enctype="multipart/form-data" method="post" id="createProduct" action="<?= site_url('/products/store') ?>">
      <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Precio</label>
        <input type="number" name="price" class="form-control">
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control"></input>
      </div>

      <div class="form-group">
        <label>Categoria</label>
        <select class="form-select mb-3" name="categorias" id="">
            <option value="1">Accion</option>  
            <option value="2">Aventura</option>  
            <option value="3">Tendencia</option>
            <option value="4">Carreras</option>
        </select>
        
      </div>

      <div class="form-group">
            <label>Imagen</label>
              <input type="file" name="imagen" placeholder="" class="form-control"/>
      </div> 



      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
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
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          price: {
            required: "Price is required.",
          },
          description: {
            required: "Description is required.",
          },
        },
      })
    }
  </script>
</body>

</html>