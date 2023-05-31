<section>

<div class="row justify-content-md-center">

<div class="col-md-3 Detalles-compra card">
        <h4>Resume de productos</h4>
        
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
				
				foreach($ventas_detalle as $item):?>
					<tr>
                    
						<th><?php echo $item['name'] ?></th>
						<th>$<?php echo number_format($item['precio']); ?></th>
						<th><?php echo number_format($item['cantidad_venta']); ?></th>
	
                        <th>$<?php echo ($item["sub_total"]); ?></th>
                        
                    <tr>
                    <?php endforeach; ?>  
                    </table>
                    <?php $total = $item["total_venta"]; ?>

                        <div>TOTAL: $<?php echo number_format($total); ?></div>

                    
                        <a href="javascript:history.back()" class="btn btn-primary mt-3">Volver</a>
    </div>

    </div>

    <style>
         .Detalles-compra{
            margin-top: 3%;
        }
    </style>

</section>