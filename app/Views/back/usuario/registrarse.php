<section>

<div class="registro row justify-content-md-center">
  



<form method="post" action="<?= site_url('/usuario/enviar-registo') ?>" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    
    <!--Notificacion de Registro-->
    <?php if(!empty(session()->getFlashdata('failUser'))) {;?>
            <div class='alert alert-danger'> <?= session()->getFlashdata('failUser'); ?> </div>
          <?php } ?>
          <?php if(!empty(session()->getFlashdata('success'))) { ?>
            <div class='alert alert-success'><?= session()->getFlashdata('success'); ?></div>
          <?php } ?>

    <?php if(!empty(session()->getFlashdata('failEmail'))) {;?>
            <div class='alert alert-danger'> <?= session()->getFlashdata('failEmail'); ?> </div>
          <?php } ?>        


    <p>Por favor rellene los campos para registrarse.</p>
    <hr>

    
      <div class="row ">

          <div class="col-12 col-sm-6">
            <label for="nombre" class="form-label col-12"  ><b>nombre</b></label>
            <input type="text" placeholder="Juan " name="nombre" required>
          </div>
            
          <div class="col-12 col-sm-6">
          <label for="apellido" class="form-label col-12"  ><b>apellido</b></label>
          <input type="text" placeholder="Lopez " name="apellido" required>
          </div>
          

      </div>
    
    <div class="row ">

      <div class="col-12 col-sm-6">
        <label for="email" class="form-label col-12"  ><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

      </div>

      <div class="col-12 col-sm-6">
      <label for="usuario" class="form-label col-12"  ><b>usuario</b></label>
      <input type="text" placeholder="Juani123 " name="usuario" required>
      </div>
    
    
    
    
    </div>
    


    <div class="row">
        <div class="col-12 col-sm-6">
          <label for="pass"  class="form-label col-12"  ><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pass" required>

        </div>

        <div class="col-12 col-sm-6">
          <label for="pass-repeat" class="form-label col-12"   ><b>repita contraseña</b></label>
          <input type="password" placeholder="Repeat Password" name="pass-repetida" required>
        </div>


    </div>


    
    

    

    <p>Al crearte una cuenta aceptas nuestros <a href="<?php echo base_url('/term-usos'); ?>" style="color:dodgerblue">terminos y condiciones</a>.</p>

    <div class="clearfix">
     
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>



</div>
</section>