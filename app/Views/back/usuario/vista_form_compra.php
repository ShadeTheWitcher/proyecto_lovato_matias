<section>
  <h2>Formulario de Compra</h2>

  <div class="row justify-content-center">
    <div class="col-lg-3 col-md-8">

      <div class="container-compra">
        <form action="<?= site_url("/enviar-compra") ?>" method="POST">
          <div class="card form-row container">

            <?php if (!empty(session("domicilio_id"))) { ?>
              <div class="form-group form-row">
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" placeholder="Ej: 200vv mz 45 Barrio" name="direccion" value="<?php echo $domicilio['direccion']; ?>" required>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="modificar_domicilio" name="modificar_domicilio">
                <label class="form-check-label" for="modificar_domicilio">
                  Modificar domicilio
                </label>
              </div>

              <div class="form-group form-row">
                <label for="codigo_postal">Código Postal:</label>
                <input type="number" id="codigo_postal" placeholder="Ej: 3400" name="cod_postal" value="<?php echo $domicilio['cod_postal']; ?>" required>
              </div>

            <?php } else { ?>
              <div class="form-group form-row">
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" placeholder="Ej: 200vv mz 45 Barrio" name="direccion" required>
              </div>

              <div class="form-group form-row">
                <label for="codigo_postal">Código Postal:</label>
                <input type="number" id="codigo_postal" placeholder="Ej: 3400" name="cod_postal" required>
              </div>

            <?php } ?>

            <div class="form-group form-row">
              <label>Método de pago:</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="metodo_pago" id="tarjeta_credito" value="tarjeta_credito" required>
                <label class="form-check-label" for="tarjeta_credito">
                  Tarjeta Debito/Credito
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="metodo_pago" id="transferencia_bancaria" value="transferencia_bancaria">
                <label class="form-check-label" for="transferencia_bancaria">
                  Efectivo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="metodo_pago" id="paypal" value="paypal">
                <label class="form-check-label" for="paypal">
                  Mercado Pago
                </label>
              </div>
            </div>

            <div class="form-group">
              <label for="opcion_envio">Opción de Envío:</label>
              <select class="form-select" id="opcion_envio" name="opcion_envio" required>
                <option value="">Seleccione una opción</option>
                <option value="0">Contenido digital</option>
                <option value="1">Andreani</option>
                <option value="2">Correo argentino</option>
                <option value="3">OCA</option>
              </select>
            </div>

            <div class="button-container">
              <button type="submit" class="btn btn-info">Confirmar compra</button>
              <a href="<?= site_url("/cancelar-compra") ?>" class="btn btn-danger">Cancelar compra</a>
            </div>

          </div>
        </form>
      </div>

    </div>

    <div class="col-lg-6 col-md-8 Detalles-compra card">
      <h4>Resumen de productos</h4>
      <?php $sessionCart = session("cart"); ?>
      <div class="table-responsive">
        <table class="table table-light">
          <thead class="thead-light">
            <tr>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sessionCart as $item) : ?>
              <tr>
                <td><?php echo $item['name'] ?></td>
                <td>$<?php echo number_format($item['price']); ?></td>
                <td><?php echo number_format($item['cant']); ?></td>
                <td>$<?php echo ($item["sub_total"]); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php $sessionTotalCarrito = session('totalCarrito'); ?>
      <?php if (empty($sessionCart)) { ?>
        <div>TOTAL: $<?php echo number_format(0); ?></div>
      <?php } else { ?>
        <div>TOTAL: $<?php echo number_format($sessionTotalCarrito); ?></div>
      <?php } ?>

    </div>

  </div>

  <style>
    .container-compra {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: ;
      animation: slideInRight 0.5s ease-in-out;
    }

    .Detalles-compra {
      animation: slideInRight 0.5s ease-in-out;
    }

    .container-compra .card {
      background-color: ;
    }

    .container {
      width: 100%;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 10px;
    }

    .form-group label {
      margin-bottom: 5px;
    }

    .button-container {
      display: flex;
      justify-content: center;
    }

    @media (max-width: 767.98px) {
      .Detalles-compra {
        margin-top: 20px;
      }
    }



  </style>


  <style>
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
  </style>

  <script>
    window.addEventListener('DOMContentLoaded', function() {
      const containerCompra = document.querySelector('.container-compra');
      containerCompra.style.animation = 'slideInRight 0.5s ease-in-out';

      const detallesCompra = document.querySelector('.Detalles-compra');
      detallesCompra.style.animation = 'slideInRight 0.5s ease-in-out';
    });
  </script>

</section>
