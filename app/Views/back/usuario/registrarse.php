<section>

<div class="registro row justify-content-md-center">
  



<form method="post" action="<?= site_url('/usuario/register') ?>" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Por favor rellene los campos para registrarse.</p>
    <hr>

    
      <div class="row ">

          <div class="col-6">
            <label for="nombre" class="form-label col-12"  ><b>nombre</b></label>
            <input type="text" placeholder="Juan " name="nombre" required>
          </div>
            
          <div class="col-6">
          <label for="apellido" class="form-label col-12"  ><b>apellido</b></label>
          <input type="text" placeholder="Lopez " name="apellido" required>
          </div>
          

      </div>
    
    <div class="row ">

      <div class="col-6">
        <label for="email" class="form-label col-12"  ><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

      </div>

      <div class="col-6">
      <label for="usuario" class="form-label col-12"  ><b>usuario</b></label>
      <input type="text" placeholder="Juani123 " name="usuario" required>
      </div>
    
    
    
    
    </div>
    


    <div class="row">
        <div class="col-6">
          <label for="pass"  class="form-label col-12"  ><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pass" required>

        </div>

        <div class="col-6">
          <label for="pass-repeat" class="form-label col-12"   ><b>repita contraseña</b></label>
          <input type="password" placeholder="Repeat Password" name="pass-repeat" required>
        </div>


    </div>


    
    

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
     
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>



</div>
</section>