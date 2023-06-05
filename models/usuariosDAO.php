<?php
include_once('db/db.php');
class UsuariosDAO
{

    //Atributo con la conexión a la BBDD.
    public $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct()
    {
        $this->db_con = Database::connect();
    }


    //Le pasas un id y te devuelve todos los datos del usuario que tenga ese ID
    public function getUsuarioById($id)
    {
        $stmt = $this->db_con->prepare("select * from usuarios where id_usuario=:id");
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Se pasas el nombre de usuario, la contraseña y el rol que podra ser 'usuario' o 'admin'
    public function addUsuario($usuario, $password)
    {
        $stmt = $this->db_con->prepare("insert into usuarios (usuario,password) values (:usuario, :password)");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':password', $password);
       // $stmt->bindParam(':rol', $rol);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    //Si existe devuelve True, en caso contrario devuelve False
    public function comprobarUsuario($nombre, $password)
    {
        $stmt = $this->db_con->prepare("select id_usuario from usuarios where usuario = :usuario and password = :password");
        $stmt->bindParam(':usuario', $nombre);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $num_usuarios = $stmt->fetchColumn();
        if ($num_usuarios) {
            return $num_usuarios;
        } else {
            return False;
        }
    }
    
}
?>