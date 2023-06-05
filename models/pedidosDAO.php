<?php
include_once('db/db.php');
class PedidosDAO
{
    //Atributo con la conexión a la BBDD.
    public $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct()
    {
        $this->db_con = Database::connect();
    }
    public function getAllPedidos()
    {
        $stmt = $this->db_con->prepare("select * from pedidos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPedidoById($id)
    {
        $stmt = $this->db_con->prepare("select * from pedidos where id_pedido=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getProductosByPedido($id)
    {
        $stmt = $this->db_con->prepare("select productos.*,productos_pedidos.cantidad from productos inner join productos_pedidos on productos.id_producto = productos_pedidos.id_producto where id_pedido = $id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Le pasan un usuario y un array (vea siguiente descripcion) para posteriormente insertar el usuario en la tabla pedidos, posteriomente se obtiene un
    //id_pedido que se pasara junto con el array a la funcion addProductoToPedido
    public function addPedido($usuario, $pedidos)
    {
        $stmt = $this->db_con->prepare("insert into pedidos (fecha,id_usuario) values (curdate(),:id_usuario)");
        $stmt->bindParam(':id_usuario', $usuario);
        try {
            $stmt->execute();
            $id_pedido = $this->db_con->lastInsertId();
            $this->addProductoToPedido($id_pedido, $pedidos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Si le pasan un id y un array compuesto por arrays que esten compuestos por un id de producto y cantidad para posteriormente insertarlos en la tabla productos_pedidos
    public function addProductoToPedido($id, $pedidos)
    {
        foreach ($pedidos as $pedido) {
            $id_producto = $pedido[0];
            $cantidad = $pedido[1];
            $stmt = $this->db_con->prepare("insert into productos_pedidos(id_pedido,id_producto,cantidad) values (:id_pedido,:id_producto,:cantidad)");
            $stmt->bindParam(':id_pedido', $id);
            $stmt->bindParam(':id_producto', $id_producto);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();
        }
    }
    public function delPedido($id) {
        $stmt = $this->db_con->prepare("delete from productos_pedidos where id_pedido = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt = $this->db_con->prepare("delete from pedidos where id_pedido = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function delProductfromPedido($id_producto,$id_pedido) {
        $stmt = $this->db_con->prepare("delete from productos_pedidos where id_producto = :id_producto and id_pedido = :id_pedido");
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->bindParam(':id_pedido', $id_pedido);
        $stmt->execute();
    }
}
