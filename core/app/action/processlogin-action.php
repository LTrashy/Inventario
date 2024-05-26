<?php
// Asegúrate de tener la sesión iniciada
session_start();

// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// require_once "core/controller/Database.php";

if (!isset($_SESSION["user_id"])) {
    $user = $_POST['username'];
    $pass = sha1(md5($_POST['password']));

    // Crear una instancia de la base de datos y conectar
    $base = new Database();
    $con = $base->connect();

    // Preparar la consulta para evitar inyección SQL
    $stmt = $con->prepare("SELECT * FROM user WHERE (email = ? OR username = ?) AND password = ? AND is_active = 1");
    $stmt->bind_param("sss", $user, $user, $pass);
    $stmt->execute();
    $query = $stmt->get_result();

    $found = false;
    $userid = null;

    // Procesar los resultados
    while ($r = $query->fetch_assoc()) {
        $found = true;
        $userid = $r['id'];
    }

    // Liberar el resultado y cerrar la declaración
    $query->free();
    $stmt->close();

    if ($found) {
        $_SESSION['user_id'] = $userid;
        echo "Cargando ... $user";
        echo "<script>window.location='index.php?view=home';</script>";
    } else {
        echo "<script>window.location='index.php?view=login';</script>";
    }
} else {
    echo "<script>window.location='index.php?view=home';</script>";
}
?>
