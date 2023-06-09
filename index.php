<?php
session_start();
include_once('db/db.php');
include_once('models/pedidosDAO.php');
include_once('models/productosDAO.php');
include_once('models/usuariosDAO.php');
include_once('views/View.php');
include_once('controller/productcontroller.php');
include_once('controller/ordercontroller.php');
include_once('controller/usercontroller.php');

// Conexión a la base de datos


if (isset($_REQUEST['action']) && isset($_REQUEST['controller'])) {
    $act = $_REQUEST['action'];
    $cont = $_REQUEST['controller'];
    //Instanciación del controlador e invocación del método
    $controller = new $cont();
    $controller->$act();
} else {
    $productos = new ProductoDAO();
    $datos = $productos->getAllProducts();
    View::show("default", $datos);
}
?>