<?php
$cart = \Config\Services::Cart();
$cart1 = $cart->contents();?>
<body>
	<div class="container">
		
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
            $session = session();
            $cart = \Config\Services::Cart();
            $cart = $cart->contents();

            /* Si carrito vacio, mostrar lo sgte*/
                if (empty($cart)){
                    echo 'Para agregar productos al carrito, haga click en "Agregar al carrito"';
                }
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
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$total = 0;
				foreach($cart1 as $item):?>
					<tr>
						
						<th><?php echo $item['id']; ?></th>
						<th><?php echo $item['name'] ?></th>
						<th><?php echo number_format($item['price']); ?></th>
						<th><?php echo $item['qty'] ?></th>
						<?php $total = $total + $item['qty'] * $item['price'];?>
						<th><?php echo anchor('Carrito_Controller/borrar/'.$item['rowid'],'Eliminar',"class='btn btn-danger'");?></th>
				<?php endforeach; ?>
				<th>$<?php  number_format($total); ?></th>
				</tr>
			</tbody>
			
				
			
			
		</table>
        
        <div class="col-md-4 d-flex justify-content-evenly btm-group mt-5">
		<a href="<?php echo base_url('/enviar-compra')?>" class="edit" data-toggle="modal">
		<button class="w-100 btn btn-danger btn-lg" type="submit">Confirmar</button></a>
		<a class="btn btn-danger btn-lg" <?php echo anchor('Carrito_Controller/borrar/all','Cancelar Compra');?> </a>
         
         
        </div>
	</div>
</body>
