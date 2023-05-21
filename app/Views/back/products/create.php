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
  <div class="container mt-5 ">
    <form method="post" id="createProduct" action="<?= site_url('/products/store') ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control">
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </form>

    
         <div class="form-group">
            <label>Imagen</label>
              <input type="file" name="imagen" placeholder="" class="form-control"/>
          </div>    
     



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