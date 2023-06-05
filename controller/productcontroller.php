<?php

/**
 *  Controlador de Productos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a productos de la tienda.
 */

include_once("views/View.php");
class ProductController
{

    /**
     * Método que obtiene todos los productos de la BBDD y los muestra a través de la vista showProducts.
     */

    public function getProduct()
    {
        require_once("models/productosDAO.php");
        $previousPage = $_SERVER['HTTP_REFERER'];
        $pDAO = new ProductoDAO();
        $product = $pDAO->getProductById($_GET['id']);
        $pDAO = null;
        if ($product != "") {
            View::show("producto", $product);
        } else {
            header("Location: $previousPage");
        }
    }

    public function addproduct()
    {

        $errores = array();
        if (isset($_POST['submit'])) {
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "Falta nombre de producto.";
            }
            if (empty($_POST['descripcion'])) {
                $errores['descripcion'] = "Falta descripcion del producto.";
            }
            if (empty($_POST['precio'])) {
                $errores['precio'] = "Falta precio del producto.";
            }
            if (empty($_POST['foto'])) {
                $errores['foto'] = "Falta foto del producto.";
            }
            if (empty($errores)) {
                $pDAO = new ProductoDAO();
                $resultado = $pDAO->addProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['foto']);
                if ($resultado) {
                    $errores['general'] = "Producto añadido";
                } else {
                    $errores['general'] = "Producto no añadido";
                }
                View::showadmin("addproduct", $errores);
            } else {
                View::showadmin("addproduct", $errores);
            }
        }
    }
    public function delproducto()
    {
        $id = $_GET['id'];
        $previousPage = $_SERVER['HTTP_REFERER'];
        $pDAO = new ProductoDAO();
        $pDAO->delProducto($id);
        header("Location: $previousPage");
    }
    public function buscarproducto()
    {
        $frase_buscar = preg_replace('/[^a-zA-Z0-9]/', '+', $_GET['id']);
        if (isset($_GET['id']) && $_GET['id'] != "" && str_replace('+', '',$frase_buscar) != "" ) {
            $pDAO = new ProductoDAO();
            $uno = array();
            $uno = $pDAO->buscarproductos($frase_buscar);
            if ($uno) {
                if (count($uno) > 0) {
                    View::show("default", $uno);
                } else {
                    header("Location: index.php");
                }
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }
}
