<section>
    <div class="container-contacto">
        <div class="row justify-content-md-center div-contacto">
            
            <div>
                <p class="h3 text-center">¡Contactanos!</p>
            </div>
            


        </div>
    


        <?php if (session()->getFlashdata('msg')): ?>
            <div id="success-message" class="alert alert-success welcome-message">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>



<div class="container-formulario">


    <div class="row justify-content-md-center">

        <div class="col-md-6 datos-titular "> 
            <p>Titular: Lovato Matias Sebastian</p>
            <p>Razon social: S.A</p>
            <p> <i class="fa-solid fa-phone"></i>  Tel: +19163850525</p>
            <p>Domicilio legal: Junin 1084, W3400AVV </p>


            <img src="<?= base_url('/assets/img/gfa-logo2.png') ?>" alt="logo">
        </div>


    

        
          <div class="col-md-6 div-form ">
          
            <form action="<?= base_url('/enviar-consulta') ?>" method="post">
                
            <?php if ($usuario && isset($usuario['logged_in']) &&  session('perfil_id') == 2){ ?>
                
                        
                        <input type="hidden" id="name" name="nombre_apellido" placeholder="" pattern=[A-Z\sa-z]{3,20} required  value="<?= $usuario['nombre']." ".$usuario['apellido'] ?>">  
                        <input type="hidden" id="email" name="email" placeholder="" required  value="<?= $usuario['email'] ?>"> 
                       


                <?php }else{  ?>

                    <div class="elem-grupo"> 
                        <label for="name">Nombre y Apellido</label> 
                        <input type="text" id="name" name="nombre_apellido" placeholder="Juan Carlos" pattern=[A-Z\sa-z]{3,20} required> 
                    </div> 
                    <div class="elem-grupo"> 
                        <label for="email">Correo electrónico</label> 
                        <input type="email" id="email" name="email" placeholder="ejemplo@email.com" required> 
                    </div>

                <?php }  ?>

                <div class="elem-grupo"> 
                    <label for="departmento-seleccion">
                        Área a contactar
                    </label> 
                    <select id="departmento-seleccion" name="area" required> 
                        <option value="">Selecciona un área</option> 
                        <option value="facturacion">Facturación</option> 
                        <option value="marketing">Marketing</option> 
                        <option value="soporte tecnico">Servicio al cliente</option> 
                    </select> 
                </div> 
                <div class="elem-grupo"> 
                    <label for="title">
                        Motivo de contacto
                    </label> 
                    <input type="text" id="title" name="razon" required placeholder="Problema/Consulta" pattern=[A-Za-z0-9\s]{8,60}> 
                </div> 
                <div class="elem-grupo"> 
                    <label for="mensaje">
                        Solicitud

                    </label> 
                    <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí." required></textarea> 
                </div> 
                <button type="submit">Enviar mensaje</button>
            </form>
            
        </div>
    </div>
    

    <div class="container-fluid">
        
    
    <div class="row justify-content-md-center g-maps">
        <div col-12>
            <p class="h2">Encontranos en</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.049418848027!2d-58.8361806!3d-27.4677208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca47bab27e5%3A0xcdb5711c74bef599!2sPeatonal%20de%20Corrientes!5e0!3m2!1ses-419!2sar!4v1681693223804!5m2!1ses-419!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </div>

    </div>
</div>


</div>


</section>

<script>
    // Espera 3 segundos y luego oculta el mensaje flash
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 3000);
</script>
