<?php
include_once("views/View.php");

class UserController
{
    
    public function filtrado($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
    public function iniciarsesion()
    {
        $previousPage = $_SERVER['HTTP_REFERER'];
        $errores = array();
        if (isset($_SESSION['user'])) {
            header("Location: $previousPage");
        }
        if (isset($_POST['iniciarsesion'])) {
            $errores = array();
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "Falta nombre de usuario.";
            }
            if (empty($_POST['password'])) {
                $errores['password'] = "Falta contraseña de usuario.";
            }
            if (empty($errores)) {
                $datos = array();
                $nombre = $this->filtrado($_POST["nombre"]);
                $password = $this->filtrado($_POST["password"]);
                $pDAO = new UsuariosDAO();
                $usuario = $pDAO->comprobarUsuario($nombre, $password);
                if ($usuario) {
                    $datos = $pDAO->getUsuarioById($usuario);
                    $_SESSION['id_user'] = $usuario;
                    $_SESSION['user'] = $nombre;
                    $_SESSION['rol'] = $datos['rol'];
                    header("Location: index.php");
                } else {
                    $errores['general'] = "Usuario o contraseña incorrectos.";
                    unset($_POST);
                    View::show("login", $errores);
                }
            } else {
                View::show("login", $errores);
            }
        } else {
            View::show("login");
        }
    }
    public function registrarse()
    {
        $errores = array();
        if (isset($_SESSION['user'])) {
            header("Location: index.php");
        }
        if (isset($_POST['registrarse'])) {
            $errores = array();
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "Falta nombre de usuario.";
            }
            if (empty($_POST['password1'])) {
                $errores['password1'] = "Falta contraseña de usuario.";
            }
            if (empty($_POST['password2'])) {
                $errores['password1'] = "Falta contraseña de usuario.";
            }
            if (!empty($_POST['password1']) && !empty($_POST['password2']) && ($_POST['password1'] != $_POST['password2'])) {
                $errores['general'] = "Ambas contraseñas deben ser iguales.";
            }
            if (empty($errores)) {
                $datos = array();
                $nombre = $this->filtrado($_POST["nombre"]);
                $password = $this->filtrado($_POST["password1"]);
                $pDAO = new UsuariosDAO();
                if ($pDAO->comprobarUsuario($nombre, $password)) {
                    $errores['general'] = "El usuario ya existe";
                    unset($_POST);
                    View::show("registrarse", $errores);
                } else {
                    $datos = $pDAO->addUsuario($nombre, $password);
                    if ($datos) {
                        $general['general'] = "Usuario registrador correctamente. Inicie sesion";
                        View::show("login", $general);
                    } else {
                        $errores['general'] = "Hubo un error";
                        View::show("registrarse", $errores);
                    }
                }
            } else {
                View::show("registrarse", $errores);
            }
        } else {
            View::show("registrarse");
        }
    }
    public function cerrarsesion()
    {
        session_destroy();
        session_start();
        header("Location: index.php");
    }
    
    #Dependiendo del boton pulsado en la ventana de administracion muestra una ventana
    #con unos datos u otros.
    public function administrar()
    {
        if (!isset($_POST['administrar'])) {
            $_POST['administrar'] = "";
        }
        if ((isset($_SESSION['rol'])) && ($_SESSION['rol'] == "admin")) {
            if (isset($_GET['id'])) {
                if ($_GET['id'] == "addproduct") {
                    View::showadmin("addproduct");
                } else if ($_GET['id'] == "editproducto") {
                    $pDAO = new ProductoDAO();
                    $datos = array();
                    $datos1 = array();
                    $datos = $pDAO->getAllProducts();
                    if (isset($_POST['idproducto'])) {
                        $pDAO = new ProductoDAO();
                        $datos1 = $pDAO->getProductById($_POST['idproducto']);
                        View::showadmin("editproducto", $datos,$datos1);
                    } else if (isset($_POST['modificarproducto'])) {
                        $pDAO = new ProductoDAO();
                        $pDAO->modificarProducto($_POST['id_producto'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['foto']);
                        $datos1['general'] ="Producto modificado";
                        View::showadmin("editproducto", $datos,$datos1);
                    } else {
                        View::showadmin("editproducto",$datos,$datos1);
                    }
                } else if ($_GET['id'] == "delproducto") {
                    $productos = array();
                    $pDAO = new ProductoDAO();
                    $productos = $pDAO->getAllProducts();
                    $pDAO = null;
                    View::showadmin("delproducto", $productos);
                } else if ($_GET['id'] == "showpedidos") {
                    # Muestra la ventana lista de pedidos
                    $pedidos = array();
                    $cesta = array();
                    $pDAO = new PedidosDAO();
                    $pedidos = $pDAO->getAllPedidos();
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
                    View::showadmin("listapedidos", $cesta);
                } else {
                    View::showadmin("addproduct");
                }
            } else {
                View::showadmin("addproduct");
            }
        } else {
            header("Location: index.php");
        }
    }
}
