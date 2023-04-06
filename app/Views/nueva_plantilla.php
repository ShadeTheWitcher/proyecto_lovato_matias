<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-0">
    <meta name="viewport" content="width=device-width, initialscale=1">

    <title>Boostrap tp3</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity=" " crossorigin="">
    <link href="../assets/css/miestilo2.css" rel="stylesheet" >
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>

    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.css" >
    <link rel="stylesheet" href="../assets/fontawesome/css/brands.css" >

    <script src="../assets/fontawesome/js/brands.js" integrity="" crossorigin=""></script>

    <div class="container-fluid  "> 
        <div class="col- col-sm- col-md- col-lg- col-xl-">
            <img srcset="../assets/img/GfaLogoMini.png 320w,
                ../assets/img/GfaLogoMini.png 480w,     
                ../assets/img/Gfa1.png 800w"    
                sizes="(max-width: 320px) 280px,
                (max-width: 480px) 440px,
                800px"
            src="../assets/img/Gfa1.png"   >   <!-- sirve para que al ser de cierto tamaño cambie a otra img mas pequeña diferente a la original --> 
        </div>
      
    </div>
    
    <?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
    

</head>
<body>





<section class="barra de nav">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GFA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item active">
                    <a class="nav-link" href="../app/Views/principal.html">Home </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nosotros</a>
                </li>
                                    
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Comercializacion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">terminos y usos</a> <!-- solo texto en este apartado --> 
                </li>
                
                
            </ul>
            
            </div>
        </div>
        </nav>

            
    </section>






    
    <section class="seccion-carrusel">
        <div class="titulo">
            <h1  class="display-1 text-center fw-bold">Productos Destacados </h1>
        </div>    
        
            <div class="container">
                <div class="row justify-content-md-center">
                              
                <div id="carouselExample" class="carousel slide">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>



                    <div class="carousel-inner">

                        <div class="carousel-item active">
                        <img src="../assets/img/re4r.jpg" class="d-block w-100" alt="...">
                        </div>

                        <div class="carousel-item">
                        <img src="../assets/img/atomH.webp" class="d-block w-100" alt="...">
                        </div>

                        <div class="carousel-item">
                        <img src="../assets/img/gowr.jpg" class="d-block w-100" alt="...">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>


                </div>
            </div>   
        </section>

            
            
            <section >
            <div class="container">
            <div class="row justify-content-md-center">
                <div class="grid gap-3 ">

                    

                    
                    
                    <p class="h1 text-center fw-bold fst-italic text-white mt-0">
                        Bienvenidos a nuestro sitio
                    </p>

                    <p class="text-white text-justify">
                        Descuestos y muchos descuentos. Todos los dias especiales un nuevo descuento.
                        Tenemos todos los Doom, todos los resident evil y todo lo que se te ocurra. Tambien contamos con ofertas especiales a nuestros clientes mas fieles.
                    </p>

                    <p class=" text-white text-justify">
                        Bienvenidos al sitio donde encontraras todos los juegos que hayan salido hasta la fecha al mejor precio accesible.
                        Tenemos todos los Doom, todos los resident evil y todo lo que se te ocurra. Tambien contamos con ofertas especiales a nuestros clientes mas fieles.
                    </p>

                    <p class="text-white text-justify">
                        Bienvenidos al sitio donde encontraras todos los juegos que hayan salido hasta la fecha al mejor precio accesible.
                        Tenemos todos los Doom, todos los resident evil y todo lo que se te ocurra. Tambien contamos con ofertas especiales a nuestros clientes mas fieles.
                    </p>


                    

                </div>
            </div>
            </div>
            </section>
        


    <section>

        <footer class="pie-de-pagina text-white" style="background-color: #1c2331">

          <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="#">
                            <img src="../assets/img/gfa-logo2.png" alt="logo">
                        </a>
                    </figure>
                </div>
                <div class="box">
                    <h2>Sobre nosotros</h1>
                    <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
                        Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
                </div>
                <div class="box">
                    <h2>Siguenos</h2>
                    <div class="red-social">
                        
                        <a href="https://www.facebook.com/?ref=logo" target="_blank">  <i class="fab fa-facebook"></i>  </a>

                        <a href="https://www.instagram.com"  target="_blank">  <i class="fab fa-instagram"></i>   </a>

                        

                    </div>
                </div>
          </div>

          <div class="grupo-2"     >
                <small> 
                    <center>&copy; 2023 <b>GFA</b> - Todos los derechos reservados</center>
                </small>
          </div>
                    
        </footer>
    

    </section>
    
</body>
</html>