<section>




<div class="login row justify-content-md-center">

  
  


    <?php $validation = \Config\Services::validation() ?>
    <form action="<?= site_url('usuario/envio-logearse') ?>" method="post">
      <div class="imgcontainer">
        
      </div>
      <p class="text-center">Iniciar sesion</p>
      <?php if(session()->getFlashdata('msg')):?>
			<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
		  <?php endif;?>
      <div class="container">
        <label class="form-label col-12" for="usuario"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usuario" required>

        <label class="form-label col-12" for="pass"><b>Contraseña</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" name="pass" required>

        <button type="submit">Iniciar</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Recordarme la contraseña
        </label>
      </div>

      <div class="container" >
        
        
        <p>Aun no te has <a style="color:green" href="<?php echo base_url('registro')?>">Registrado</a>?</p>
      </div>
    </form>
  


  
</section>