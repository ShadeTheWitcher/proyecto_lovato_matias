<section class="barra-de-nav">
<style>
    .barra-de-nav {
        background-color: #333;
        
    }

    .barra-de-nav .navbar-brand {
        font-size: 24px;
    }

    .barra-de-nav .navbar-nav .nav-link {
        
        font-size: 18px;
    }


    


    .barra-de-nav .navbar-nav .nav-link:hover {
        color: #8c6eff;
    }
</style>




    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        
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
                        <a class="nav-link" href="<?php echo base_url("/admin/consultas-admin"); ?>">Consultas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/admin/consultas-visitante"); ?>">Contacto</a>
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
