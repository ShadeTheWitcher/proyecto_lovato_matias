<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-0">
    <meta name="viewport" content="width=device-width, initialscale=1">


    <title>GFA
        <?php echo ($title); ?>
    </title>
    <link href="<?= base_url('../assets/css/bootstrap.min.css') ?> " rel="stylesheet" integrity=" " crossorigin="">
    <link href="<?= base_url('assets/css/miestilo2.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" integrity="" crossorigin=""></script>

    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">


    <link rel="shortcut icon" href="<?= base_url("favicon.ico") ?>">

    <div class="container-fluid logo-principal">
        <div class="row">
            <div class="col-6 col-sm-12 col-md-auto d-flex align-items-center justify-content-center">
                <img class="img-header" src="<?= base_url('assets/img/GfaMiniT.png') ?>">
            </div>

            <div class="col-6 col-sm-12 col-md-auto d-flex align-items-center justify-content-end">
                <?php if (session("cart") == null) { ?>
                    <?php $cantidadCarrito = 0; ?>
                <?php } else { ?>
                    <?php $cantidadCarrito = count(session("cart")); ?>
                <?php } ?>

                <?php if ($usuario && isset($usuario['logged_in'])) { ?>
                    <?php if ($usuario && isset($usuario['logged_in']) && session('perfil_id') == 2) { ?>
                        <a href="<?php echo base_url("carrito"); ?>" class="me-3" style="text-decoration: none;">
                            <span class="carrito-contador">
                                <?= $cantidadCarrito ?>
                            </span>
                            <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i>
                        </a>
                    <?php } ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url("usuario/perfil"); ?>">perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url("usuario/envio-logout"); ?>">cerrar
                                    sesion</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url("usuario/login"); ?>">Iniciar Sesion</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("usuario/crearUser"); ?>">Registrarse</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
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