<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//paginas principales
$routes->get('/', 'Home::index');
$routes->add('/contacto', 'Home::contacto');
$routes->add('/quienes-somos', 'Home::quienes_somos');
$routes->add('/comercializacion', 'Home::comercializacion');
$routes->add('/term-usos', 'Home::term_usos');
$routes->add('/catalogo', 'Carrito_Controller::catalogo');
    $routes->post('productos/filtrar', 'Carrito_Controller::filtrar');


//rutas producto
$routes->get('products', 'ProductController::index');
$routes->get('products/create', 'ProductController::create');
$routes->post('products/store', 'ProductController::store');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update', 'ProductController::update');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');
$routes->get('products/eliminados', 'ProductController::productos_eliminados');

$routes->get('products/baja/(:num)', 'ProductController::baja/$1');
$routes->get('products/alta/(:num)', 'ProductController::habilitar/$1');


//usuario

$routes->get('usuario/crearUser', 'usuario_controller::registro_form');
$routes->post('usuario/enviar-registo', 'usuario_controller::insertar');

$routes->get('usuario/login', 'usuario_controller::login_form');
$routes->post('usuario/envio-logearse', 'usuario_controller::login');
$routes->get('usuario/envio-logout', 'usuario_controller::logout');
$routes->get('usuario/perfil', 'usuario_controller::perfil');
$routes->get('usuario/editar/(:num)', 'usuario_controller::editar/$1');
$routes->post('usuario/update', 'usuario_controller::update');

//usuario admin
$routes->get('usuario/admin', 'usuario_controller::index');
$routes->get('usuario/edit/(:num)', 'usuario_controller::edit/$1');
$routes->post('usuario/update', 'usuario_controller::update');
$routes->get('usuario/delete/(:num)', 'usuario_controller::delete/$1');
$routes->get('usuario/baja/(:num)', 'usuario_controller::baja/$1');
$routes->get('usuario/alta/(:num)', 'usuario_controller::habilitar/$1');

$routes->get('/usuarios/eliminados', 'usuario_controller::usuariosBaja');

$routes->get('/admin/historial-ventas', 'Carrito_Controller::gestionVentas'); //admin gestion ventas
$routes->get('/admin/detalle-venta/(:num)', 'Carrito_Controller::detalleVenta/$1');

//admin consultas
$routes->get('/admin/consultas-admin', 'Consultas_controller::consultasUsuarios');
$routes->get('/admin/consultas-visitante', 'Consultas_controller::consultasVisitante');
$routes->post('/enviar-consulta', 'Consultas_controller::enviar_consulta');
$routes->get('/marcar-leido/(:num)', 'Consultas_controller::marcar_leido/$1');
$routes->get('/admin/consultas-ver-leidos', 'Consultas_controller::vista_leidos');
$routes->get('/admin/consultas-ver-leidos-vist', 'Consultas_controller::vista_leidos_Visitante');

/*Carrito de Compras*/
$routes->get('/carrito', 'Carrito_Controller::index');
$routes->post('/agregarItemCarrito', 'Carrito_Controller::add');
$routes->post('/actualizar(:num)', 'Carrito_Controller::actualizarCarrito/$1');
$routes->post('/eliminarItem/(:num)', 'Carrito_Controller::borrar/$1');
$routes->post('/incrementarCant', 'Carrito_Controller::incrementarCant');
$routes->post('/desiminuirCant/(:num)', 'Carrito_Controller::disminuirCant/$1');

//$routes->get('/enviar-compra','Carrito_Controller::guardarCompra');
$routes->post('/enviar-compra','Carrito_Controller::registrarCompra');
$routes->get('/vaciar-carrito','Carrito_Controller::vaciarCarrito');
$routes->get('/validar-stock','Carrito_Controller::validarStock');
$routes->get('/form-compra','Carrito_Controller::form_compra');
$routes->get('/cancelar-compra','Carrito_Controller::cancelar_compra');

//


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
