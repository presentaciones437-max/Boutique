<?php
// Incluimos la conexión
require_once 'conexion.php';

class ClienteDAO {

    private $con;

    public function __construct() {
        $this->con = Conexion::obtenerConexion();
    }

    // ========================================================
    // LISTAR CLIENTES
    // ========================================================
    public function listarClientes() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ========================================================
    // AGREGAR CLIENTE
    // ========================================================
    public function agregarCliente($nombre, $telefono, $puntos) {
        $sql = "INSERT INTO clientes(nombre, telefono, puntos) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([$nombre, $telefono, $puntos]);
    }

    // ========================================================
    // OBTENER CLIENTE POR ID
    // ========================================================
    public function obtenerClientePorId($id) {
        $sql = "SELECT * FROM clientes WHERE id_cliente=?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ========================================================
    // ACTUALIZAR CLIENTE
    // ========================================================
    public function actualizarCliente($id, $nombre, $telefono, $puntos) {
        $sql = "UPDATE clientes SET nombre=?, telefono=?, puntos=? WHERE id_cliente=?";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([$nombre, $telefono, $puntos, $id]);
    }

    // ========================================================
    // ELIMINAR CLIENTE
    // ========================================================
    public function eliminarCliente($id) {
        $sql = "DELETE FROM clientes WHERE id_cliente=?";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
