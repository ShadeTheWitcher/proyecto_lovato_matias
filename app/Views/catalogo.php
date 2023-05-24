<section>

<div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($productos as $product):?>
            <?php if($product['categoria_id'] == '2' ): ?>
            <div class="col">
                <div class="card" style="width:15rem;">
                    <img class="card-img-top img-thumbnail" src="<?=base_url()?>assets/uploads/<?=$product['imagen'];?>" 
                    width="100" alt="">
                    <div class="card-body">
                        <h4 class="card-text"><?=$product['name']?></h4>
                        <h6 class="card-text"><?=$product['description']?></h6>
                        <p class="card-text"><?=$product['price']?>$</p>
                    
                        <?php if (session('logged_in')) { 
                            echo form_open('Carrito_controller/add');
                            echo form_hidden('id',$product['id']);
                            echo form_hidden('nombre_product',$product['name']);
                            echo form_hidden('precio',$product['price']);
                            $btn= array(
                                'class' => 'btn btn-danger',
                                'value' => 'Agregar al Carrito',
                                'name' => 'action',
                            );
                            echo form_submit($btn);
                            echo form_close(); ?>
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