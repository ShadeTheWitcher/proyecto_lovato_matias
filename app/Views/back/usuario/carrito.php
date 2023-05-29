<?php


?>
<body>
	<div class="container card">
		
		<div class="d-flex justify-content-between">
			<?php if(!empty(session()->getFlashdata('mensaje'))) {;?>
           	 <div class='alert alert-danger'> <?= session()->getFlashdata('mensaje'); ?> </div>
         	<?php } ?>
			 <?php if(!empty(session()->getFlashdata('success'))) {;?>
           	 <div class='alert alert-success'> <?= session()->getFlashdata('success'); ?> </div>
         	<?php } ?>
			<h2>Carrito de Compras</h2>
		</div>
		<div>
            <?php
            $sessionCart = session('cart');
            
            ?>   

        </div>
		<table class="table table-light">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Accion</th>
					<th>SubTotal</th>
				</tr>
			</thead>
			<tbody>
				<?php
				

				/* Si carrito vacio, mostrar lo sgte*/
                if (empty($sessionCart)){
                    echo 'Para agregar productos al carrito, haga click en "Agregar al carrito" desde el Catalogo';
                }else{

				foreach($sessionCart as $item):?>
					<tr>
						
						<th><?php echo $item['id']; ?></th>
						<th><?php echo $item['name'] ?></th>
						<th>$<?php echo number_format($item['price']); ?></th>
						<th><?php echo number_format($item['cant']); ?></th>
						

						<th>
						
						
						<form action="<?php echo site_url('eliminarItem/'.$item['id']); ?>" method="POST">
							<button type="submit" class="btn btn-primary">-</button>
							<button type="submit" class="btn btn-success">+</button>
							<button type="submit" class="btn btn-danger">Eliminar</button>
							
						</form></th>
						<th>$<?php echo ($item["sub_total"]); ?></th>
						<?php $sessionTotalCarrito = session('totalCarrito'); ?>
						
				<?php endforeach; ?>

				<?php }?>
				</tr>
			</tbody>
			
				
			
			
		</table>


		<?php if (empty($sessionCart)){	 ?>	
			<div>TOTAL: $<?php echo number_format(0); ?></div>
			
		<?php }else{?>
			
			<div>TOTAL: $<?php echo number_format($sessionTotalCarrito); ?></div>
		<?php }?>

        <div class="col-md-4 d-flex justify-content-evenly btm-group mt-5">
		<a href="<?php echo base_url('/validar-stock')?>" class="edit" data-toggle="modal">
		<button class="w-100 btn btn-danger btn-lg" type="submit">Confirmar</button></a>

		<a href="<?php echo base_url('/vaciar-carrito')?>" class="edit" data-toggle="modal">
		<button class="w-100 btn btn-danger btn-lg" type="submit">Vaciar carrito</button></a>
         
         
        </div>
	</div>
</body>
