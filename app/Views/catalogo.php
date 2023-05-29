<section>

<div class="row  fila-catalogo ">
        <?php foreach($productos as $product):?>
            <?php if($product ): ?> 
            <div class="col-6 col-sm-4 col-mid-4 col-lg-3">
                <div class="card producto-catalogo" style="width:15rem;">
                    <img class="card-img-top img-thumbnail" src="<?=base_url()?>assets/uploads/<?=$product['imagen'];?>" 
                    width="100" alt="">
                    <div class="card-body">
                        <h4 class="card-text"><?=$product['name']?></h4>
                        <h6 class="card-text"><?=$product['description']?></h6>
                        <p class="card-text"><?=$product['price']?>$</p>
                    
                        <?php if (session('logged_in')) { ?>
                            
                            <form action="<?= site_url('agregarItemCarrito') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="nombre_product" value="<?= $product['name'] ?>">
                                <input type="hidden" name="precio" value="<?= $product['price'] ?>">
                                <button class="btn btn-danger" type="submit" name="action" value="Agregar al Carrito">Agregar al Carrito</button>
                            </form>

                            <?php }else{ ?>
                                <a href="<?php echo base_url('usuario/login') ?>">
                            <button class="btn btn-danger" type="button"aria-expanded="false" 
                            >Agregar al Carrito</button></a>
                               <?php } ?>
                         
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
     </div>


</section>