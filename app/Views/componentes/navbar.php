<section class="barra-de-nav">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img id="logo-nav" src="<?= base_url('assets/img/gfa-logo2.png') ?> " width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <?php if ($usuario && isset($usuario['logged_in']) &&  session('perfil_id') == 1)  { ?>

                    <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url("/usuario/admin"); ?>">Gestion Usuarios </a>
                    </li>

                
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("products"); ?>">Gestion Productos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/admin/historial-ventas"); ?>">Historial Ventas</a>
                    </li>
                                        
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("#"); ?>">Consultas</a>
                    </li>


            <?php }else if ($usuario && isset($usuario['logged_in']) &&  session('perfil_id') == 2)  { ?>


            

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url("/"); ?>">Home </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("quienes-somos"); ?>">Quienes somos</a>
            </li>
                                
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("contacto"); ?>">Consultas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("comercializacion"); ?>">Comercializacion</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("term-usos"); ?>">terminos y usos</a> <!-- solo texto en este apartado --> 
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("catalogo"); ?>">Catalogo</a> 
            </li>

            <?php }else{ ?>





            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url("/"); ?>">Home </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("quienes-somos"); ?>">Quienes somos</a>
            </li>
                                
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("contacto"); ?>">Contacto</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("comercializacion"); ?>">Comercializacion</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("term-usos"); ?>">terminos y usos</a> <!-- solo texto en este apartado --> 
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("catalogo"); ?>">Catalogo</a> 
            </li>



            <?php } ?>
            
        </ul>
        
        </div>
    </div>
    </nav>

        
</section>
