<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h2>Nuevo Producto <a href="<?php echo base_url('/productPanel');?>">
                        <button type="button" class="btn btn-danger float-end">Back</button>
                    </a></h2>
                </div>
                <div class="card-body">
                <?php $validation = \Config\Services::validation() ?>
                    <form action="<?php echo base_url('/sendProduct')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre Producto</label>
                                <input type="text" name="nombre_product" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['nombre_product']) ? $_POST['nombre_product'] : '' ?>">
                                    <!-- Error -->
                                    <?php if($validation->getError('nombre_product')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nombre_product'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categoria</label>
                                <input type="text" name="categoria_id" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '' ?>" />
                                <!-- Error -->
                                <?php if($validation->getError('categoria_id')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('categoria_id'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="text" name="precio" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : '' ?>" />
                                <!-- Error -->
                                <?php if($validation->getError('precio')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('precio'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio de venta</label>
                                <input type="text" name="precio_venta" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['precio_venta']) ? $_POST['precio_venta'] : '' ?>"/>
                                <!-- Error -->
                                <?php if($validation->getError('precio_venta')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('precio_venta'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : '' ?>"/>
                                <!-- Error -->
                                <?php if($validation->getError('stock')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('stock'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stock Minimo</label>
                                <input type="text" name="stock_min" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['stock_min']) ? $_POST['stock_min'] : '' ?>"/>
                                <!-- Error -->
                                <?php if($validation->getError('stock_min')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('stock_min'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" id="descripcion" placeholder="" class="form-control" 
                                value="<?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ?>" />
                                <!-- Error -->
                                <?php if($validation->getError('descripcion')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('descripcion'); ?>
                                    </div>
                                    <?php }?>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" name="imagen" placeholder="" class="form-control"/>
                            </div>    
                        </div>
                        <div class="col-md-12 mt-3">
                            <button class="btn btn-danger btn-lg" type="submit">Enviar</button>
                            <button class="btn btn-danger btn-lg ms-3" type="reset">Borrar</button>
                        </div>          
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
		
</div>