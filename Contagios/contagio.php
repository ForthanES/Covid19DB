<?php
namespace Contagios;

use \Database\DBconexion;

class Contagio
{
    // Atributos
    private $paciente;
    private $edad;
    private $virus;
    private $fechades;
    private $fechafin;

    // Constructor
    public function __construct($paciente, $edad, $virus, $fechades, $fechafin)
    {
        $this->paciente = $paciente;
        $this->edad = $edad;
        $this->virus = $virus;
        $this->fechades = $fechades;
        $this->fechafin = $fechafin;
    }
    // Métodos
    public function altaContagio($paciente, $virus, $fechades)
    {
        $conn = DBconexion::connect();
        $query = "INSERT INTO contagios
        VALUES('" . $paciente . "','" . $virus . "','" . $fechades . "',NULL)";
        $conn->query($query);
        $conn->close();
    }

    public function modificarContagio($paciente, $virus, $fechades, $fechafin)
    {
        $conn = DBconexion::connect();
        $query = "UPDATE contagios
        SET fechaFin = '" . $fechafin . "'
        WHERE codPaciente = '" . $paciente . "'
        AND idVirus = (SELECT id FROM virus WHERE tipo = '" . $virus . "')
        AND fechaDetec = '" . $fechades . "'";
        $conn->query($query);
        $conn->close();
    }

    // Getters
    public function getPaciente()
    {
        return $this->paciente;
    }

    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getVirus()
    {
        return $this->virus;
    }

    public function setVirus($virus)
    {
        $this->virus = $virus;
    }

    public function getFechades()
    {
        return $this->fechades;
    }

    public function setFechades($fechades)
    {
        $this->fechades = $fechades;
    }

    public function getFechafin()
    {
        return $this->fechafin;
    }

    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    }
}
