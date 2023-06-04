<section>
    <div class="container">
        <div class="row  fila-catalogo ">
            <?php foreach ($productos as $product): ?>
                <?php if ($product["activo"] == "SI"): ?>
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
            color: grey;
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