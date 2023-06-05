<?php
include_once('db/db.php');
class ProductoDAO
{

    //Atributo con la conexión a la BBDD.
    public $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct()
    {
        $this->db_con = Database::connect();
    }

    //Te devuelve todos los productos de la tabla Productos
    public function getAllProducts()
    {
        $stmt = $this->db_con->prepare("select * from productos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Le pasas un ID y te devuelve todos los datos de ese producto
    public function getProductById($id)
    {
        $stmt = $this->db_con->prepare("select * from productos where id_producto= :id");
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Le pasas el nombre, una descripcion, un precio, y un numerero que sera la imagen a usar
    public function addProducto($nombre, $descrip, $precio, $proc)
    {
        $stmt = $this->db_con->prepare("insert into productos (nombre, descripcion, precio, imagen) values (:nombre, :descripcion, :precio, :imagen)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descrip);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $proc);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Le pasas un id y elimina todos los productos que tengan ese ID
    public function delProducto($id)
    {
        $stmt = $this->db_con->prepare("delete from productos where id_producto = :id");
        $stmt->bindParam(':id', $id);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function modificarProducto($id, $nombre, $descripcion, $precio, $foto)
    {
        $stmt = $this->db_con->prepare("update productos set nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE id_producto = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $foto);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarproductos($buscar)
    {
        $palabras = explode('+', $buscar);
        $consulta = "";
        $primer = false;
        foreach ($palabras as $palabra) {
            if ($palabra != "") {
                if ($primer) {
                    $consulta = $consulta . " and";
                }
                $primer = true;
                $palabra = '%' . $palabra . '%';
                $consulta = $consulta . " UPPER(nombre) like UPPER('" . $palabra . "')";
            }
        }
        $consulta = $consulta . " COLLATE UTF8_GENERAL_CI";
        $stmt = $this->db_con->prepare("select * from productos where $consulta group by id_producto");

        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
