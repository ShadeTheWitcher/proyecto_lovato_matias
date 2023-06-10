<section>
    <style type="text/css">
        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            line-height: 1.4;
        }


        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            color: #404040;
            font-family: "Arial", Segoe UI, Tahoma, sans-serifl, Helvetica Neue, Helvetica;
        }


        .seccion-perfil-usuario .perfil-usuario-body,
        .seccion-perfil-usuario {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
        }

        .seccion-perfil-usuario .perfil-usuario-header {
            width: 100%;
            display: flex;
            justify-content: center;
            background: linear-gradient(#B873FF, transparent);
            margin-bottom: 1.25rem;
        }

        .seccion-perfil-usuario .perfil-usuario-portada {
            display: block;
            position: relative;
            width: 90%;
            height: 17rem;
            background-image: linear-gradient(45deg, #BC3CFF, #317FFF);
            border-radius: 0 0 20px 20px;

        }

        .seccion-perfil-usuario .perfil-usuario-portada .boton-portada {
            position: absolute;
            top: 1rem;
            right: 1rem;
            border: 0;
            border-radius: 8px;
            padding: 12px 25px;
            background-color: rgba(0, 0, 0, .5);
            color: #fff;
            cursor: pointer;
        }

        .seccion-perfil-usuario .perfil-usuario-portada .boton-portada i {
            margin-right: 1rem;
        }

        .seccion-perfil-usuario .perfil-usuario-avatar {
            display: flex;
            width: 180px;
            height: 180px;
            align-items: center;
            justify-content: center;
            border: 7px solid #FFFFFF;
            background-color: #DFE5F2;
            border-radius: 50%;
            box-shadow: 0 0 12px rgba(0, 0, 0, .2);
            position: absolute;
            bottom: -40px;
            left: calc(50% - 90px);
            z-index: 1;
        }

        .seccion-perfil-usuario .perfil-usuario-avatar img {
            width: 100%;
            position: relative;
            border-radius: 50%;
        }

        .seccion-perfil-usuario .perfil-usuario-avatar .boton-avatar {
            position: absolute;
            left: -2px;
            top: -2px;
            border: 0;
            background-color: #fff;
            box-shadow: 0 0 12px rgba(0, 0, 0, .2);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
        }

        .seccion-perfil-usuario .perfil-usuario-body {
            width: 70%;
            position: relative;
            max-width: 750px;
        }

        .seccion-perfil-usuario .perfil-usuario-body .titulo {
            display: block;
            width: 100%;
            font-size: 1.75em;
            margin-bottom: 0.5rem;
        }

        .seccion-perfil-usuario .perfil-usuario-body .texto {
            color: #848484;
            font-size: 0.95em;
        }


        .perfil-usuario-bio h3 {
            color: black;
        }


        .seccion-perfil-usuario .perfil-usuario-footer,
        .seccion-perfil-usuario .perfil-usuario-bio {
            display: flex;
            flex-wrap: wrap;
            padding: 1.5rem 2rem;
            box-shadow: 0 0 12px rgba(0, 0, 0, .2);
            background-color: #fff;
            border-radius: 15px;
            width: 100%;
        }

        .seccion-perfil-usuario .perfil-usuario-bio {
            margin-bottom: 1.25rem;
            text-align: center;
        }

        .seccion-perfil-usuario .lista-datos {
            width: 100%;
            list-style: none;
        }

        .seccion-perfil-usuario .lista-datos li {
            padding: 5px 0;
        }

        .seccion-perfil-usuario .lista-datos li>.icono {
            margin-right: 1rem;
            font-size: 1.2rem;
            vertical-align: middle;
        }

        .seccion-perfil-usuario .redes-sociales {
            position: absolute;
            right: calc(0px - 50px - 1rem);
            top: 0;
            display: flex;
            flex-direction: column;
        }

        
        

        

        /* adactacion a dispositivos */
        @media (max-width: 750px) {
            .seccion-perfil-usuario .lista-datos {
                width: 100%;
            }

            .seccion-perfil-usuario .perfil-usuario-portada,
            .seccion-perfil-usuario .perfil-usuario-body {
                width: 95%;
            }

            .seccion-perfil-usuario .redes-sociales {
                position: relative;
                flex-direction: row;
                width: 100%;
                left: 0;
                text-align: center;
                margin-top: 1rem;
                margin-bottom: 1rem;
                align-items: center;
                justify-content: center
            }

            .seccion-perfil-usuario .redes-sociales .boton-redes+.boton-redes {
                margin-left: 1rem;
                margin-top: 0;
            }
        }
    </style>
    <!--==========================
=            html            =
===========================-->
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="<?= base_url("assets/img/user/avatar.svg") ?>" alt="img-avatar">
                    
                </div>

            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">
                    <?= $usuario['nombre'] . " " . $usuario['apellido'] ?>
                </h3>
                <h3 class="tipo text-center titulo">
                    <?php if ($usuario['perfil_id'] == 1): ?>
                        Admin
                    <?php elseif ($usuario['perfil_id'] == 2): ?>
                        Cliente
                    <?php endif; ?>
                </h3>

            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <?php if (!empty($domicilio->direccion)){ ?>
                        <li><i class="icono fas fa-map-signs"></i> Direccion de usuario:
                            <?= $domicilio->direccion ?>
                        </li>
                    <?php }else{ ?>
                        <li><i class="icono fas fa-map-signs"></i> Direccion de usuario:
                            n/a
                        </li>
                        <?php } ?>
                    <?php if (!empty($domicilio->cod_postal)){ ?>
                        <li><i class="icono fas fa-map-signs"></i> Codigo postal:
                            <?= $domicilio->cod_postal ?>
                        </li>
                    <?php }else{ ?>
                        <li><i class="icono fas fa-map-signs"></i> Codigo postal:
                             n/a
                        </li>
                        <?php } ?>
                    <?php if (!empty($usuario['tel'])){ ?>
                        <li><i class="icono fas fa-phone-alt"></i> Telefono:
                            <?= $usuario['tel'] ?>
                        </li>
                        <?php }else{ ?>
                            <li><i class="icono fas fa-phone-alt"></i> Telefono:
                            n/a
                        <?php } ?>

                    
                </ul>

            </div>
            <a href="<?php echo base_url('usuario/editar/' . $usuario['id']); ?>" class="btn btn-primary btn-sm">Editar</a>

        </div>
    </section>
    <!--====  End of html  ====-->






</section>