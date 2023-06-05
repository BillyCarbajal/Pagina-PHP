<?php

/**
 *  Controlador de Productos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a productos de la tienda.
 */

include_once("views/View.php");
class OrderController
{
    public function addToCesta()
    {
        if (!isset($_SESSION['cesta'])) {
            $_SESSION['cesta'] = array();
        }
        $id = $_POST['id_producto'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        if (!empty($_SESSION['cesta'])) {
            foreach ($_SESSION['cesta'] as $articulo) {
                if ($articulo[0] == $id) {
                    $crear = false;
                    break;
                } else {
                    $crear = true;
                }
            }
        } else {
            $crear = true;
        }
        $cantidad = $_POST['cantidad'];
        if ($crear) {
            array_push($_SESSION['cesta'], array($id, $cantidad));
            $e = "Producto añadido";
            $_SESSION['mensaje'] = $e;
        } else {
            $e = "El producto ya existe";
            $_SESSION['mensaje'] = $e;
        }
        header("Location: $previousPage");
    }
    public function getCesta()
    {
        if (!isset($_SESSION['cesta'])) {
            $_SESSION['cesta'] = array();
        }
        require_once("models/productosDAO.php");
        $cesta = $_SESSION['cesta'];
        $intance = new ProductoDAO();
        $productos = array();
        foreach ($cesta as $producto_id) {
            $producto = $intance->getProductById($producto_id[0]);
            array_push($productos, array($producto, $producto_id[1]));
        }
        $intance = null;
        View::show("cesta", $productos);
    }
    public function hacerPedido()
    {
        include_once('models/pedidosDAO.php');
        if (isset($_SESSION['user'])) {
            if (count($_SESSION['cesta']) > 0) {
                $pedidos = $_SESSION['cesta'];
                $intance = new PedidosDAO();
                $user1 = $_SESSION['id_user'];
                $intance->addPedido($user1, $pedidos);
                $_SESSION['cesta'] = array();
                $_SESSION['mensaje'] = "Pedido realizado";
                header("Location: index.php");
            } else {
                $_SESSION['mensaje'] = "La cesta esta vacia";
                header("Location: index.php");
            }
        } else {
            $data['general'] = "Debes iniciar sesion";
            View::show("login", $data);
        }
    }
    public function vaciarCesta()
    {
        include_once('models/pedidosDAO.php');
        $previousPage = $_SERVER['HTTP_REFERER'];
        if (isset($_SESSION['cesta'])) {
            unset($_SESSION['cesta']);
            header("Location: $previousPage");
        } else {
            header("Location: $previousPage");
        }
    }
    public function aumentarPedido()
    {
        $id = $_GET['id'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        $contador = -1;
        foreach ($_SESSION['cesta'] as $articulo) {
            $contador++;
            if (($articulo[0] == $id) && (!empty($articulo[0]))) {
                if ($articulo[1] > 0) {
                    $_SESSION['cesta'][$contador][1]++;
                    break;
                }
            }
        }
        header("Location: $previousPage");
    }
    public function reducirPedido()
    {
        $id = $_GET['id'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        $contador = -1;
        foreach ($_SESSION['cesta'] as $articulo) {
            $contador++;
            if ($articulo[0] == $id) {
                if ($articulo[1] > 1) {
                    $_SESSION['cesta'][$contador][1]--;
                } else {
                    unset($_SESSION['cesta'][$contador]);
                    $_SESSION['cesta'] = array_values($_SESSION['cesta']);
                }
                break;
            }
        }
        header("Location: $previousPage");
    }
    public function verpedidos()
    {
        $pedidos = array();
        $cesta = array();
        $pDAO = new PedidosDAO();
        $tpedidos = $pDAO->getAllPedidos();
        foreach ($tpedidos as $lpedidos) {
            if ($lpedidos['id_usuario'] == $_SESSION['id_user']) {
                array_push($pedidos, $lpedidos);
            }
        }
        $ppDAO = new UsuariosDAO();
        foreach ($pedidos as $pedido) {
            $productos_pedidos = array();
            $usuario = "";
            $pedido['id_usuario'] = $ppDAO->getUsuarioById($pedido['id_usuario'])['usuario'];
            $productos_pedidos = $pDAO->getProductosByPedido($pedido['id_pedido']);
            $precio_total = 0;
            foreach ($productos_pedidos as $producto) {
                $precio_total += $producto['precio'] * $producto['cantidad'];
            }
            array_push($cesta, array($pedido, $productos_pedidos, $usuario, $precio_total));
        }
        $pDAO = null;
        View::show("listapedidos", $cesta);
    }
    public function eliminarpedido()
    {
        $id = $_GET['id'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        $pDAO = new PedidosDAO();
        $pDAO->delPedido($id);
        header("Location: $previousPage");
    }
    public function eliminarproductodepedido()
    {
        $id_pedido = $_GET['idp'];
        $id_producto = $_GET['id'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        $pDAO = new PedidosDAO();

        $pDAO->delProductfromPedido($id_producto, $id_pedido);
        if (count($pDAO->getProductosByPedido($id_pedido)) == 0) {
            $pDAO->delPedido($id_pedido);
        }
        header("Location: $previousPage");
    }
}
