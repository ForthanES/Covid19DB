<?php
namespace Pacientes;

use \Contagios\Contagio;
use \Database\DBconexion;

class Paciente
{
    // Atributos
    public $cod;
    public $nome;
    public $edad;

    // Constructor
    public function __construct($cod, $nome, $edad)
    {
        $this->cod = $cod;
        $this->nome = $nome;
        $this->edad = $edad;
    }

    // Métodos
    public static function altaPaciente($nombre, $clave, $edad)
    {
        $conn = DBconexion::connect();
        $query = "SELECT cod FROM pacientes WHERE nombre = '" . $nombre . "'";
        $conn->query($query);
        $rows = $conn->affected_rows;

        if ($rows == 0) {
            $insert = "INSERT INTO pacientes
            VALUES (NULL,'" . $nombre . "','" . $clave . "','" . $edad . "')";
            $conn->query($insert);
        }

        $conn->close();
    }

    public static function conectar($nombre, $clave)
    {
        $conn = DBconexion::connect();
        $query = "SELECT cod, nombre, edad FROM pacientes
        WHERE nombre = '" . $nombre . "' AND clave = '" . $clave . "'";
        $data = $conn->query($query);

        if ($row = $data->fetch_assoc()) {
            $paciente = new Paciente($row['cod'], $row['nombre'], $row['edad']);
            return $paciente;
        }

        $conn->close();
    }

    public static function ver()
    {

        if (isset($_SESSION['paciente'])) {
            $paciente = unserialize($_SESSION['paciente']);
            $nombre = $paciente->getNome();

            $conn = DBconexion::connect();
            $query = "SELECT p.nombre, p.edad, v.tipo, c.fechaDetec, c.fechaFin
            FROM `pacientes` p LEFT JOIN contagios c
            ON p.cod = c.codPaciente
            LEFT JOIN virus v
            ON c.idVirus = v.id
            WHERE p.nombre = '" . $nombre . "'";
            $data = $conn->query($query);

            $contagios = [];
            while ($row = $data->fetch_assoc()) {
                $contagio = new Contagio($row['nombre'], $row['edad'], $row['tipo'], $row['fechaDetec'], $row['fechaFin']);
                array_push($contagios, $contagio);
            }
            return $contagios;
            $conn->close();
        }
    }

    public static function modificarPaciente($cod, $nombre, $edad)
    {
        $conn = DBconexion::connect();
        $query = "UPDATE pacientes
        SET nombre = '" . $nombre . "', edad = '" . $edad . "'
        WHERE cod = '" . $cod . "'";
        $conn->query($query);
        $conn->close();
    }

    public static function bajaPaciente($nombre, $clave)
    {
        $conn = DBconexion::connect();
        $query = "DELETE FROM pacientes
        WHERE nombre = '" . $nombre . "' AND clave = '" . $clave . "'";
        $conn->query($query);
        $conn->close();
    }

    // Getter & Setter
    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

}
