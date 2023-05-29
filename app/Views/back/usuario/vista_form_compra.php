<section>
  <h2>Formulario de Compra</h2>

  <div class="row justify-content-md-center">
    <div class="col-md-3">

    <div class="container-compra">
        <form action="<?= site_url("/enviar-compra") ?>" method="POST">
        <div class=" card form-row container ">
    
            <div class="form-group form-row">
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" placeholder="Ej: 200vv mz 45 Barrio" name="direccion" required>
            </div>

            <div class="form-group form-row">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" placeholder="Ej: 3400" name="cod_postal" required>
            </div>

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
            </div>
        </div>
        </form>
    </div>

    </div>

    <div class="col-md-3 Detalles-compra card">
        <h4>Resume de productos</h4>
        <?php  $sessionCart = session("cart"); ?>
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
				<?php
				
				foreach($sessionCart as $item):?>
					<tr>
						
						<th><?php echo $item['name'] ?></th>
						<th>$<?php echo number_format($item['price']); ?></th>
						<th><?php echo number_format($item['cant']); ?></th>
	
                        <th>$<?php echo ($item["sub_total"]); ?></th>

                    <tr>
                    <?php endforeach; ?>  
                    </table>
                    <?php $sessionTotalCarrito = session('totalCarrito'); ?>


                    <?php if (empty($sessionCart)){	 ?>	
                        <div>TOTAL: $<?php echo number_format(0); ?></div>
                        
                    <?php }else{?>
                        
                        <div>TOTAL: $<?php echo number_format($sessionTotalCarrito); ?></div>
                    <?php }?>

    </div>

    


  </div>

  <style>
    .container-compra {
      
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: ;
    }

    .container-compra .card{
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
  </style>
</section>
