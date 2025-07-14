<?php
include("../database/connect_db.php");
header('Content-Type: application/json');

// Opcional: permitir CORS si frontend y backend están en dominios diferentes
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGet($conex);
        break;
    case 'POST':
        handlePost($conex);
        break;
    case 'PUT':
        handlePut($conex);
        break;
    case 'DELETE':
        handleDelete($conex);
        break;
    default:
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Método no soportado']);
        break;
}

function handleGet($conex) {
    $sql = "SELECT id, tipo, nombre, cantidad, unidad FROM materia_prima ORDER BY id DESC";
    $result = $conex->query($sql);

    if ($result) {
        $materiaPrima = [];
        while ($row = $result->fetch_assoc()) {
            $materiaPrima[] = $row;
        }
        echo json_encode(['status' => 'success', 'data' => $materiaPrima]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al obtener datos: ' . $conex->error]);
    }
}

function handlePost($conex) {
    $data = json_decode(file_get_contents('php://input'), true);

    $tipo = $data['tipo'] ?? '';
    $nombre = $data['nombre'] ?? '';
    $cantidad = $data['cantidad'] ?? 0;
    $unidad = $data['unidad'] ?? '';

    if (empty($tipo) || empty($nombre) || empty($cantidad) || empty($unidad) || $cantidad <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Datos incompletos o inválidos.']);
        return;
    }

    $sql = "INSERT INTO materia_prima (tipo, nombre, cantidad, unidad) VALUES (?, ?, ?, ?)";
    $stmt = $conex->prepare($sql);
    $stmt->bind_param("ssds", $tipo, $nombre, $cantidad, $unidad);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Materia prima agregada con éxito.', 'id' => $stmt->insert_id]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al agregar materia prima: ' . $stmt->error]);
    }
    $stmt->close();
}

function handlePut($conex) {
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'] ?? 0;
    $tipo = $data['tipo'] ?? '';
    $nombre = $data['nombre'] ?? '';
    $cantidad = $data['cantidad'] ?? 0;
    $unidad = $data['unidad'] ?? '';

    if (empty($id) || empty($tipo) || empty($nombre) || empty($cantidad) || empty($unidad) || $cantidad <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Datos incompletos o inválidos para actualizar.']);
        return;
    }

    $sql = "UPDATE materia_prima SET tipo = ?, nombre = ?, cantidad = ?, unidad = ? WHERE id = ?";
    $stmt = $conex->prepare($sql);
    $stmt->bind_param("ssdsi", $tipo, $nombre, $cantidad, $unidad, $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Materia prima actualizada con éxito.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar materia prima: ' . $stmt->error]);
    }
    $stmt->close();
}

function handleDelete($conex) {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? 0;

    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID de materia prima no proporcionado.']);
        return;
    }

    $sql = "DELETE FROM materia_prima WHERE id = ?";
    $stmt = $conex->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Materia prima eliminada con éxito.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar materia prima: ' . $stmt->error]);
    }
    $stmt->close();
}
?>