<?php
include 'config/conexion.php';

class ServicioModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Crear un nuevo servicio
    public function crearServicio(string $nombre): bool {
        $stmt = $this->conn->prepare("INSERT INTO servicios (ser_nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    // Leer todos los servicios
    public function obtenerServicios(): array {
        $result = $this->conn->query("SELECT * FROM servicios");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Actualizar un servicio
    public function actualizarServicio(int $id, string $nombre): bool {
        $stmt = $this->conn->prepare("UPDATE servicios SET ser_nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    // Eliminar un servicio
    public function eliminarServicio(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM servicios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
