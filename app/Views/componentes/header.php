<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-0">
    <meta name="viewport" content="width=device-width, initialscale=1">

    <title>GFA <?php echo ($title); ?></title>
    <link href="<?= base_url('./assets/css/bootstrap.min.css') ?> " rel="stylesheet" integrity=" " crossorigin="">
    <link href="<?= base_url('./assets/css/miestilo2.css') ?>" rel="stylesheet" >
    <script src="<?= base_url('./assets/js/bootstrap.bundle.min.js') ?>" integrity="" crossorigin=""></script>

    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/fontawesome.css') ?>" >
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>" >
    

    

    <div class="container-fluid  logo-principal"> 
        
        <div class="row">

            <div class="col-2">

            </div>

            <div class="col-7 col-sm- col-md- col-lg- col-xl-">
                <img  class="img-header"
                src="<?= base_url('./assets/img/GfaMiniT.png') ?>"   >   
            </div>

            <div class="col-3">

                <div class="row">
                    <div class="col-sm-6 text-center">
                        <a href="<?php echo base_url("comercializacion"); ?>">      <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i>   </a>
                    </div>
                    
                    <div class="col-sm-3 col-md-6 text-center">
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo base_url("login"); ?>">Iniciar Sesion</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url("usuario/crearUser"); ?>">Registrarse</a></li>
                              <li><a class="dropdown-item" href="#">ver pedidos</a></li>
                            </ul>
                          </div>


                    </div>

                    


                </div>

                
                
            </div>

        </div>
        
      
    </div>
    
    <?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
    

</head>

<body>
    <script src="<?= base_url('./assets/fontawesome/js/brands.js') ?>" integrity="" crossorigin=""></script>
    <script src="<?= base_url('./assets/fontawesome/js/solid.js') ?>" integrity="" crossorigin=""></script>   
