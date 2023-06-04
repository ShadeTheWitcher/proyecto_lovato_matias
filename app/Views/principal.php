<section class="seccion-principal">

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div id="success-message" class="alert alert-success welcome-message">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>


    <section class="seccion-carrusel">
        <div class="titulo">
            <h2 class="text-center fw-bold">Productos Destacados </h2>
        </div>

        <div class="container-de-carrusel">
            <div class="row justify-content-md-center">


                <div class="col-1"></div>

                <div class="col-10">

                    <div id="carrusel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carruselIndicatores" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carruselIndicatores" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carruselIndicatores" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>



                        <div class="carousel-inner">

                            <div class="carousel-item active " data-bs-interval="3000">
                                <img src="./assets/img/di2.jpg" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="./assets/img/banre4.jpg" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="./assets/img/bangowr.jpg" class="d-block w-100" alt="...">
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carrusel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carrusel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <div class="col-1"></div>

            </div>
        </div>
    </section>



    <section class="seccion-parrafos">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="grid gap-3 ">





                    <p class="h2  fw-bold fst-italic text-white mt-0 parrafo-titulo text-justify">
                        ¡Bienvenido a GFA, tu destino confiable para la compra de videojuegos!
                    </p>

                    <p class="text-white text-justify parrafo-intro">
                        En GFA, nos apasiona el mundo de los videojuegos y nos dedicamos a ofrecer una amplia gama de
                        emocionantes videojuegos digitales para entusiastas de los juegos en todo el mundo. Desde juegos
                        de
                        aventuras, acción, deportes, hasta juegos de rol y mucho más, nuestro objetivo es ofrecer una
                        selección diversa y emocionante que satisfaga los gustos de todos los jugadores.

                    </p>






                </div>
            </div>
        </div>







    </section>


    <div class="container-cuadro">

        <div class="row justify-content-md-center">
            <div class="col-3">
                <i class="fa-solid fa-cloud-arrow-down fa-2xl"></i> <b class="">Super rapido</b>
            </div>

            <div class="col-3">
                <i class="fa-solid fa-shield-halved fa-2xl"></i> <b class="">Fiable y seguro</b>
            </div>

            <div class="col-3">
                <i class="fa-solid fa-comments fa-2xl"></i> <b class="">Atencion al cliente</b>
            </div>

            <div class="col-3 estrellas">
                <img src="./assets/img/stars.png" alt="">
                <b class="">Reseñas positivas</b>
            </div>

        </div>

    </div>




    <!-- <div class="grid-container">
    <div class="grid-item1">1</div>
    <div class="grid-item2">2</div>
    <div class="grid-item3">3</div>
    <div class="grid-item4">4</div>
    
    

</div> -->

    <!--
    <div class="container seccion-productos">

        <h4 class="text-left">Tendencias <br> </h4>

        <div class="row ">
            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class=" producto rounded">
                    <img src="<?= base_url('assets/img/productos/sm-mm.jpg') ?> " class="card-img-top" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Marvel’s Spider-Man: Miles Morales </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$60.00</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/injustice-god.jpg') ?>" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Injustice </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$30.00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/the-last-of-us.jpg') ?>" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">The Last of Us Part I </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$40.50</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/wrc.jpg') ?>" alt="">
                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">WRC Generations Fully Loaded Edition</p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$33.40</p>
                        </div>
                    </div>

                </div>

            </div>


        </div>


        <div class="row ">
            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class=" producto rounded">
                    <img src="<?= base_url('assets/img/productos/dredge.jpg') ?>" class="card-img-top" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Dredge </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$40.50</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/grim-dawn.jpg') ?>" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Grim Dawn </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$20.00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/planet-zoo.jpg') ?>" alt="">

                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Planet Zoo </p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$40.00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6  col-md-6 col-lg-6 col-xl-3">
                <div class="card-img-top producto rounded">
                    <img src="<?= base_url('assets/img/productos/assetto-corsa-competizione.jpg') ?>" alt="">
                    <div class="row">
                        <div class="col-9">
                            <p class="text-left">Asseto Corsa Competizione</p>
                        </div>

                        <div class="col-3">
                            <p class="fw-bold">$33.00</p>
                        </div>
                    </div>

                </div>

            </div>


        </div>





    </div>


    -->




</section>


<section>
    <div class="container seccion-productos">
        <h4 class="text-left">Tendencias<br></h4>
        <div class="row fila-catalogo">
            <?php foreach ($productos as $product): ?>
                <?php if ($product["activo"] == "SI" && $product["es_tendencia"] == "SI"): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card producto-catalogo" style="width: 100%;">
                            <img class="card-img-top img-thumbnail"
                                src="<?= base_url() ?>assets/uploads/<?= $product['imagen']; ?>" width="100" alt="">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?= $product['name'] ?>
                                </h4>
                                <h6 class="card-subtitle">
                                    <?= $product['description'] ?>
                                </h6>
                                <p class="card-text">
                                    <?= $product['price'] ?>$
                                </p>

                                <?php if (session('logged_in')): ?>
                                    <form action="<?= site_url('agregarItemCarrito') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <input type="hidden" name="nombre_product" value="<?= $product['name'] ?>">
                                        <input type="hidden" name="precio" value="<?= $product['price'] ?>">
                                        <button class="btn btn-danger" type="submit" name="action"
                                            value="Agregar al Carrito">Agregar al Carrito</button>
                                    </form>
                                <?php else: ?>
                                    <a href="<?php echo base_url('usuario/login') ?>">
                                        <button class="btn btn-danger" type="button" aria-expanded="false">Agregar al
                                            Carrito</button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
        background: linear-gradient(to bottom, #e0c3fc, #8ec5fc);
        /* Colores morado claro */
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }



    .card-img-top {
        width: 100%;
        height: auto;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .card-subtitle {
        font-size: 1rem;

        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: #fff;
    }
</style>
</section>