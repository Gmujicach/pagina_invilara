<?

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = "mysql:host=localhost;dbname=invilara";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$db = new PDO($dsn, "root", "", $options);

$stmt = $db->prepare(
    "INSERT INTO usuario(cedula_usuario, nombre_usuario, contraseña_usuario, ID_rol) VALUES (?, ?, ?, ?)"
);

$contraseña_hash = password_hash("123", PASSWORD_DEFAULT);

$result = $stmt->execute(["123", "carlos", $contraseña_hash, 1]);
echo $result;

?>