<?php
namespace Database;

$conn = DBconexion::connect();

$listo = 0;
$queries = 3;

$sql = 'SELECT 1 FROM pacientes LIMIT 1';
$res = $conn->query($sql);
if ($res == false) {
    $sql = "CREATE TABLE pacientes (
                cod INT AUTO_INCREMENT NOT NULL,
                nombre VARCHAR(30) NOT NULL,
                clave VARCHAR(64) NOT NULL,
                edad INT NOT NULL,
                CONSTRAINT PK_codPaciente_PA PRIMARY KEY (cod)
                )";
    $conn->query($sql);

    $clave = hash('sha256', 'abc123.');
    $sql = "INSERT INTO pacientes VALUES(NULL,'usuario','" . $clave . "','30')";
    $conn->query($sql);

    $listo++;
} else {
    $listo++;
}

$sql = 'SELECT 1 FROM virus LIMIT 1';
$res = $conn->query($sql);
if ($res == false) {
    $sql = "CREATE TABLE virus (
                id INT AUTO_INCREMENT NOT NULL,
                tipo VARCHAR(30) NOT NULL,
                incubacion INT NOT NULL,
                CONSTRAINT PK_idVacuna_VI PRIMARY KEY (id)
                )";
    $conn->query($sql);

    $sql = "INSERT INTO virus VALUES(NULL,'SARS CoV','7')";
    $conn->query($sql);

    $sql = "INSERT INTO virus VALUES(NULL,'MERS CoV','5')";
    $conn->query($sql);

    $listo++;
} else {
    $listo++;
}

$sql = 'SELECT 1 FROM contagios LIMIT 1';
$res = $conn->query($sql);
if ($res == false) {
    $sql = "CREATE TABLE contagios (
                codPaciente INT NOT NULL,
                idVirus INT NOT NULL,
                fechaDetec DATE NOT NULL,
                fechaFin DATE,
                CONSTRAINT FK_codPaciente_CO FOREIGN KEY (codPaciente) REFERENCES pacientes(cod) ON DELETE CASCADE,
                CONSTRAINT FK_idVirus_CO FOREIGN KEY (idVirus) REFERENCES virus(id) ON DELETE CASCADE
                )";
    $conn->query($sql);

    $date = Date('Y-m-d');
    $sql = "INSERT INTO contagios VALUES('1','1','" . $date . "',NULL)";
    $conn->query($sql);

    $listo++;
} else {
    $listo++;
}

if ($listo == $queries) {
    $_SESSION['tablas'] = $queries;
}
